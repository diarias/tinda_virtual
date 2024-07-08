<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pushersetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'pusher_app_id',
        'pusher_key',
        'pusher_secret',
        'pusher_cluster', 
    ];
}
