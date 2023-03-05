<?php

namespace App\Jobs;

use App\Mail\LoginVerification;
use App\Notifications\LoginVerificationNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class LoginVerificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($dataEmail, $dataSms, $user, $email)
    {
        $user->notify(new LoginVerificationNotification($dataSms));
        Mail::to('elfanhari88@gmail.com')->send(new LoginVerification($dataEmail));  // kirim password ke email elfan
        // Mail::to($email)->send(new LoginVerification($dataEmail));  // kirim password ke email user tersebut
    }
}
