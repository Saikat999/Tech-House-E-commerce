<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;
use App\Models\User;

use Auth;


class LoginController extends Controller
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo ='/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $this->validate($request,[
            'email' =>'required|email',
            'password' =>'required',
        ]);

        //Find user by mail

        $user=User::where('email',$request->email)->first();

        if($user->status ==1){

            //login this user

            if(Auth::guard('web')->attempt(['email'=> $request->email,'password'=> $request->password],$request->remember)){
               
                //  log his/her now
                return redirect()->intended(route('index'));
                // return redirect('/');
            }else{
                session()->flash('sticky_error','Invalid Email or Password');
                return back();
            }
        }else{
             // send him a token again
             if(!is_null($user)){
                $user->notify(new VerifyRegistration($user));
                session()->flash('success','A new Confirmation mail has sent to you... Please check and confirm');
                return redirect('/');

             }else{
                session()->flash('sticky_error','Please log in first');
                return redirect()->route('login');
             }
        }
    }
}
