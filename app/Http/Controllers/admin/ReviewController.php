<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewReqeust;
use App\Review;
use Illuminate\Http\Request;
use Response;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::paginate(10);
        return view('AdminPanel.reviews.index', [
            'active' => 'reviews',
            'title' => trans('common.reviews'),
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.reviews')
                ]
            ]
        ],compact('reviews'));
    }

    public function store(StoreReviewReqeust $request){
        // dd($request);
        $data = $request->except(['_token','photo']);
        $review = Review::create($data);

        if($request->hasFile('photo')){
            $review['photo'] = upload_image_without_resize('reviews/'.$review->id , $request->photo );
            $review->update();
        }
        if($review->update($data)){
            return redirect()->back()->with('success',trans('common.successMessageText'));
        }
        else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
    }

    public function update(StoreReviewReqeust $request, $id){
        // dd($id);
        $review = Review::find($id);
        $data = $request->except(['_token','photo']);

        if($request->hasFile('photo')){
            if ($review->photo != '') {
                delete_image('uploads/reviews/'.$id , $review->photo);
            }
            $review['photo'] = upload_image_without_resize('reviews/'.$id , $request->photo );
        }
        $update = $review->update($data);
        if ($update) {
            return redirect()->back()
                            ->with('success',trans('common.successMessageText'));
        } else {
            return redirect()->back()
                            ->with('faild',trans('common.faildMessageText'));
        }
    }
    public function delete($id){
        $review = Review::find($id);
        if ($review->delete()) {
            delete_folder(public_path('uploads/reviews/'.$id));
             return Response::json($id);
        }
        return Response::json("false");
    }
}
