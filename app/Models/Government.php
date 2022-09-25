<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Government extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

}

