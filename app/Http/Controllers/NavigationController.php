<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReferrerLink;
use App\Models\User;


class NavigationController extends Controller
{

    public function bank(){
      dd('victor');
    }


    public function about(){
      $viewData = [];
      $viewData['title'] = "what you need to know about LiftingHands";
      $viewData['body']  =  "Lifting hands is a community of mutual financial helpers";
      return view('navigation.about')->with('viewData', $viewData);
    }

    public function support()
    {
      $viewData = [];
      $user_id_in_session = Auth::id();
      //$user_in_session_reff_code = $user_in_session->get_referrer_code();
      foreach (User::all() as $user) {
        foreach (ReferrerLink::all() as $referrerLink) {
          if ($user->get_id() === $user_id_in_session) {
            if ($user->get_referrer_code() === $referrerLink->get_code()) {
              $id = $referrerLink->get_referred_id();
              $users = User::where('id', $id)->get();
              $viewData['users'] = $users;
              return view('navigation.support')->with('viewData', $viewData);
            }
          }
        }
      }
      return view('navigation.noSupport');
    }


    public function bonus(){
      $viewData = [];
      $user_id_in_session = Auth::id();

      foreach (User::all() as $user) {
        foreach (ReferrerLink::all() as $referrerLink) {
          if ($user->get_id() === $user_id_in_session) {
            if ($user->get_referrer_code() === $referrerLink->get_code()) {
              $id = $referrerLink->get_referred_id();
              $users = User::where('id', $id)->get();
              $viewData['users'] = $users;
              return view('navigation.bonus')->with('viewData', $viewData);
            }
          }
        }
      }

      return view('navigation.noBonus');
    }

}
