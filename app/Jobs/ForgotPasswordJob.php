<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordJob implements ShouldQueue
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
    public function handle($user, $dataEmail, $dataSms)
    {
        // $user->notify(new ForgotPasswordNotification($dataSms)); // kirim sms ke nomor user tersebut
        // Mail::to($user->email)->send(new SendEmail($dataEmail));  // kirim password ke email user tersebut
        Mail::to('elfanhari88@gmail.com')->send(new SendEmail($dataEmail));  // kirim password ke email user tersebut
    }
}
