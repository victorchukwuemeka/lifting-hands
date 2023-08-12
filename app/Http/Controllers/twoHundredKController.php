<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BankDetails;

class twoHundredKController extends Controller
{
  public function index(){
    return view('dashboard.index');
  }

  //uploading the payment evidence
  public function store(Request $request){
    $payment_screen_short = new PaymentScreenShort();
    //  dd($request->hasFile('image'));
    $donor_id = $user_id_in_session = $request->input('user_id_in_session');
    $receiver_id = $request->input('receiver_id');
    $payment_screen_short->set_donor_id($donor_id);
    $payment_screen_short->set_receiver_id($receiver_id);
    $payment_screen_short->set_image('image');
    $payment_screen_short->save();

    if ($request->hasFile('image')) {
        $image_name = $payment_screen_short->get_id().".".$request->file('image')->extension();
        Storage::disk('public')->put(
          $image_name, file_get_contents($request->file('image')->getRealPath())
        );
        $payment_screen_short->set_image($image_name);
        $payment_screen_short->save();


        //return to payment of 10k
        return $this->two_hundred_store($request);
     }
  }


  public function user()
  {
    $default_num = '0.00';
    $two_hundred_thousand = 200000;
    $three_hundred = '300000';
    $hundred = "100000";

    $user_id_in_session = Auth::id();
    foreach (User::all() as $user) {

      if ($user->two_hendred_wallet_balance == $default_num && $user->get_id() !== $user_id_in_session ) {
          //dd($user->wallet_balance);
         return $this->bankDetails($user->get_id());
         break;
      }elseif ($user->two_hendred_wallet_balance == $two_hundred_thousand && $user->get_id() !== $user_id_in_session) {
        //dd($user->wallet_balance);
        return  $this->bankDetails($user->get_id());
        break;
      }elseif ($user->two_hendred_wallet_balance == $hundred && $user->get_id() !== $user_id_in_session) {
        return  $this->bankDetails($user->get_id());
        break;
      }
      else{
        if ($user->two_hendred_wallet_balance === $three_hundred  && $user->get_id() !== $user_id_in_session) {
          $payed ['payed'] = $user;
        }
      }

    }
    $noUser = 'NO Donation Yet';
    return $noUser;

  }
  public function bankDetails($id)
  {
    $amount = 200000.00;
    $viewData = [];
    $url = '/two_hundred';
      foreach (BankDetails::all() as $bank_detail) {
        if ($bank_detail->get_user_id() === $id) {
          $viewData['amount'] = $amount;
          $viewData['user_id_in_session'] = Auth::id();
          $viewData['receiver_id'] = $bank_detail->get_user_id();
          $viewData['bank_name'] = $bank_detail->get_bank_name();
          $viewData['account_number'] = $bank_detail->get_account_number();
          $viewData['first_name'] = $bank_detail->get_first_name();
          $viewData['last_name'] = $bank_detail->get_last_name();
          $viewData['url']  = $url;
          return view('dashboard.user')->with('viewData', $viewData);
        }
      }
    return view('dashboard.nobody');
  }

  public function two_hundred_store(Request $request)
  {

    $default = '0.00';
    $full_donation = 200000.00;
    $full_balance  = 200000.00;
    $mid = 100000.00;

    $user_id_in_session = $request->input('user_id_in_session');
    $receiver_id = $request->input('receiver_id');

    $amount = $request->input('amount');
    foreach (User::all() as $user) {

      if ($user->two_hendred_wallet_balance == $default && $full_donation == $amount ) {
        if ($user->get_id() == $receiver_id ) {
          //dd($amount);
          $user->deposit_two_hundred($amount);
          return $this->show_success();
        }
      }elseif ($user->two_hendred_wallet_balance == $full_balance && $full_donation == $amount) {
        if ($user->get_id() == $receiver_id) {
          //dd($mid);
          $user->deposit_two_hundred($mid);
          return $this->amount_left($mid);
        }
      }elseif ($user->two_hendred_wallet_balance == $mid && $full_donation == $amount) {
        if ($user->get_id() == $receiver_id) {
          $user->deposit_two_hundred($amount);
          return $this->show_success();
        }
      }

    }

  }

  public function amount_left($mid){
    $default_num = '0.00';
    foreach (User::all() as $user) {
      if ($user->two_hendred_wallet_balance == $default_num ) {
        $user->deposit_two_hundred($mid);
        return $this->show_success();
      }
    }
  }

  // show that payment has been made
  public function show_success(){
    return view('dashboard.show_success');
  }

}
