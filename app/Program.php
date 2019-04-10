<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'name',
        'tarikh_mula',
        'tarikh_akhir',
        'lokasi',
        'jumlah_peserta'
    ];

    public function totalPeserta()
    {
        return $this->hasMany(Peserta::class, 'program_id', 'id');
    }
}
