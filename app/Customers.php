<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    protected $fillable=['first_name','last_name','phone_number','address', 'province_id'];

    protected $appends = [
        'full_name'
    ];

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function getFullNameAttribute() {
        return $this->first_name.' '. $this->last_name;
    }
}
