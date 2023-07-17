<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class PresenceExport implements FromQuery, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function query()
    {
        return User::query();
    }

    public function map($user): array
    {
        return [
            $user->presence->date,
            $user->presence->in,
            $user->presence->out,
            $user->name
        ];
    }

    public function headings(): array
    {
        return [
            'Date',
            'Time In',
            'Time Out',
        ];
    }
}
