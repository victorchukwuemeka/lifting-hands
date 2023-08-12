<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\BankDetails;
use App\Models\PaymentScreenShort;
use Illuminate\Support\Facades\Storage;


class DashBoardController extends Controller
{
    public function index()
    {
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
          return $this->five_store($request);
       }
    }



    public function user()
    {
      $default_num = '0.00';
      $five_thousand = 5000;
      $seven_five = '7500';
      $two_five = "2500";

      $user_id_in_session = Auth::id();
      foreach (User::all() as $user) {

        if ($user->wallet_balance == $default_num && $user->get_id() !== $user_id_in_session ) {
            //dd($user->wallet_balance);
           return $this->bankDetails($user->get_id());
           break;
        }elseif ($user->wallet_balance == $five_thousand && $user->get_id() !== $user_id_in_session) {
          //dd($user->wallet_balance);
          return  $this->bankDetails($user->get_id());
          break;
        }elseif ($user->wallet_balance == $two_five && $user->get_id() !== $user_id_in_session) {
          return  $this->bankDetails($user->get_id());
          break;
        }
        else{
          if ($user->wallet_balance === $seven_five  && $user->get_id() !== $user_id_in_session) {
            $payed ['payed'] = $user;
          }
        }

      }
      $noUser = 'NO Donation Yet';
      return $noUser;

    }


    public function bankDetails($id)
    {
      $amount = 5000.00;
      $viewData = [];
        $url = '/five';
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

    public function five_store(Request $request)
    {

      $default = '0.00';
      $full_donation = 5000.00;
      $full_balance  = 5000.00;
      $mid = 2500.00;
      //dd($request);
      $user_id_in_session = $request->input('user_id_in_session');
      $receiver_id = $request->input('receiver_id');
      //dd($receiver_id);
      $amount = $request->input('amount');
      foreach (User::all() as $user) {
        //dd($user->get_id());
        if ($user->wallet_balance == $default && $full_donation == $amount ) {
          if ($user->get_id() == $receiver_id ) {
            $user->deposit($amount);
            return $this->show_success();
          }
        }elseif ($user->wallet_balance == $full_balance && $full_donation == $amount) {
          if ($user->get_id() == $receiver_id) {
            $user->deposit($mid);
            return $this->amount_left($mid);
          }
        }elseif ($user->wallet_balance == $mid && $full_donation == $amount) {
          if ($user->get_id() == $receiver_id) {
            $user->deposit($amount);
            return $this->show_success();
          }
        }
      }

    }

    public function amount_left($mid){
      $default_num = '0.00';
         foreach (User::all() as $user) {
           if ($user->wallet_balance == $default_num ) {
             $user->deposit($mid);
             return $this->show_success();
           }
         }
    }

    // show that payment has been made
    public function show_success(){
      return view('dashboard.show_success');
    }


}
