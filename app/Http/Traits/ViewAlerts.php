<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;
use Session;

trait ViewAlerts {

    public function error($exception, $message)
    {
        Log::error($message . '-' . $exception->getMessage());

        if (env('APP_DEBUG'))
        {
            Session::flash('danger', $message . '-' .$exception->getMessage());
        } else {
            Session::flash('danger', "$message!");
        }
    }
}