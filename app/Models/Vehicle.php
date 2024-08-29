<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'vehicle_number_plate', 'id_customer']; // Field pada table vehicles


    // Relasi antara table vehicles dengan customers Many To One
    public function customer() {
        return $this->belongsTo(Customer::class, 'customers', 'id_customer');
    }
}
