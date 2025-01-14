<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];


    public function city()
    {
        return $this->belongsTo(IndonesiaCities::class, 'selectedCity', 'id');
    }

    public function province()
    {
        return $this->belongsTo(IndonesiaProvinces::class, 'selectedProvince', 'id');
    }

    public function district()
    {
        return $this->belongsTo(IndonesiaDistricts::class, 'selectedDistrict', 'id');
    }

    public function village()
    {
        return $this->belongsTo(IndonesiaVillages::class, 'selectedVillage', 'id');
    }
}
