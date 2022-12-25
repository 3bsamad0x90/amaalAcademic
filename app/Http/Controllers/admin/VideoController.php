<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Response;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::paginate(10);
        return view('AdminPanel.videos.index', [
            'active' => 'videos',
            'title' => trans('common.videos'),
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.videos')
                ]
            ]
        ],compact('videos'));
    }

    public function store(Request $request){
        // dd($request);
        $validator = $request->validate([
            'video' => 'required|mimes:mp4,avi',
        ]);
        if(!$validator){
            return redirect()->back()->with('faild', trans('common.faildMessageText'));
        }else{
            $video = new Video();
            if($request->hasFile('video')){
                $video_name = $request->file('video');
                $name = \Str::random(45) . '.' . $video_name->getClientOriginalExtension();
                $video_name->move(public_path('/uploads/videos/'), $name);
                $video_path = 'videos/' . $name;
                $video -> video = $video_path;
            }
            $video->save();
            return redirect()->back()->with('success',trans('common.successMessageText'));
        }
    }

    public function update(Request $request, $id){
        $validator = $request->validate([
            'video' => 'required|mimes:mp4,avi',
        ]);
        if(!$validator){
            return redirect()->back()->with('faild',trans('common.faildMessageText'));
        }else{
            $video = Video::findOrfail($id);
            // dd($video);
            if($request->hasFile('video')){
                $video_path = public_path('uploads/'.$video->video);
                if(file_exists($video_path) && $video->video != ''){
                    unlink($video_path);
                }
                $video_name = $request->file('video');
                $name = \Str::random(45) . '.' . $video_name->getClientOriginalExtension();
                $video_name->move(public_path('/uploads/videos/'), $name);
                $video_path = 'videos/' . $name;
                $video -> video = $video_path;
            }
            $video->status = 1;
            $video->update();
            return redirect()->back()->with('success',trans('common.successMessageText'));
        }
    }

    public function delete($id){
        $video = Video::findOrfail($id);
        $video_path = public_path('uploads/'.$video->video);
        if(file_exists($video_path)){
            unlink($video_path);
        }
        $video->status = 0;
        $video->update();
        return Response::json($id);
    }
}
