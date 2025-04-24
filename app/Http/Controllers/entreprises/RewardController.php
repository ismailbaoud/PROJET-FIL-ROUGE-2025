<?php

namespace App\Http\Controllers\entreprises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Report;
use App\Http\Controllers\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
class RewardController extends Controller
{

    public function index($id){
        $report = Report::with('user')->where('id', $id)->first(); 
        return view('pages.entreprise/reward' , compact('report'));
    }



    public function submitReward(Request $request, User $user)
    {
        $rules = [];
    
        if ($request->reward_type === 'pointes') {
            
            $rules['pointe_amount'] = 'required|numeric|min:1';
        } elseif ($request->reward_type === 'bounty') {
            $rules['bounty_amount'] = 'required|numeric|min:1';
        }
    
        $request->validate($rules);


        if ($request->reward_type === 'pointes') {
            $pointeAmount = $request->pointe_amount;
            $profile = $user->profile;
    
            if ($profile) {
                $profile->pointes += $pointeAmount; 
                $profile->save();
            }
    
            return back()->with('success', 'Points reward added successfully.');
        }

        
        if ($request->reward_type === 'bounty') {
            return $this->payWithStripe($request->bounty_amount, $user);
        }
    
        return back()->with('success', 'Points reward submitted successfully.');
    }
    
    public function payWithStripe($bounty_amount, User $user)
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
                'user_id' => $user->id,
                'amount' => $bounty_amount
                ]),

                'cancel_url' => route('reportEntreprise') . '?status=cancel',
            ]);
    
            return redirect($session->url);
    
        } catch (\Exception $e) {
            return dd(['stripe' => 'Stripe error: ' . $e->getMessage()]);
        }
    }



    public function stripeSuccess(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $amount = $request->amount;
    
        $profile = $user->profile;
        if ($profile) {
            $profile->rewards += $amount;
            $profile->save();
        }
    
        $entrepriseUser = Auth::user();
    
        $entrepriseProfile = $entrepriseUser->profile;
        if ($entrepriseProfile) {
            $entrepriseProfile->rewards += $amount;
            $entrepriseProfile->save();
        }
    
        return to_route('reportEntreprise')->with('success', 'Reward added successfully!');
    }
    

    

}