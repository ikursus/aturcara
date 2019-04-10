<?php

namespace App\Exports;

use App\User;
# use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;

    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return User::all();
    // }

    public function query()
    {
        return User::query()->select([
            'id',
            'name',
            'email',
            'jabatan',
            'jawatan',
            'role',
            'created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAME',
            'EMAIL',
            'JABATAN',            
            'JAWATAN',
            'ROLE',
            'TARIKH DAFTAR'
        ];
    }
}
