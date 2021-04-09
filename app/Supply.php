<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $guarded = [];

    public function drugs()
    {
        return $this->hasMany(Drug::class, 'supplies_id');
    }
}
