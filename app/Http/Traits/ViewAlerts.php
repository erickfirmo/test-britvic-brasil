<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;
use Session;

trait ViewAlerts {

    public function success($message)
    {
        Session::flash('success', $message);
    }

    public function error($exception, $message)
    {
        Log::error($message . '-' . $exception->getMessage());

        $message = env('APP_DEBUG') ? $message . '-' .$exception->getMessage() : $message; 

        Session::flash('danger', "$message!");
    }
}