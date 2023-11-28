<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;


    protected $fillable = [
        'invoice_id',
        'product_id',
        'product_price',
        'product_amount',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Producto::class);
    }

    // public function getTable()
    // {
    //     return 'invoice_item';
    // }


    public function getAmountAttribute()
    {
        return $this->product_amount;
    }

    public function getTotalAttribute()
    {
        return $this->product_price * $this->product_amount;
    }



}
