<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Destination;
use App\Models\Facility;

use Illuminate\Http\Request;

class WisataController extends Controller
{
   public function index()
    {
        $wisataList = Destination::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        $fasilitasList = Facility::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return Inertia::render('WisataView', [
            'wisataList' => $wisataList,
            'fasilitasList' => $fasilitasList,
        ]);
    }
}
