<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\Photo;

class GaleriController extends Controller
{
   public function index()
    {
        // Ambil daftar nama kategori untuk tab filter
        $categories = Category::pluck('name')->prepend('Semua');

        // Ambil foto beserta nama kategorinya
        $photos = Photo::with('category:id,name')
            ->where('is_active', true)
            ->latest()
            ->get()
            ->map(function ($photo) {
                return [
                    'id' => $photo->id,
                    'title' => $photo->title,
                    'category' => $photo->category->name, // Ambil nama dari relasi category
                    'span' => $photo->span,
                    'image' => $photo->image,
                    'description' => $photo->description,
                ];
            });

        return Inertia::render('GaleriView', [
            'categories' => $categories,
            'photos' => $photos,
        ]);
    }
}
