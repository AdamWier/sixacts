<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\User;
use \App\Http\Controllers\ServerSideEventsController;

class SendServerEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $payload;
    
    private $channel;
    
    private $user;
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($payload, $channel, User $user)
    {
        $this->payload = $payload;
        $this->channel = $channel;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        \App\Http\Controllers\ServerSideEventsController::fire($this->payload, $this->channel, $this->user);
    }
}
