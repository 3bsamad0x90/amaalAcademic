<?php

namespace App\Http\Controllers\admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseReqeust;
use Illuminate\Http\Request;
use Response;

class CoursesController extends Controller
{
    public function index(){
        $courses = Course::paginate(10);
        return view('AdminPanel.courses.index', [
            'active' => 'courses',
            'title' => 'الدورات التدريبية',
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => 'الدورات التدريبية'
                ]
            ]
        ],compact('courses'));
    }

    public function store(StoreCourseReqeust $request){

        $data = $request->except(['_token','photo']);

        $course = Course::create($data);

        if ($request->photo != '') {
            $course['photo'] = upload_image_without_resize('courses/'.$course->id , $request->photo );
            $course->update();
        }
        if ($course->update($data)) {
            return redirect()->back()
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }

    }
    public function update(StoreCourseReqeust $request, $id){

        $course = Course::find($id);
        $data = $request->except(['_token','photo']);
        // dd($data, $request);
        if ($request->photo != '') {
            if ($course->photo != '') {
                delete_image('uploads/courses/'.$id , $course->photo);
            }
            $course['photo'] = upload_image_without_resize('courses/'.$id , $request->photo );
        }
        $update = $course->update($data);
        if ($update) {
            return redirect()->back()
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }

    }
    public function delete($id){
        $course = Course::find($id);
        if ($course->delete()) {
            delete_folder(public_path('uploads/courses/'.$id));
             return Response::json($id);
        }
        return Response::json("false");
    }
}
