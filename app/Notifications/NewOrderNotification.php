<?php

namespace App\Notifications;

use App\Course;
use App\User;
use App\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrderNotification extends Notification
{
    use Queueable;

    private $user;
    private $item;
    private $subscription_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($subscription)
    {
        $this->subscription_id = $subscription->id;
        $this->user = User::find($subscription->user_id);
        if ($subscription->subscription_type === 'App\Video') {
            $this->item = Video::find($subscription->subscription_id);
        } else if ($subscription->subscription_type === 'App\Course') {
            $this->item = Course::find($subscription->subscription_id);
        }
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('新订单等待处理')
            ->line('用户【'.$this->user->name.'】新订购了【'.$this->item->name.'】，价格为￥'
                .$this->item->currentPrice.'。')
            ->action('立即处理', url(config('app.url').route('subscription.process', $this->subscription_id, false)))
            ->line('如果您不是管理员，请立即联系contact@bolewangke.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
