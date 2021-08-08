<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $primarykey='user_id';
    public $incrementing='false';

    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'birthday',
        'country',
        'address',
        'zip_code',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }
}
