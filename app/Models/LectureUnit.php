<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureUnit extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id', 
      'unit_id', 
    ];

    
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }
}
