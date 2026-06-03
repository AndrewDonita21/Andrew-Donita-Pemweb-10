<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class keluhan extends Model
{
    protected $fillable = ['keluhan', 'status', 'reject_reason', 'masyarakats_id'];

    public function masyarakat()
    {
        return $this->belongsTo(masyarakat::class, 'masyarakat_id');
    }
}
