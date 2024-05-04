<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Message;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //この値をChat.jsで取得する
    public $message;

    /**
     * Create a new event instance.
     */
    public function __construct($message = null)
    {
        $this->message = $message;
        $messages = new Message();
        $messages->message = $message;
        $messages->save();
    }


    public function broadcastOn(): array
    {
        return [
            new Channel('channel-chat'),
        ];
    }
}
