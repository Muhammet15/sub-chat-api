<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {

         $validatedData = $request->validate([
             'email' => 'required|email|',
             'password' => 'required|min:4',
         ]);
         $credentials = $request->only('email', 'password');

         if (Auth::attempt($credentials)) {
             $user = Auth::user();
                 if ($user->is_admin) {
                     return redirect()->route('admin.index')->with('success', 'Admin Girişi Başarılı.');
                 }
                 else {
                     return redirect()->back()->with('error', 'Geçersiz kullanıcı türü.');
                 }
         }
         else {
             return redirect()->back()->with('error', 'Geçersiz kimlik bilgileri');
         }
     }
}
