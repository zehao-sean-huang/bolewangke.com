<?php

namespace App\Http\Controllers;

use App\Note;
use App\Notifications\NewOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        return view('note.show', compact('note'));
    }

    public function order(Request $request, $id) {
        $data = $request->all();
        $user = \Auth::user();
        $note = Note::find($id);
        if (isset($data['user'])) {
            \Auth::user()->update($data['user']);
        }
        $user->orderedNotes()->attach($note, ['paid' => false]);
        $subscription = DB::table('subscriptions')->where([
            'subscription_id' => $note->id,
            'user_id' => $user->id,
            'subscription_type' => 'App\Note',
        ])->first();
        Notification::route('mail', env('ADMIN_EMAIL'))
            ->notify(new NewOrderNotification($subscription));
        return redirect()->back()->with([
            'title' => '我们已经收到您的订单',
            'status' => 'success',
            'detail' => '您发起了购买【'.$note->name.'】的订单。伯乐小助手会在2小时内通过QQ（'.
                $user->qq.'）联系您，在您支付笔记费用后，我们将以最快的速度为您发货。请您及时关注QQ消息。'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
}
