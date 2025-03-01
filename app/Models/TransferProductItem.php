<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferProductItem extends Model
{
    use HasFactory;


    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function transfer(){
        return $this->belongsTo(Transfer::class,'transfer_id');
    }

    
}
