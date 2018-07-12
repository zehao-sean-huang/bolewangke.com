<?php

namespace App\Http\Controllers;

use App\Course;
use App\Notifications\NewOrderNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class CourseController extends Controller
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
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    public function order($id)
    {
        $user = User::find(\Auth::id());
        $course = Course::find($id);
        $user->subscribedCourses()->attach($course, ['paid' => false]);
        $subscription = DB::table('subscriptions')->where([
            'subscription_id' => $course->id,
            'user_id' => $user->id,
            'subscription_type' => 'App\Course'
        ])->first();
        Notification::route('mail', env('ADMIN_EMAIL'))
            ->notify(new NewOrderNotification($subscription));
        return redirect()->back()->with([
            'title' => '我们已经收到您的订单',
            'status' => 'success',
            'detail' => '您计划购买的【'.$course->name.'】将在您支付课款后为您开通。'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
