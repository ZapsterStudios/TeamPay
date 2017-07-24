<?php

namespace ZapsterStudios\Ally\Events\Subscriptions;

use App\Team;
use Illuminate\Queue\SerializesModels;

class SubscriptionSwapped
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Team $team, $subscription)
    {
        $this->team = $team;
        $this->subscription = $subscription;
    }
}
