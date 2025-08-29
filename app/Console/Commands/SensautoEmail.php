<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutoSendMail;

class SensautoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:auto-send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends an automatic email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        Mail::to('vrajeshtank3797@gmail.com')->send(new AutoSendMail());
        \Log::info('Automated email sent.');
    }
}
