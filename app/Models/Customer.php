<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tlpn']; // field pada table customers


    // relasi antara table customers dengan table vehicles One To Many
    public function vehicles() {
        return $this->hasMany(Vehicle::class, 'id_customer');
    }

    // relasi antara table customers dengan table transactions One To Many 
    public function transactions() {
        return $this->hasMany(Transaction::class, 'id_customer');
    }
}
