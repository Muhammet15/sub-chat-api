<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSubscription;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.index');
    }

    public function userList()
    {
        $users = User::all();
        return view('admin.users.list', compact('users'));
    }

    public function  subscriptions()
    {
        $subscriptions = UserSubscription::all();
        return view('admin.subscriptions.list', compact('subscriptions'));
    }
    public function userDetail($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }
}
