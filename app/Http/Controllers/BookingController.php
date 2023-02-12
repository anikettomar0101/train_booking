<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;

 
class BookingController extends Controller
{

    public function home(Request $request) 
    {
        return view('landing');
    }

    public function createBooking(Request $request) 
    {        
        $request->session()->forget('error', 'success');
        if ($request->isMethod('post')) {
            $seats = $request->input('no_of_seats');
            $uuid = Str::uuid()->toString();
            $coach = DB::table('Coaches')->first();
            // getting all the previous bookings for the coach
            $bookings = DB::table('bookings')->where('coach_id', $coach->id);
            
            $bookings_count = $bookings->count();
            if(($bookings_count + $seats) > $coach->no_of_seats) {
                $request->session()->flash('error', 'Not enough seats available, '. ($coach->no_of_seats - $bookings_count) .' seats are available');
                return view('create_booking');
            }
            $bookings_data = $bookings->get();
            $bookings_completed = array();
            $total_booked = 0;
            $seats_booked = '';

            foreach($bookings_data as $data) {
                $bookings_completed[$coach->name.$data->seat_no] = 1; 
            }
            for($i=0, $seat_no = 1; $i<$seats; $i++, $seat_no++) {
                // checking if the seat is already booked 
                if(isset($bookings_completed[$coach->name.$seat_no])) {
                    $i--;
                    continue;
                }
                else {
                    $new_booking = new Booking;
                    $new_booking->coach_id = $coach->id;
                    $new_booking->phone = '9999998888';
                    $new_booking->seat_no = $seat_no;
                    $new_booking->booking_id = $uuid;
                    $total_booked += $new_booking->save();
                    $seats_booked .= $coach->name.$seat_no.', ';
                }
            }
            if($seats == $total_booked) {
                $request->session()->flash('success', 'Booked seats '. rtrim($seats_booked, ", "));
            }
        }
        return view('create_booking');

    }

    public function showBookings(Request $request) 
    {
         $coach = DB::table('Coaches')->first();
         $data = Booking::get();
         return view('all_bookings', ['data' => $data, 'coach' => $coach]);
    }
}