<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */
    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.pages.login.login_form');
    }

    /**
     * Get the login username to be used by the controller.
     *
     *@param  Request  $request
     *
     * @return string
     */
    public function findUsername()
    {

        $login = request()->input('username');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function login(Request $request)
    {
        $this->username = $this->findUsername();
        // Validation Form
        $this->validate($request, [
            'username' => 'required',
            'password' => 'min:8|required',
        ]);
        $remember = isset($request->remember) ? true : false;
        //Attempt to log the user if
        if (Auth::viaRemember()) {
            return redirect()->route('admin.index');
        }

        if (Auth::guard('admin')->attempt([$this->username => $request->username, 'password' => $request->password], $remember)) {
            return redirect()->route('admin.index');
        }

        return back()->withInput()->withErrors(['fail' => ['Thông tin đăng nhập sai!']]);
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flush();

        return redirect()->route('admin.login');

    }
}