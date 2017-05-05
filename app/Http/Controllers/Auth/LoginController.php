<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use JeroenDesloovere\VCard\VCard;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToGithubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleGithubProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        dd($user);
        // $user->token;
    }

        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleGoogleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $vcard = new VCard();

        $lastname = $user->user['name']['familyName'];
        $firstname = $user->user['name']['givenName'];
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        //
        //dd($user);
        $vcard->addCompany($user->user['organizations'][0]['name']);
        $vcard->addJobtitle($user->user['occupation']);
        $vcard->addRole('Data Protection Officer');
        $vcard->addEmail($user->email);
        $vcard->addPhoneNumber(7740816964, 'PREF;WORK');
        $vcard->addPhoneNumber(123456789, 'WORK');
        $vcard->addAddress(null, null, 'street', 'worktown', null, 'workpostcode', 'Belgium');
        $vcard->addURL($user->user['url']);

        //$vcard->addPhoto($user->avatar_original);

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();
    }
}
