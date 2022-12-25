<?php

namespace App\Http\Controllers\frontend;

use App\ContactMessages;
use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Review;
use App\Settings;
use App\Video;
use Illuminate\Http\Request;
use Response;
use Validator;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::get();
        $reviews = Review::all();
        $videos = Video::where('status', 1)->get();
        $minVideoId = collect($videos)->min('id');
        $settings = Settings::get()->keyBy('key')->all();

        return view('welcome', compact('courses', 'reviews', 'settings', 'videos', 'minVideoId'));
    }

    //Store Message From Contact Us Form

    public function storeMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'content' => 'required|string|max:255',
        ]);
        if(!$validator->passes()){
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else{
            $value = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'content' => $request->content,
            ];

            $message = ContactMessages::create($value);
            $message->save();
            return response()->json(['status' => 1, 'msg' => 'Thank you for your message. We will contact you soon.']);
        }
    }
}
