<?php

namespace App\Jobs;

use App\Mail\NewUserIntroduction;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewUserIntroductionJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public User $newUser
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $allUsers = User::all();

        foreach ($allUsers as $user) {
            Mail::to($user->email)
                ->send(new NewUserIntroduction($user, $this->newUser));
        }
    }
}
