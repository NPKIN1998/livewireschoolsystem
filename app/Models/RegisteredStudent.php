<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredStudent extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'course_id',
        'semester',
        'year_enrollment',
        'kcse_score'
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
