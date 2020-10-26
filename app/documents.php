<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    protected $table = 'documents';
    protected $fillable=['customer_name','property_price', 'customer_id','timestamps'];

    public function customer() {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
}
