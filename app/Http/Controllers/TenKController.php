<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BankDetails;
use App\Models\PaymentScreenShort;
use Illuminate\Support\Facades\Storage;


class TenKController extends Controller
{
  public function index(){
    return view('dashboard.index');
  }

  //uploading the payment evidence
  public function store(Request $request){
    $payment_screen_short = new PaymentScreenShort();
    //dd($request->hasFile('image'));
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

       //dd($image_name);
        //return to payment of 10k
        return $this->ten_store($request);
     }
  }

  //bring out the receiver
  public function user()
  {
    $default_num = '0.00';
    $ten_thousand = 10000;
    $fifteen = '15000';
    $five_thousand = "5000";

    $user_id_in_session = Auth::id();
    //dd($user_id_in_session);
    foreach (User::all() as $user) {
      //dd($user->ten_wallet_balance);
      if ($user->ten_wallet_balance == $default_num && $user->get_id() !== $user_id_in_session ) {
          //dd($user->wallet_balance);
         return $this->bankDetails($user->get_id());
         break;
      }elseif ($user->ten_wallet_balance == $ten_thousand && $user->get_id() !== $user_id_in_session) {
        //dd($user->wallet_balance);
        return  $this->bankDetails($user->get_id());
        break;
      }elseif ($user->ten_wallet_balance == $five_thousand && $user->get_id() !== $user_id_in_session) {
        return  $this->bankDetails($user->get_id());
        break;
      }
      else{
        if ($user->ten_wallet_balance === $fifteen  && $user->get_id() !== $user_id_in_session) {
          $payed ['payed'] = $user;
        }
      }

    }
    $noUser = 'NO Donation Yet';
    return $noUser;

  }



  //bring out the receiver bank details
  public function bankDetails($id)
  {

    $amount = 10000.00;
    $url = '/ten';
    $viewData = [];
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





  //make the donation to receiver
  public function ten_store(Request $request)
  {


    $default = '0.00';
    $full_donation = 10000.00;
    $full_balance  = 10000.00;
    $mid = 5000.00;

    $user_id_in_session = $request->input('user_id_in_session');
    $receiver_id = $request->input('receiver_id');

    $amount = $request->input('amount');
    //dd($amount);
    foreach (User::all() as $user) {

      if ($user->ten_wallet_balance == $default && $full_donation == $amount ) {
        if ($user->get_id() == $receiver_id ) {
          //dd($receiver_id);
          $user->deposit_ten($amount);
          return $this->show_success();
        }
      }
      elseif ($user->ten_wallet_balance == $full_balance && $full_donation == $amount) {
        if ($user->get_id() == $receiver_id) {
          $user->deposit_ten($mid);
          return $this->amount_left($mid);
        }
      }
      elseif ($user->ten_wallet_balance == $mid && $full_donation == $amount) {
        if ($user->get_id() == $receiver_id) {
          $user->deposit_ten($amount);
          return $this->show_success();
        }
      }


    }

  }


  //when half donation is made the remaining money should go to the next
  public function amount_left($mid){
    $default_num = '0.00';
    foreach (User::all() as $user) {
      if ($user->ten_wallet_balance == $default_num ) {
        $user->deposit_ten($mid);
        return $this->show_success();
      }
    }
  }

  // show that payment has been made
  public function show_success(){
    return view('dashboard.show_success');
  }



}
