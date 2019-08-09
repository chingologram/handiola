<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }
      public function redirectToProvider ()
     {
         return Socialite::driver('google')->redirect();

     }
     public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        // only allow people with @company.com to login
       /* if(explode("@", $user->email)[1] !== 'company.com'){
            return redirect()->to('/');
        }*/
        // check if they're an existing user
        $existingUser = User::where('email', $user->email)->first();
        if($existingUser){
            // log them in
            auth()->login($existingUser, true);

            return redirect()->to('/');

        } else {
            // create a new user

            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            //$newUser->google_id       = $user->password;
            //$newUser->avatar          = $user->avatar;
            //$newUser->avatar_original = $user->avatar_original;
            $newUser->save();
          
            auth()->login($newUser, true);
            return redirect()->to('/');

        }
        return redirect()->to('/');
    }

    public function login(){

       $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
           'password'=>'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
           return redirect()->route('/');
        }

        return back()->withErrors(['email'=>'No te encuentras Registrado.']);
    }
}
