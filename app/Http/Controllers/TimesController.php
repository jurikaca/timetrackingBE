<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function __construct()
    {

    }

    /**
     * function to store time logged information on db
     *
     * @param Request $request, request data
     * @return json
     */
    public function log_time(Request $request)
    {
        $rules = [
            'time_tracked' => ['required', 'integer'],
            'date_finished' => ['required', 'date'],
            'time_tracked_formatted' => ['required'],
            'description' => ['required'],
        ];

        $validator = $this->validate($request, $rules);
        if (isset($validator['errors'])) {
            return response()->json($validator->messages(), 200);
        }

        $time = new Time();
        $time->user_id = 1; // assign default to first user
        $time->date_finished = $request->date_finished;
        $time->time_tracked = $request->time_tracked;
        $time->time_tracked_formatted = $request->time_tracked_formatted;
        $time->description = $request->description;
        $time->save();

        return json_encode([
            'success'   =>  true,
            'msg'       =>  'Time was successfully logged.'
        ]);
    }

    /**
     * function to filter time logged records
     *
     * @return json
     */
    public function get_time(){
        return json_encode([
            "data"          => Time::filter(),
            "items_length"  => Time::filter(true)
        ]);
    }
}