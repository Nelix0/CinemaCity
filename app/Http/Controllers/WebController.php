<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;


class WebController extends Controller
{
    public function index()
    {

        $now = DB::table('films')->where('status', 'now')->limit(4)->get();
        $later = DB::table('films')->where('status', 'later')->limit(4)->get();

        return view('index', compact('now','later'));
    }
    public function afisha()
    {
        $array = DB :: table('films')->get();
        return view('afisha', compact('array'));
    }

    public function card($id)
    {
        $card = DB :: table('films')->where('id', '=', $id)->first();
        $sessions = DB :: table('sessions')->where('film_id', $id)->orderBy('date')->get();
        return view('card', compact('card', 'sessions'));
    }

    public function buy(Request $request)
    {
        $sessionId = $request->session_id;
        $seats = $request->seats;
        foreach ($seats as $seat) {

            $exists = DB:: table('tickets')->where('session_id', '=', $sessionId)->where('seat', '=', $seat)->exists();

            if ($exists){
                return back()->with('error',"Место занято");
            }

            DB::table('tickets')->insert(['session_id' => $request->session_id, 'seat' => $seat, 'user_id' => auth()->id()]);

        }
        return back();
    }

    public function schedule()
    {
        $array = DB :: table('films')->get();
        $sessions = DB::table('sessions')->get();
        return view('schedule', compact('array', 'sessions'));
    }

    public function account()
    {
        $tickets = DB::table('tickets')->where('user_id', auth()->id())->orderBy('id', 'desc')->get();

        foreach ($tickets as $ticket) {
            $sessions = DB::table('sessions')->where('id', $ticket->session_id)->first();
            $films = DB::table('films')->where('id', $sessions->film_id)->first();
            $ticket->film_name = $films->name;
            $ticket->img = $films->img;

            $ticket->time = $sessions->time;
            $ticket->date = $sessions->date;


    }
        return view('account', compact('tickets'));
    }

    public function films(){
        $films = DB::table('films')->get();


        return view('admin.films', compact('films'));
    }

    public function deleteFilm($id)
    {
        DB::table('films')->where('id',$id)->delete();
        return back();
    }

    public function addFilm(Request $request)
    {


        DB::table('films')->insert([
            'name' => $request->name,
            'genre' => $request->genre,
            'country' => $request->country,
            'age_rating' => $request->age_rating,
            'description' => $request->description,
            'img'=> $request->img,
            'price' => $request->price,
            'status' => $request->status
        ]);
        return back();
    }

    public function updateFilm(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'genre' => $request->genre,
            'country' => $request->country,
            'age_rating' => $request->age_rating,
            'price' => $request->price,
            'status' => $request->status,
        ];

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('films', 'public');
        }

        DB::table('films')->where('id', $id)->update($data);

        return back();
    }

    public function sessions(){

        $sessions = DB::table('sessions')->get();
        $films = DB::table('films')->get();

        return view('admin.sessions', compact('sessions','films'));
    }

    public function addSession(Request $request)
    {
        DB::table('sessions')->insert([
            'film_id' => $request->film_id,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return back();
    }
    public function deleteSession($id)
    {
        DB::table('sessions')->where('id',$id)->delete();
        return back();
    }

}
