<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketValAPIController extends Controller
{
    public function test()
    {

        return "Secure via Controller";

    }



    public function getEvents()
    {

        $events = DB::connection('mysql_attendize')->select('SELECT id, title, start_date, end_date, organiser_id FROM events');
        $eventarray = array();

        foreach ($events as $event){

            $eventarray[] = $event;

        }
        echo json_encode($eventarray);
    }

    public function getAttendees($eventid){

        $attendees = DB::connection('mysql_attendize')->
        select('SELECT order_id, ticket_id, event_id, first_name, last_name, private_reference_number  FROM attendees WHERE event_id = ?', [$eventid]);
        $attendeesarray = array();

        foreach ($attendees as $attendee){

            $attendeesarray[] = $attendee;

        }
        echo json_encode($attendeesarray);
    }
}
