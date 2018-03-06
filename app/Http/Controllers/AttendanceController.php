<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection; 

use App\User;
use App\Event;

class AttendanceController extends Controller
{
   public function index(){
        
        $allUsers = User::all();        
        $allEvents = Event::all()->sortBy('datetime'); 
        $data = collect();        

        foreach($allUsers as $user){ 
            $user->attended_events = collect($user->attendedEvents()->get());
            $user->all_events = collect();      
        } 

        //Start with the first User
        foreach($allUsers as $user){ 
            //Check for all Events
            foreach($allEvents as $event){      
                
                $event_id = $event->id; 
                //FLAG
                $put_empty_event = true;

                if(count($user['attended_events']) > 0 ){
                    foreach($user['attended_events'] as $user_event){
                        //Check if it is necessary to put an empty event into user
                        if($user_event->id == $event_id){
                            $put_empty_event = false;
                            $user->all_events->push($user_event);  
                       }                        
                    }   
                }
                
                if($put_empty_event == true){  
                    //Push an empty event in the events array of the user                    
                    $emptyUserEvent = collect([
                        'id' => $event_id,
                        'attendance'=>collect([
                            'event_id' => $event_id,
                            'user_id' => $user->id,
                            'status_id'=>0, 
                            'created_at'=>null,
                            'updated_at'=>null
                        ])
                    ]); 
                    $user->all_events->push($emptyUserEvent);                    
                }
                                  
            }   
        }

        

        //return $allUsers;

        $data->put('events', $allEvents);
        $data->put('users',$allUsers); 
        //return $data; 
        //dd($data->all());
        return view('tdb.table')->with('data', $data);   
    }
}
