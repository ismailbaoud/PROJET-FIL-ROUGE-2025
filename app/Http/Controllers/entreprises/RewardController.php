<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class RewardController extends Controller
{
    public function index($id)
    {
        $report = Report::with(['user', 'user.profile'])->findOrFail($id);

        return view('pages.entreprise.reward', compact('report'));
    }

    public function submitReward(Request $request, Report $report)
    {
        $request->validate([
            'reward_type' => 'required|string|in:pointes,bounty',
            'pointe_amount' => 'required_if:reward_type,pointes|min:1',
            'bounty_amount' => 'min:1',
        ]);

        try {
            if ($request->reward_type === 'pointes') {
                $user = $report->user;
                $profile = $user->profile;

                if ($profile && $report) {
                    $profile->pointes += $request->pointe_amount;
                    $report->pointe += $request->pointe_amount;
                    $profile->save();
                    $report->save();
                    Alert::toast('Points reward added successfully!', 'success');
                } else {
                    throw new \Exception('Profile or report not found');
                }
            } elseif ($request->reward_type === 'bounty') {
                return $this->payWithStripe($request->bounty_amount, $report);
            }
        } catch (\Exception $e) {
            Alert::toast('Failed to submit reward: ' . $e->getMessage(), 'error');
        }

        return back();
    }

    public function payWithStripe($bounty_amount, Report $report)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Bug Bounty Reward',
                        ],
                        'unit_amount' => $bounty_amount * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success', [
                    'user_id' => $report->user->id,
                    'amount' => $bounty_amount,
                    'report_id' => $report->id,
                ]),
                'cancel_url' => route('reportEntreprise') . '?status=cancel',
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            Alert::toast('Failed to process payment: ' . $e->getMessage(), 'error');
            return back();
        }
    }

    public function stripeSuccess(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'report_id' => 'required|exists:reports,id',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $report = Report::findOrFail($request->report_id);
            $amount = $request->amount;
            $entrepriseUser = Auth::user();

            DB::transaction(function () use ($user, $report, $amount, $entrepriseUser) {
                $profile = $user->profile;
                $entrepriseProfile = $entrepriseUser->profile;

                if ($profile && $report && $entrepriseProfile) {
                    $profile->rewards += $amount;
                    $report->reward += $amount;
                    $entrepriseProfile->rewards -= $amount;

                    $profile->save();
                    $report->save();
                    $entrepriseProfile->save();

                    Transaction::create([
                        'from_user_id' => $entrepriseUser->id,
                        'to_user_id' => $user->id,
                        'report_id' => $report->id,
                        'program_id' => $report->program_id,
                        'amount' => $amount,
                        'method' => 'stripe',
                    ]);
                } else {
                    throw new \Exception('Profile or report not found');
                }
            });

            Alert::toast('Reward processed successfully!', 'success');
        } catch (\Exception $e) {
            Alert::toast('Failed to process reward: ' . $e->getMessage(), 'error');
        }

        return back();
    }
}