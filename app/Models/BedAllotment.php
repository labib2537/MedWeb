<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedAllotment extends Model
{
    use HasFactory;
    public function patients()
    {
        return $this->hasOne(BedPatient::class);
    }
}
