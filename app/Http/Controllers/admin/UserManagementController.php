<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class userManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users = User::latest()->get();

        $totalUsers = User::count();
    
        $activeUsers = User::where('status', 'active')->count();
    
        $suspendedUsers = User::where('status', 'suspended')->count();
    
        $newUsersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                                  ->whereYear('created_at', Carbon::now()->year)
                                  ->count();
    
        return view('pages.admin.user_management', compact('users', 'totalUsers', 'activeUsers', 'suspendedUsers', 'newUsersThisMonth'));
    }
    

    public function changeStatus(Request $request, $id){

        $user = User::find($id);
        $user->update(['status'=>$request->status]);
        return back();

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return back();
    }
}
