<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'barang';
    protected $fillable = [
        'id_kategori',
        'nama',
        'deskripsi',
        'gambar',
        'penginput',
        'penyunting'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
