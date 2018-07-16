<?php

namespace App\Http\Controllers;

use App\Course;
use App\Note;
use App\Subscription;
use App\User;
use App\Video;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    public function process($id) {
        $subscription = Subscription::find($id);
        try {
            $this->authorize('process', $subscription);
        } catch (AuthorizationException $exception) {
            return redirect()->home();
        }
        $user = User::find($subscription->user_id);
        if ($subscription->subscription_type === 'App\Video') {
            $item = Video::find($subscription->subscription_id);
        } else if ($subscription->subscription_type === 'App\Course') {
            $item = Course::find($subscription->subscription_id);
        } else if ($subscription->subscription_type === 'App\Note') {
            $item = Note::find($subscription->subscription_id);
        }
        return view('subscription.process', [
            'user' => $user,
            'item' => $item,
            'subscription' => $subscription
        ]);
    }

    public function confirm($id) {
        DB::table('subscriptions')->where('id', $id)->update(['paid' => true]);
        return redirect()->back()->with([
            'title' => '开通成功',
            'status' => 'success',
            'detail' => '已经成功确认订单。'
        ]);
    }

    public function abandon($id) {
        DB::table('subscriptions')->delete($id);
        return redirect()->home()->with([
            'title' => '订单取消',
            'status' => 'danger',
            'detail' => '您已成功取消用户订单。'
        ]);
    }
}
