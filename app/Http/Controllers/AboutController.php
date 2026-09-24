<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Feature;


use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $features = Feature::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return Inertia::render('About', [
            'features' => $features
        ]);
    }
}
