<?php

namespace App\Observers;

use App\Models\Proyect;

class ProyectObserver
{
    public function created(Proyect $proyect): void
    {
        $proyect_id = $proyect->id;
        $printer = request()->printer_id;
        $filament = request()->filament_id;
        $hours = (request()->printTime) / 60;
        $is_completed = false;


        $proyect->printJobs()->create([
            'printer_id' => $printer,
            'filament_id' => $filament,
            'hours' => $hours,
            'is_completed' => $is_completed,
            'grams_used' => request()->materialUsed,
            'printed_at' => null,
        ]);

    }

    public function updated(Proyect $proyect): void
    {
        //
    }

    /**
     * Handle the Proyect "deleted" event.
     */
    public function deleted(Proyect $proyect): void
    {
        //
    }

    /**
     * Handle the Proyect "restored" event.
     */
    public function restored(Proyect $proyect): void
    {
        //
    }

    /**
     * Handle the Proyect "force deleted" event.
     */
    public function forceDeleted(Proyect $proyect): void
    {
        //
    }
}
