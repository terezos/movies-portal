<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'timetable',
        'image',
        'imdb_link',
        'imdb_code',
        'rotten_tomatoes_link',
    ];


    public function cinemas()
    {
        return $this->hasMany(Cinema::class, 'cinema_id');
    }

}
