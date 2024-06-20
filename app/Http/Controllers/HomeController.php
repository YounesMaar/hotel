<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch bookings data
        $bookings = Booking::all();

        // Ensure you're passing an array to the view
        return view('user.index', ['bookings' => $bookings]);
    }



    public function room_details($id)
    {


        $dataFromDatabase = Booking::select('start_date', 'end_date')->get();

        // Initialize an empty array to store the combined data
        $disabledDates = [];

        // Loop through the retrieved data and combine start_date and end_date into one array
        foreach ($dataFromDatabase as $data) {
            $disabledDates[] = [
                'start_date' => $data->start_date,
                'end_date' => $data->end_date,
            ];
        }

        $room = Room::find($id);

        return view('home.room_details', compact('room', "disabledDates"));
    }


    public function add_booking(Request $request, $id)
    {

        $request->validate([
            'startDate' => 'required|date',

            'endDate' => 'date|after:startDate',
        ]);
        $data = new booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)->exists();


        if ($isBooked)
            return redirect()->back()->with('error', 'Room is already booked please try different date');

        else {
            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();
            return redirect()->back()->with('message', 'Room Booked Successfully');
        }
    }
    public function contact(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();
        return redirect()->back()->with('message', 'Message Sent Sucessfully');
    }
    public function our_rooms()
    {

        $room = Room::all();

        return view('home.our_rooms', compact('room'));
    }

    public function hotel_gallary()
    {
        $gallary = Gallary::all();
        return view('home.hotel_gallary', compact('gallary'));
    }
    public function contact_us()
    {

        return view('home.contact_us');
    }
}
