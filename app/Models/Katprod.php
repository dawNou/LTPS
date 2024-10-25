<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Katprod extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'katprod_id';
    protected $guarded = ['katprod_id'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'katprod_id');
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class, 'katprod_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namakatprod'
            ]
        ];
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'katprod_id');
    }
}
