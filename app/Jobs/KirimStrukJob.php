<?php

namespace App\Jobs;

use App\Mail\StrukPembayaran;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class KirimStrukJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $dataEmail;

    public function __construct($dataEmail)
    {
        return $this->dataEmail = $dataEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle($dataEmail)
    {
       Mail::to('elfanhari88@gmail.com')->send(new StrukPembayaran($dataEmail));  // kirim password ke email user tersebut
    }
}
