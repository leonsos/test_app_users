<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
class Mails extends Model
{
    use HasFactory, Loggable;
    protected $fillable=[
        'contact',
        'subject',
        'body',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
