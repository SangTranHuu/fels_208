<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->email == '') {
            return redirect()->action('HomeController@showUpdateEmailForm');
        }

        if (Auth::user()->is_admin) {
            return redirect()->route('admin_home');
        }

        return view('home');
    }

    public function showWelcomeView()
    {
        return view('welcome');
    }

    public function showUpdateEmailForm()
    {
        return view('auth.update_email');
    }

    public function updateEmail(Request $request)
    {
        $check = Auth::user()->where('email', $request->email)->first();
        if ($check != null) {
            $errors = [ 'email' => trans('messages.email_existed') ];
            if ($request->expectsJson()) {
                return response()->json($errors, 422);
            }

            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors($errors);
        }

        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        return redirect()->action('HomeController@index');
    }
}
