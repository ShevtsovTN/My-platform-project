<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $messages = Message::join('users', 'messages.fromId', '=', 'users.id')
            ->select('messages.id', 'messages.fromId', 'messages.subject', 'messages.read', 'messages.created_at', 'users.login')
            ->where('messages.toId', '=', Auth::id())
            ->get()
            ->toArray();
        $group = Auth::user()->group;
        return view('pages.messages.messages', compact('messages', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required',
            'subject' => 'required',
            'text' => 'required'
        ]);
        $toId = User::select('id')->where('login', '=', $request->to)->get()->toArray()[0]['id'];
        if (!empty($toId) && Auth::check()) {
            $user = Message::insert([
                'fromId' => Auth::id(),
                'toId' => $toId,
                'read' => false,
                'subject' => $request->subject,
                'text' => $request->text,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            $request->session()->flash('success', 'Message created');
        } else {
            $request->session()->flash('error', 'Error creating message');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $message = Message::join('users', 'messages.fromId', '=', 'users.id')
            ->select('messages.*', 'users.login')
            ->where('messages.id', '=', $id)
            ->get()
            ->toArray()[0];
        return view('pages.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request->read) && $request->read == 'true') {
            Message::where('id', '=', $id)->update(['read' => true]);
            $request->session()->flash('success', 'Message read');
        } else {
            $request->session()->flash('error', 'Error reading message');
        }
        return redirect()->route('messagesList');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        Message::where('id', '=', $id)->delete();
        $request->session()->flash('success', 'Message deleted');
        return redirect()->route('messagesList');
    }

    /**
     * Get count new messages
     *
     * @return mixed
     */
    public static function countNewMessages()
    {
        return Message::where('toId', '=', Auth::id())
            ->where('read', '!=', true)
            ->count();
    }
}
