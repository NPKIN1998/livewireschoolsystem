<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitMark extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_registration_id',
        'marks',
    ];

    public function unitRegistration()
    {
        return $this->belongsTo(UnitRegistration::class, 'unit_registration_id', 'id');
    }
}
