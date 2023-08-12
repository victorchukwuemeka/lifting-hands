<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Notifications\Notification;
use App\Notifications\ReferrerBonus;
use App\Models\ReferrerLink;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
      return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $referrer_code = $new_referrer_code = substr(md5(time()), 0, 8);
        //dd($referrer_code);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'referrer_code'  =>   $referrer_code,
        ]);

        $old_referrer_code = $request->referrer_code;

        if ($old_referrer_code == null) {
          $old_referrer_code = 1;
        }
        //dd($old_referrer_code);

        event(new Registered($user));

        Auth::login($user);

        return $this->reff($old_referrer_code);

    }
     /*
     *handle the  registration of referrer_code
     */
    public function reff($old_referrer_code)
    {
      $referrer_link =  new ReferrerLink();
      $user_id_of_referred = $user_id_in_session = Auth::id();
      $user_id_of_referrer = 1 ;

      //$user = User::where('referrer_code', '=', $old_referrer_code)->get();
      foreach (User::all() as $user) {
        if ($user->get_referrer_code() === $old_referrer_code) {
          $user_id_of_referrer = $user->get_id();
        }
      }

      //dd($old_referrer_code);
      $referrer_link->set_referrer_id($user_id_of_referrer);
      $referrer_link->set_referred_id($user_id_of_referred);
      $referrer_link->set_code($old_referrer_code);
      $referrer_link->save();

      return view('dashboard.index');
    }
}
