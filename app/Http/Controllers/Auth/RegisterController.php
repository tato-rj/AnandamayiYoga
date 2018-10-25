<?php

namespace App\Http\Controllers\Auth;

use App\{User, Subscription};
use App\Billing\{Purchase, Coupon};
use App\Events\{UserSignedUp};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/me';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'first_name' => 'required|string|min:2|max:160',
            'last_name' => 'required|string|min:2|max:160',
            'email' => 'required|string|email|max:160|unique:users',
            'gender' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'agreement' => 'required'
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if (! empty($request->coupon) && ! Coupon::validate($request->coupon))
            return redirect()->back()->with('error', 'The code you entered could not be redeemed at this time.');

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'avatar_path' => cloud('app/avatars/default/'.$data['gender'].'-'.rand(1,4).'.png'),
            'lang' => app()->getLocale(),
            'timezone' => timezone_name_from_abbr("", $data['timezone']*60, false),
            'currency' => getCurrency(),
            'password' => bcrypt($data['password']),
            'level_id' => $data['level_id'],
            'confirmed' => 0,
            'confirmation_token' => str_random(25)
        ]);

        if (array_key_exists('categories', $data))
            $user->categories()->attach(json_decode($data['categories']));

        $user->subscribeTo(Subscription::lists($except = ['newsletter']));

        event(new UserSignedUp($user));
        
        if (array_key_exists('stripeToken', $data)) {
            $this->attemptPurchase($data, $user);
        }

        return $user;
    }

    public function attemptPurchase($data, $user)
    {
        try {
            (new Purchase)->withCoupon($data['coupon'])->createCustomer($data)->charge($user);

            session(['course_purchased' => true]);
        } catch (\Exception $e) {

            session(['purchase_error' => $e->getMessage()]);
        
        }  
    }
}
