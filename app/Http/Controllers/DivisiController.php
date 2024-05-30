<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Anggota;
use Illuminate\Http\Request;


class DivisiController extends Controller
{
    
    public function showDevisi($slug)
    {
        $divisi = Divisi::where('slug', $slug)->first();
        $anggotas = Anggota::where('divisi_id', $divisi->id)->get();
        return view('blog.pages.divisi', compact('divisi', 'anggotas'));
    }
    
}

