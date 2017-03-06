<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeetingController extends Controller
{
  
  /**
  * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
    
    //T    ODO: Retrieve meetings from database.
    
    $meeting1 = [
                'info' => [
                    'title' => 'Meeting Title 1',
                    'view_meeting' => [
                        'href' => '/api/v1/meeting/1',
                        'method' => 'GET'
                    ]
                ]
            ];
    
    $meeting2 = [
                'info' => [
                    'title' => 'Meeting Title 2',
                    'view_meeting' => [
                        'href' => '/api/v1/meeting/2',
                        'method' => 'GET'
                    ]
                ]
            ];
    
    $response = [
                'meeting' => $meeting1,
                'meeting' => $meeting2
            ];
    
    return response()->json($response, 200);
  }
  
  
  /**
  * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
    $title = $request->input('title');
    $description = $request->input('description');
    $date = $request->input('date');
    $time = $request->input('time');
    $timezone = $request->input('timezone');
    $location = $request->input('location');
    $userId = $request->input('userId');
    
    //T    ODO: Database insert here.
    
    $meeting = [
                'info' => [
                    'title' => $title,
                    'description' => $description,
                    'date' => $date,
                    'time' => $time,
                    'timezone' => $timezone,
                    'location' => $location,
                    'view_meeting' => [
                        'href' => '/api/v1/meeting/1',
                        'method' => 'GET',
                    ],
                    'url' => [
                        'delete_meeting' => [
                            'href' => '/api/v1/meeting/1',
                            'method' => 'DELETE'
                        ],
                        'update_meeting' => [
                            'href' => '/api/v1/meeting/1',
                            'method' => 'PUT',
                            'params' => 'title, description, date, time, location'
                        ]         
                    ]                       
                ]
            ];
    
    $response = [
                'status' => 'Meeting Created',
                'meeting' => $meeting
            ];
    
    return response()->json($response, 201);
  }
  
  
  /**
  * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
    //T    ODO: Retrieve meeting from database.
    
    $meeting = [
                'info' => [
                    'title' => 'Meeting Title',
                    'description' => 'Meeting Description',
                    'date' => date("Y-m-d"),
                    'time' => date("h:i:s"),
                    'timezone' => date("e"),
                    'location' => 'Meeting Location',
                    'url' => [                    
                        'delete_meeting' => [
                            'href' => "/api/v1/meeting/{$id}",
                            'method' => 'DELETE'
                        ],
                        'update_meeting' => [
                            'href' => "/api/v1/meeting/{$id}",
                            'method' => 'PUT',
                            'params' => 'title, description, date, time, location'                    
                        ]                
                    ]
                ]
            ];
    
    $response = [
                'meeting' => $meeting
            ];
    
    return response()->json($response, 200);
  }
  
  
  /**
  * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
    $title = $request->input('title');
    $description = $request->input('description');
    $date = $request->input('date');
    $time = $request->input('time');
    $timezone = $request->input('timezone');
    $location = $request->input('location');
    
    //T    ODO: Database update here.
    
    $meeting = [
                'info' => [
                    'title' => $title,
                    'description' => $description,
                    'date' => $date,
                    'time' => $time,
                    'timezone' => $timezone,
                    'location' => $location,
                    'url' => [                    
                        'view_meeting' => [
                            'href' => "/api/v1/meeting/{$id}",
                            'method' => 'GET'
                        ],
                        'delete_meeting' => [
                            'href' => "/api/v1/meeting/{$id}",
                            'method' => 'DELETE'
                        ],
                        'update_meeting' => [
                            'href' => "/api/v1/meeting/{$id}",
                            'method' => 'PUT',
                            'params' => 'title, description, date, time, location'                    
                        ]                                
                    ]                        
                ]
            ];
    
    $response = [
                'status' => 'Meeting Updated',
                'meeting' => $meeting
            ];
    
    return response()->json($response, 200);
  }
  
  
  /**
  * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
    //T    ODO: Retrieve and delete from database.
    
    $meeting = [
                'info' => [
                    'url' => [                    
                        'create_meeting' => [
                            'href' => '/api/v1/meeting',
                            'method' => 'POST'
                        ]                                
                    ]
                ]
            ];
    
    $response = [
                'status' => 'Meeting Deleted',
                'meeting' => $meeting
            ];
    
    return response()->json($response, 200);
  }
}
