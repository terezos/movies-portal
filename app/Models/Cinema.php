<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'telephone',
        'image',
        'webpage',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movies()
    {
        return $this->hasMany(Movie::class, 'cinema_id');
    }

}
