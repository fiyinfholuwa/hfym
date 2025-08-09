<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'husband_name', 'wife_name', 'email', 'phone', 'address',
        'marriage_years', 'church', 'expectations', 'prayer_requests'
    ];
}
