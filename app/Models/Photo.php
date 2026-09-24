<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'span',
        'image',
        'description',
        'is_active',
    ];

    // Relasi: Satu foto dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
