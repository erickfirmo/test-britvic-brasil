<?php

namespace App\Observers;

use App\Models\Reserve;
use Illuminate\Support\Facades\Auth;

class ReserveObserver
{
    /**
     * Handle the Reserve "creating" event.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return void
     */
    public function creating(Reserve $reserve)
    {
        $reserve->user_id = Auth::id() ?? 1;
    }
    
    /**
     * Handle the Reserve "updating" event.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return void
     */
    public function updating(Reserve $reserve)
    {
        $reserve->user_id = Auth::id() ?? 1;
    }
}
