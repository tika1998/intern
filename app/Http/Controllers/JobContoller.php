<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class JobContoller extends Controller
{
    public function example(Request $request)
    {
        $details = ['email' => 'recipient@example.com'];
        SendEmail::dispatch($details);
    }
}
