<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $fillable = [
        'branch_name',
        'branch_location',
        'bank_id'
    ];

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }
}
