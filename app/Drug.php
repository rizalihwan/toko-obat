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

    public function getStatusObatAttribute()
    {
        return $this->stock == 0 || $this->stock == null ? '<span class="badge badge-danger">Stok Kosong</span>' : '<span class="badge badge-success">' . $this->stock . '  Tersedia</span>';
    }
}
