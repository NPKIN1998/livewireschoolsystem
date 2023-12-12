<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
  use HasFactory;
  protected $fillable = [
    'school_id',
    'unit_number',
    'unit_name',
    'year',
    'semester'
  ];


  // public function courses()
  // {
  //   return $this->belongsToMany(Course::class, 'unit_course', 'unit_id', 'course_id');
  // }
  public function school(): BelongsTo
  {
    return $this->belongsTo(School::class);
  }


}
