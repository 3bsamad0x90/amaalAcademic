<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\ContactMessages;
use Response;

class ContactMessagesController extends Controller
{
    public function index()
    {
        $messages = ContactMessages::paginate(20)->sortBy('status');
        return view('AdminPanel.contactMessages.index',[
            'active' => 'contactMessages',
            'title' => trans('common.contactMessages'),
            'messages' => $messages,
            'breadcrumbs' => [
                [
                    'url' => '',
                    'text' => trans('common.contactMessages')
                ]
            ]
        ]);
    }

    public function details($id)
    {
        $message = ContactMessages::find($id);
        $message->update(['status'=>'1']);
        if ($message == '') {
            return redirect()->route('admin.contactmessages');
        }

        return view('AdminPanel.contactMessages.details',[
            'active' => 'contactMessages',
            'title' => trans('common.contactMessages'),
            'message' => $message,
            'breadcrumbs' => [
                [
                    'url' => route('admin.contactmessages'),
                    'text' => trans('common.contactMessages')
                ],
                [
                    'url' => '',
                    'text' => trans('common.messageDetails')
                ]
            ]
        ]);
    }

    public function delete($id)
    {
        $message = ContactMessages::find($id);
        if ($message->delete()) {
            return Response::json($id);
        }
        return Response::json("false");
    }
}
