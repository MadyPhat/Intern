<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    //
    protected $fillable = [
        'warehouse_name',
        'branch_id'
    ];

    public function branch(){
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
