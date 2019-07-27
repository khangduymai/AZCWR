<?php
//Developed by Khang Mai
//Contact at: khangmai4591@gmail.com

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuestTimeTracking;
use Illuminate\Support\Facades\Validator;
use Auth;

class GuestTimeTrackingController extends Controller
{
  public function showTimeIn()
  {
    return view('guest_time_tracking.time_in');
  }

  public function timeIn(Request $request){
    //validate the input from time_in view
    $validateInput = $request->validate([
      'first-name' => ['required', 'min:2', 'string'],
      'last-name' => ['required', 'min:2', 'string'],
    ]);
    //start time tracking for the user
    $currentCheckInTime = $this->startTimeTracking();
    //begin to insert data to database
    $guestTimeIn = new GuestTimeTracking();
    $guestTimeIn->first_name = $request->input('first-name');
    $guestTimeIn->last_name = $request->input('last-name');
    $guestTimeIn->time_in = $currentCheckInTime;
    //save data
    $guestTimeIn->save();
    return view('guest_time_tracking.display_message_start_timetracking',[
      'first_name'=> $guestTimeIn->first_name,
      'last_name'=> $guestTimeIn->last_name,
      'time_in'=> $guestTimeIn->time_in
    ]);
  } // end timeIn()

  public function startTimeTracking(){
    $now = new \DateTime('now');
    $epoch = $now->format('U');
    return $epoch;
  } //end startTimeTracking()

  public function showTimeOut(){
    $users = GuestTimeTracking::whereNull('time_out')->get();
    return view('guest_time_tracking.time_out',[
      'users'=>$users
    ]);
  } //end showTimeOut()

  public function timeOut(int $id){
    $user = GuestTimeTracking::find($id);
    $now = new \DateTime('now');
    $epoch = $now->format('U');
    $user->time_out = $epoch;
    $user->save();
    
    if (Auth::check()) {
      return redirect()->route('home');;
    } else {
    return view('guest_time_tracking.display_message_end_timetracking', [
      'user' => $user
    ]);
    }
  } //end timeOut

}