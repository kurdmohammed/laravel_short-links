<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  Illuminate\Database\Eloquent\Builder;


class ShortLink extends Model
{
    use HasFactory;
    protected $table='urls';
    protected $fillable=['user-name','url','short_url','clicks'];

    public function scopeClicksnumber(Builder $query,$numclicks)
    {
        $query->where('clicks','=',$numclicks);
    }
}
