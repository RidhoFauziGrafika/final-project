<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pemesanan',
        'waktu_mulai',
        'waktu_selesai',
        'total_harga',
        'users_id',
        'fields_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function field()
    {
        return $this->belongsTo(Field::class, 'fields_id');
    }
}
