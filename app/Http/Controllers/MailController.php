<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;


class MailController extends Controller{
    public function sendMail()
        {
            dispatch(new SendEmailJob('vrajeshtank3797@example.com'));
        
            return "Mail Queued Successfully!";
        }
    }