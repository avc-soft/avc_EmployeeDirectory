<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 */
class Employee extends Model
{
    protected $fillable = ['name', 'position_id', 'salary', 'hired_at'];

    protected $with = ['position'];

    protected $dates = [
        'created_at',
        'updated_at',
        'hired_at'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChildren($query)
    {
        return $query->where('boss_id', $this->id);
    }

    /*public function withPages()
    {
        return self::paginate(10);
    }*/
}
