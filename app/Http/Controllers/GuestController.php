<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Kontak;
use App\Models\Penginapan;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Transportasi;
use App\Models\Umkm;

class GuestController extends Controller
{   
    protected $kontak;
    public function __construct()
    {
        $kontak = Kontak::where('id', 1)->first();

        if (!$kontak) {
            abort(404);
        }

        $this->kontak = $kontak;
    }
    public function index()
    {
        $destinasi = Destinasi::limit(3)->get();

        return view('home', [
            'destinasi' => $destinasi,
            'kontak' => $this->kontak
        ]);
    }

    public function destinasi()
    {
        $destinasi = Destinasi::limit(3)->get();

        return view('destinasi', [
            'destinasi' => $destinasi,
            'kontak' => $this->kontak
        ]);
    }
    
    public function detailDestinasi($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->first();

        return view('detail', [
            'destinasi' => $destinasi,
            'kontak' => $this->kontak
        ]);
    }
    public function transportasi()
    {
        $transportasi = Transportasi::limit(3)->get();

        return view('transportasi', [
            'transportasi' => $transportasi,
            'kontak' => $this->kontak
        ]);
    }
    public function penginapan()
    {
        $penginapan = Penginapan::limit(3)->get();

        return view('penginapan', [
            'penginapan' => $penginapan,
            'kontak' => $this->kontak
        ]);
    }
    public function umkm()
    {
        $umkm = Umkm::limit(3)->get();

        return view('umkm', [
            'umkm' => $umkm,
            'kontak' => $this->kontak
        ]);
    }
}
