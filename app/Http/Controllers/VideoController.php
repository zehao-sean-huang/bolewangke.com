<?php

namespace App\Http\Controllers;

use App\Course;
use App\Notifications\NewOrderNotification;
use App\Note;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all()->sortBy('public');
        $courses = Course::all();
        $notes = Note::all();
        return view('video.index', [
            'videos' => $videos,
            'courses' => $courses,
            'notes' => $notes,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('video.show', compact('video'));
    }

    /**
     * Notify administrator about the purchase
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function order($id) {
        $user = User::find(Auth::id());
        $video = Video::find($id);
        $user->subscribedVideos()->attach($video, ['paid' => false]);
        $subscription = DB::table('subscriptions')->where([
            'subscription_id' => $video->id,
            'user_id' => $user->id,
            'subscription_type' => 'App\Video'
        ])->first();
        Notification::route('mail', env('ADMIN_EMAIL'))
            ->notify(new NewOrderNotification($subscription));
        return redirect()->back()->with([
            'title' => '我们已经收到您的订单',
            'status' => 'success',
            'detail' => '您发起了购买【'.$video->name.'】的订单。伯乐小助手会在12小时内添加您的QQ（'.
                $user->qq.'），在您支付课款后为您开通课程，请您及时关注QQ消息。'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
