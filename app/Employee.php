<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 */
class Employee extends Model
{
    protected $fillable = ['name', 'position_id', 'salary', 'hired_at'];


    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
