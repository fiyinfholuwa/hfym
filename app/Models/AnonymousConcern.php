<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnonymousConcern extends Model
{
    protected $fillable = [
        'topic',
        'concern',
    ];
}
