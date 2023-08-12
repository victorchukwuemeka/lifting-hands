<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDetails;
use Illuminate\Support\Facades\Auth;



class BanKDetailsController extends Controller
{
    public function index(){

      $bank_details = BankDetails::paginate(15)->sortDesc();
      $user_id_in_session = Auth::id();

      $viewData = [];
      $viewData['user_id_in_session'] = $user_id_in_session;
      $viewData['account'] = "Input Your Account Details";
      $viewData['more_account'] = "Add More Account number ";
      $viewData['bank_details'] = $bank_details;

      return view('bank.index')->with('viewData', $viewData);
    }


    public function create(){
      $viewData =[];
      $viewData['title'] = "Topic To Write About";
      return view('bank.create')->with('viewData', $viewData);
    }

    public function store(Request $request){

       BankDetails::validate($request);

       $bank_details = new BankDetails();
       $bank_name = $request->input('bank_name');
       $first_name = $request->input('first_name');
       $last_name = $request->input('last_name');
       $account_number = $request->input('account_number');
       $user_id = $user_id_in_session = Auth::id();

       $bank_details->set_first_name($first_name);
       $bank_details->set_last_name($last_name);
       $bank_details->set_bank_name($bank_name);
       $bank_details->set_account_number($account_number);
       $bank_details->set_user_id($user_id);
       $bank_details->save();

       return $this->index();
    }

    public function destroy(){
      dd();
    }


}
