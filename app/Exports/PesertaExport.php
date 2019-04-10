<?php

namespace App\Exports;

use App\Peserta;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PesertaExport implements FromQuery, WithHeadings, WithMapping
{
    public function __construct($program)
    {
        $this->program = $program;
    }

    public function query()
    {
        if (is_null($this->program))
        {
            return Peserta::select([
                'id',
                'program_id',
                'nama',
                'jabatan',
                'jawatan',
                'email',
                'status',
                'is_vegetarian'
            ]);
        }

        return Peserta::where('program_id', '=', $this->program)
        ->select([
            'id',
            'program_id',
            'nama',
            'jabatan',
            'jawatan',
            'email',
            'status',
            'is_vegetarian'
        ]);
        
    }

    /**
    * @var Peserta $peserta
    */
    public function map($peserta): array
    {
        return [
            $peserta->id,
            $peserta->program->name,
            $peserta->program->lokasi,
            $peserta->nama,
            $peserta->jabatan,
            $peserta->jawatan,
            $peserta->email,
            $peserta->status,
            #$peserta->getOriginal('is_vegetarian')
            strip_tags($peserta->is_vegetarian)
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA PROGRAM',
            'LOKASI PROGRAM',
            'NAMA PESERTA',
            'JABATAN',
            'JAWATAN',
            'EMAIL',
            'STATUS',
            'VEGETARIAN?'
        ];
    }
}
