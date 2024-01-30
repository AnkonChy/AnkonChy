<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceProduct extends Model
{
    protected $fillable = ['invoice_id', 'product_id','user_id', 'qty', 'sale_price'];

    function product():BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
