<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'unit_id',
        'status',
    ];

    public function unitMarks()
    {
        return $this->hasMany(UnitMark::class, 'unit_registration_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }
}
