<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;
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
    protected $redirectTo = '/home/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // email_verified_at
        $this->middleware(['guest'])->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'confirmed' => true,
        ];
    }

    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 3;
    }

    /**
     * Redirect the user to the google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from github.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function handleProviderCallbackGit()
    {
        $githubUser = Socialite::driver('github')->user();
        // OAuth Two Providers
        // $token = $user->token;
        // $refreshToken = $user->refreshToken; // not always provided
        // $expiresIn = $user->expiresIn;

        // OAuth One Providers
        // $token = $user->token;
        // $tokenSecret = $user->tokenSecret;

        // All Providers

        $user = \App\User::where('provider_id', $githubUser->getId())->first();

        if (!$user) {
            # code...
            $user = \App\User::create([
                'first' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'provider_id' => $githubUser->getId(),
                'avatar' => $githubUser->getAvatar(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
        
    }

    public function redirectToProviderGit()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
       
        $user = \App\User::where('provider_id', $githubUser->getId())->first();

        if (!$user) {
            # code...
            $user = \App\User::create([
                'first' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'provider_id' => $githubUser->getId(),
                'avatar' => $githubUser->getAvatar(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
        
    }
}
