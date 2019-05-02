<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoftDelete extends Model
{
    use SoftDeletes;


    protected $dates = ['deleted_at'];
}


class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
