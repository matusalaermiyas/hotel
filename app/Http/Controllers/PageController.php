<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PageController extends Controller
{
    function about()
    {
        return view('company.about');
    }
    function gallery()
    {
        return view('company.gallery');
    }
    function testimonials()
    {
        $comments = Comment::where('approved', true)->get();

        return view('company.testimonials')->with('comments', $comments);
    }

    function createTestimonials()
    {
        return view('company.create_testimonials');
    }

    function storeTestimonials(Request $request)
    {
        $file_name = Str::random(10) . $request->file('picture')->getClientOriginalName();
        $destination = public_path() . '/images/comments';
        $request->file('picture')->move($destination, $file_name);

        $path = '/images/comments/' . $file_name;

        Comment::create([
            'full_name' => $request['full_name'],
            'sent_time' => '2022-07-18',
            'feedback' => $request['feedback'],
            'picture' => $path
        ]);

        Session::flash('success', 'Thanks for your feedback');
        return redirect()->back();
    }


    function locations()
    {
        return view('company.locations');
    }
    function contacts()
    {
        return view('company.contacts');
    }

    function rooms()
    {
        $rooms = Room::all();

        return view('company.rooms')->with('rooms', $rooms);
    }
}
