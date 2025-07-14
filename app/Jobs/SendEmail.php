<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TaskCreated;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $emailAddress;
    public $task;
    public function __construct($emailAddress,$task)
    {
        $this->emailAddress = $emailAddress;
        $this->task = $task;
    }
    
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Handling email job', [
            'email' => $this->emailAddress,
            'task' => $this->task->toArray()
        ]);
        // Send email notification to the logged-in user
        Mail::to($this->emailAddress)->send(new TaskCreated($this->task));
    }
}
