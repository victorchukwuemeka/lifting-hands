<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class SupportController extends Controller
{
    public function index(){
     $users =   User::all();
     $team_members = TeamMember::all();
     $user_id_in_session = Auth::id();


     $viewData = [];
     $viewData['user_id_in_session'] = $user_id_in_session;
     $viewData['users'] = $users;
     $viewData['team_members'] = $team_members;
     return view('navigation.support')->with('viewData', $viewData);
    }

    public function store(Request $request){

      $name = $request->input('name');
      $email = $request->input('email');
      $message =  $request->input('message');
      $team_member = new TeamMember();
      $team_member->set_name($name);
      $team_member->set_email($email);
      $team_member->set_message($message);
      $team_member->save();

      return $this->index();
    }
}
