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
        'ditambahkan_oleh',
        'disunting_oleh'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
