<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

       // return redirect()->intended(RouteServiceProvider::HOME);
       return redirect('dashboard');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
   
    public function callback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $finduser = User::where('social_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> $provider,
                    'password' => encrypt($provider.'123456')
                ]);
                Auth::login($newUser);
                return redirect('dashboard');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

 /*   public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
            try {
                $user = Socialite::driver('github')->user();
                $finduser = User::where('social_id', $user->id)->first();
                if($finduser){
                    Auth::login($finduser);
                    return redirect('/');
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'social_id'=> $user->id,
                        'social_type'=> 'github',
                        'password' => encrypt('github123456')
                    ]);
                    Auth::login($newUser);
                    return redirect('/');
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
                 /*   $user=Socialite::driver('github')->user();
        $user = User::firstOrCreate(
           ['email'=>$user->email] ,
            ['name'=>$user->name ,
            'password'=>Hash::make(Str::random(24))
            ]);
            Auth::login($user,true);
            return redirect('/');

        } */

        //FACEBOOK AUTH

       /*  public function redirectToFacebook()
        {
            return Socialite::driver('facebook')->redirect();
        }
    
        public function facebookCallback()
        {
                try {
                    $user = Socialite::driver('facebook')->user();
                    $finduser = User::where('social_id', $user->id)->first();
                    if($finduser){
                        Auth::login($finduser);
                        return redirect('/');
                    }else{
                        $newUser = User::create([
                            'name' => $user->name,
                            'email' => $user->email,
                            'social_id'=> $user->id,
                            'social_type'=> 'facebook',
                            'password' => encrypt('facebook123456')
                        ]);
                        Auth::login($newUser);
                        return redirect('/');
                    }
                } catch (Exception $e) {
                    return $e->getMessage();
                }
            } */

            //GOOGLE AUTH
          /*   public function redirectToGoogle()
            {
                return Socialite::driver('google')->redirect();
            }
        
            public function googleCallback()
            {
                    try {
                        $user = Socialite::driver('google')->user();
                        $finduser = User::where('social_id', $user->id)->first();
                        if($finduser){
                            Auth::login($finduser);
                            return redirect('/');
                        }else{
                            $newUser = User::create([
                                'name' => $user->name,
                                'email' => $user->email,
                                'social_id'=> $user->id,
                                'social_type'=> 'google',
                                'password' => encrypt('google123456')
                            ]);
                            Auth::login($newUser);
                            return redirect('/');
                        }
                    } catch (Exception $e) {
                        return $e->getMessage();
                    }
                } */
    }

