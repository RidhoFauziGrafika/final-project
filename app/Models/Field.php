<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'harga',
        'deskripsi',
        'jam_buka',
        'jam_tutup',
        'gambar',
        'status',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
