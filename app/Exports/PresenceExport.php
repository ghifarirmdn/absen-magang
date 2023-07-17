<?php

namespace App\Exports;

use App\Models\Presence;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PresenceExport implements FromQuery, WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function query()
    {
        return Presence::query();
    }

    public function map($presence): array
    {
        return [
            $presence->date,
            $presence->user->name,
            $presence->user->office->working_status,
            $presence->in,
            $presence->out,
            $presence->total_hours
        ];
    }

    public function headings(): array
    {
        return [
            'Date',
            'Name',
            'Status',
            'Time In',
            'Time Out',
            'Durasi'
        ];
    }
}
