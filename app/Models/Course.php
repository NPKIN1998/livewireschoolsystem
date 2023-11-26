<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
      'school_id',
      'course_name',
      'course_code',
      'course_description',
      'course_type',
      'course_duration',
      'course_fee',
    ];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function unit(): HasMany
    {
        return $this->hasMany(Unit::class);
    }

    public function registeredstudent(): HasMany
    {
        return $this->hasMany(RegisteredStudent::class);
    }

    // public function unit()
    // {
    //     return $this->hasMany(Unit::class, 'unit_course', 'unit_id', 'course_id');
    // }
}

