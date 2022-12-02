<?php

namespace App\Observers;

use App\Jobs\TransactionLogJob;
use App\Models\Overcharge;

class OverchargeObserver
{
    /**
     * Handle the Overcharge "created" event.
     *
     * @param  \App\Models\Overcharge  $overcharge
     * @return void
     */
    public function created(Overcharge $overcharge)
    {
        $params = [
            'transactionable_type' => 'App\Models\Overcharge',
            'transactionable_id' => $overcharge->id,
            'type' => 'overcharge',
            'process' => 'overcharge'
        ];

        TransactionLogJob::dispatch($params);
    }

    /**
     * Handle the Overcharge "updated" event.
     *
     * @param  \App\Models\Overcharge  $overcharge
     * @return void
     */
    public function updated(Overcharge $overcharge)
    {
        //
    }

    /**
     * Handle the Overcharge "deleted" event.
     *
     * @param  \App\Models\Overcharge  $overcharge
     * @return void
     */
    public function deleted(Overcharge $overcharge)
    {
        //
    }

    /**
     * Handle the Overcharge "restored" event.
     *
     * @param  \App\Models\Overcharge  $overcharge
     * @return void
     */
    public function restored(Overcharge $overcharge)
    {
        //
    }

    /**
     * Handle the Overcharge "force deleted" event.
     *
     * @param  \App\Models\Overcharge  $overcharge
     * @return void
     */
    public function forceDeleted(Overcharge $overcharge)
    {
        //
    }
}
