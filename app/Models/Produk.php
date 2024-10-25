<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Produk extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'produk_id';
    protected $guarded = ['produk_id'];
    protected $with = ['katprod'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_produk', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['katprod'] ?? false, function ($query, $katprod) {
            return $query->whereHas('katprod', function ($query) use ($katprod) {
                $query->where('slug', $katprod);
            });
        });
    }

    public function katprod()
    {
        return $this->belongsTo(Katprod::class, 'katprod_id');
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'produk_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_produk'
            ]
        ];
    }

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'produk_id');
    }

    // Dalam model Produk
    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class, 'katprod_id', 'katprod_id');
    }
}
