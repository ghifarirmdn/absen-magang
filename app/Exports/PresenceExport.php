<?php

namespace App\Exports;

use App\Models\Presence;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class PresenceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Presence::all();
    }
}
