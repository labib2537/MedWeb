<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedPatient extends Model
{
    use HasFactory;
    public function cabin()
    {
        return $this->belongsTo(BedAllotment::class);
    }
}
