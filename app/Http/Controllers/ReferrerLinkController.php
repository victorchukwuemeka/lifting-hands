<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\ReferrerLink;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ReferrerLink;

class ReferrerLinkController extends Controller
{
    public function link()
    {

      $viewData = [];
      $user_id_in_session = Auth::id();
      foreach (User::all() as $user) {
        if ($user->get_id() === $user_id_in_session) {
          $referrerCode = $user->get_referrer_code();
        }
      }
      $viewData['referrerCode'] = $referrerCode;
      return view('refLink')->with('viewData', $viewData);
    }
}
