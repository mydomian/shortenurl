<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShorter extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'url',
        'short_url',
        'click_count'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select('id','name','email');
    }
}
