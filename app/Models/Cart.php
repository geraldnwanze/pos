<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_name()
    {
        return $this->belongsTo(Product::class)->select(['name']);
    }

    public function scopeMine($query)
    {
        return $query->where('created_by', auth()->user()->id);
    }

    public function scopeInvoice($query, $invoice)
    {
        return $query->where('invoice', $invoice);
    }
}
