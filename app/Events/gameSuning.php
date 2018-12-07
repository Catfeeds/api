<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class gameSuning implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $openid;
    public $avatar;
    public $nickname;


    public function __construct($openid, $avatar, $nickname)
    {
        $this->openid = $openid;
        $this->nickname = $nickname;
        $this->avatar = $avatar;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('GameSuning');
    }

    public function broadcastAs()
    {
        return 'gameSuningUser';
    }
}
