<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Only these fields may be assigned via create() and update().
    protected $fillable = ['name', 'course', 'year_level'];

    protected function casts(): array
    {
        return [
            'year_level' => 'integer',
        ];
    }
}
