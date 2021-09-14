<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Log;

class TestQueueEmails extends Controller
{
    public function sendTestEmails()
    {
        Log::info('Start Queue;');
        try{
            $emailJobs = new SendEmailJob();
            $this->dispatch($emailJobs);
        } catch (\Exception $e) {
            Log::error("Something wrong! check your code");
            Log::error($e->getMessage());
        }
    }
}
