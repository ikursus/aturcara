<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // Maklumat table yang perlu dihubungi
    protected $table = 'peserta';

    protected $fillable = [
        'program_id',
        'nama',
        'jabatan',
        'jawatan',
        'email',
        'status',
        'is_vegeterian'
    ];

    public function program()
    {
        #return $this->belongsTo(Program::class, 'program_id', 'id');
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the vegeterian.
     *
     * @param  string  $value
     * @return string
     */
    public function getIsVegeterianAttribute($value)
    {
        if ($value == 1)
        {
            return '<span class="btn btn-success">YES</span>';
        }

        return '<span class="btn btn-warning">NO</span>';
    }
}
