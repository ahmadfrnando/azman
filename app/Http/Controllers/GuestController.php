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
        $destinasi = Destinasi::paginate(6);

        return view('destinasi', [
            'destinasi' => $destinasi,
            'kontak' => $this->kontak,
            'pesan' => false,
            'linkDetail' => 'destinasi',
        ]);
    }

    public function transportasi()
    {
        $transportasi = Transportasi::paginate(6);

        return view('transportasi', [
            'transportasi' => $transportasi,
            'kontak' => $this->kontak,
            'pesan' => true,
            'linkDetail' => 'transportasi',
        ]);
    }
    public function penginapan()
    {
        $penginapan = Penginapan::paginate(6);

        return view('penginapan', [
            'penginapan' => $penginapan,
            'kontak' => $this->kontak,
            'linkDetail' => 'penginapan',
            'pesan' => true
        ]);
    }
    public function umkm()
    {
        $umkm = Umkm::paginate(6);

        return view('umkm', [
            'umkm' => $umkm,
            'kontak' => $this->kontak,
            'pesan' => true,
            'linkDetail' => 'umkm',
        ]);
    }

    public function detailDestinasi($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->first();

        return view('detail', [
            'item' => $destinasi,
            'kontak' => $this->kontak,
            'pesan' => false
        ]);
    }
    public function detailPenginapan($slug)
    {
        $penginapan = Penginapan::where('slug', $slug)->first();

        return view('detail', [
            'item' => $penginapan,
            'kontak' => $this->kontak,
            'pesan' => true
        ]);
    }
    public function detailTransportasi($slug)
    {
        $transportasi = Transportasi::where('slug', $slug)->first();

        return view('detail', [
            'item' => $transportasi,
            'kontak' => $this->kontak,
            'pesan' => true
        ]);
    }
    public function detailUmkm($slug)
    {
        $umkm = Umkm::where('slug', $slug)->first();

        return view('detail', [
            'item' => $umkm,
            'kontak' => $this->kontak,
            'pesan' => true
        ]);
    }
}
