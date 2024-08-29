<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'date_transaction', 'id_customer']; // field pada table transactions


    // Relasi antara table transactions dengan customers Many To One
    public function customer() { 
        return $this->belongsTo(Customer::class, 'id_customer');
    }
}
