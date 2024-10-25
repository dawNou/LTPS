<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Pertanyaan extends Model
{
    use HasFactory, Sluggable;

    protected $primaryKey = 'pertanyaan_id';
    protected $guarded = ['pertanyaan_id'];
    protected $with = ['katprod'];
    
    public function katprod()
    {
        return $this->belongsTo(Katprod::class, 'katprod_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'pertanyaan_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'soal'
            ]
        ];
    }
}
