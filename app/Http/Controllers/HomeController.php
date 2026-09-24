<?php

namespace App\Http\Controllers;
use App\Models\HeroSection;
use Inertia\Inertia;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    // Ambil data hero section yang aktif
        $hero = HeroSection::where('is_active', true)->first();

        return Inertia::render('Home', [
            'hero' => $hero
        ]);
  }


}
