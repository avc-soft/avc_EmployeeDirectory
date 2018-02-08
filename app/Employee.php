<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 */
class Employee extends Model
{
    protected $fillable = ['name', 'position_id', 'salary', 'boss_id', 'avatar', 'hired_at'];

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

    public function getBossAttribute()
    {
        return self::find($this->boss_id);
    }

    /**
     * @return string
     */
    public function getAvatarAttribute()
    {
        return $this->photo ?: '/storage/artist-icon.png';
    }

    /**
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->photo_small ?: '/storage/artist-icon.png';
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

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchQuery
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function search($searchQuery)
    {
        return self::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('salary', 'like', '%' . $searchQuery . '%')
            ->orWhere('hired_at', 'like', '%' . $searchQuery . '%');
    }

    /*public function withPages()
    {
        return self::paginate(10);
    }*/
}
