<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactInfo;
use Inertia\Inertia;


class KontakController extends Controller
{
    public function index(){

        $contactInfos = ContactInfo::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get(['id', 'title', 'value', 'icon_type', 'bg_color']);

        return Inertia::render('KontakView', [
            'contactInfos' => $contactInfos,
        ]);
    }

    public function store(Request $request)
    {
        // 1. Validasi di sisi server (Sangat Penting)
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|regex:/^[0-9+\s-]{8,15}$/',
            'pesan' => 'required|string',
        ]);

        // 2. Simpan ke database
        Contact::create($validated);


        return back();
    }
}
