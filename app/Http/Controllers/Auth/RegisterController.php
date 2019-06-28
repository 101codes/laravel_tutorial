<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use App\SocialProvider;
use Illuminate\Support\Str;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // private $socialProvider;
    // public function __construct(SocialProvider $socialProvider)
    // {
    //     $this->socialProvider=$socialProvider;
    private $date;
    public function __construct()
    {
        date_default_timezone_set('Asia/Phnom_Penh');
        $this->date=date("Y-m-d H:m:s");
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(60),
        ]);
    }
   /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try{
            $socialUser = Socialite::driver($provider)->user();
        }catch(\Exception $e){
            return redirect('/');
        }
        // to check if user logged in
        // $socialProvider = $this->socialProvider->where('provider_id',$socialUser->getID())->first();
        $socialProvider=SocialProvider::where('provider_id',$socialUser->getID())->first();
        if(!$socialProvider){
            $user=User::firstOrCreate(
                ['email'=>$socialUser->getEmail()],
                ['name'=>$socialUser->getName(),'role_user'=>'social','api_token' => Str::random(60)]
            );
            $user->socialProvider()->create(
                ['provider_id'=>$socialUser->getID(),'provider'=>$provider]
            );
        }else{
            $user=$socialProvider->user;
        }

        auth()->login($user);
        return redirect('/');
    }

}
