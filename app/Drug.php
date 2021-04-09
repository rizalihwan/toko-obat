<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $guarded = [];
    
    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supplies_id');
    }
}
