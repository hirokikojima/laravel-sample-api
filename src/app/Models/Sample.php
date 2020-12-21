<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'sample';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
