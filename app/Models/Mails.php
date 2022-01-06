<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    use HasFactory;
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
