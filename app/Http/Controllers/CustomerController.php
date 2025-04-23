<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\PesananPenginapan;
use App\Models\PesananTransportasi;
use App\Models\Transportasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cek kredensial dan login pengguna
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Jika login berhasil
            return redirect()->intended('/user/dashboard'); // Ubah sesuai dengan rute yang sesuai
        }

        // Jika login gagal, kirim error message
        return redirect()->back()->with('error', 'Email atau password salah. Silakan coba lagi.');
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        Session::flush(); // Menghapus session
        return redirect('/login'); // Mengarahkan ke halaman login
    }

    public function registerProccess(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Confirmed untuk password dan konfirmasi password
        ]);


        // Jika validasi gagal, kembalikan response dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data user baru ke dalam database
        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), // Password di-hash sebelum disimpan
                'username' => $request->input('email'), // Password di-hash sebelum disimpan
            ]);

            // Setelah registrasi, login user secara otomatis
            Auth::login($user);

            // Redirect ke halaman dashboard atau halaman lain
            return redirect()->route('login')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            // Jika ada kesalahan saat menyimpan data
            return redirect()->back()->with('error', 'An error occurred during registration.');
        }
    }

    public function dashboard()
    {
        $penginapan = Penginapan::all();
        $transportasi = Transportasi::all();
        $pemesanan_penginapan = PesananPenginapan::where('id_user', Auth::user()->id)->get();
        $pemesanan_transportasi = PesananTransportasi::where('id_user', Auth::user()->id)->get();
        return view('user.dashboard', compact('penginapan', 'transportasi', 'pemesanan_penginapan', 'pemesanan_transportasi'));
    }

    public function penginapan()
    {
        $data = Penginapan::all();
        return view('user.penginapan', compact('data'));
    }

    public function penginapanDetail($slug)
    {
        $penginapan = Penginapan::where('slug', $slug)->firstOrFail();

        return view('user.penginapan-detail', compact('penginapan'));
    }


    public function penginapanPesan(Request $request, $slug)
    {
        $penginapan = Penginapan::where('slug', $slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'jumlah_kamar' => 'required|integer|min:1|max:' . $penginapan->tersedia,
            'jumlah_hari' => 'required|integer|min:1',
            'jumlah_orang' => 'required|integer|min:1',
            'tanggal_checkin' => 'required|date',
            'no_hp' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $totalHarga = $penginapan->harga * $request->input('jumlah_kamar') * $request->input('jumlah_hari');

        try {
            PesananPenginapan::create([
                'id_user' => Auth::user()->id,
                'id_penginapan' => $penginapan->id,
                'jumlah_kamar' => $request->input('jumlah_kamar'),
                'jumlah_orang' => $request->input('jumlah_orang'),
                'tanggal_checkin' => $request->input('tanggal_checkin'),
                'jumlah_hari' => $request->input('jumlah_hari'),
                'no_hp' => $request->input('no_hp'),
                'catatan' => $request->input('catatan'),
                'total_harga' => $totalHarga
            ]);

            return redirect()->route('user.penginapan.detail', ['slug' => $penginapan->slug])->with('success', 'Pemesanan berhasil!');
        } catch (\Exception $e) {
            // Jika ada kesalahan saat menyimpan data
            return redirect()->back()->with('error', 'An error occurred during booking process.');
        }
    }

    public function transportasi()
    {
        $data = Transportasi::all();
        return view('user.transportasi', compact('data'));
    }

    public function transportasiDetail($slug)
    {
        $transportasi = Transportasi::where('slug', $slug)->firstOrFail();

        return view('user.transportasi-detail', compact('transportasi'));
    }

    public function transportasiPesan(Request $request, $slug)
    {
        $transportasi = Transportasi::where('slug', $slug)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'jumlah_penumpang' => 'required|integer|min:1',
            'jumlah_kendaraan' => 'required|integer|min:1|max:' . $transportasi->tersedia,
            'jumlah_hari' => 'required|integer|min:1',
            'no_hp' => 'required|numeric',
            'tanggal_jemput' => 'required|date',
            'waktu_jemput' => 'required|date_format:H:i',
            'lokasi_jemput' => 'required|string',
            'lokasi_tujuan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $totalHarga = $transportasi->harga * $request->input('jumlah_kendaraan') * $request->input('jumlah_hari');

        try {
            PesananTransportasi::create([
                'id_user' => Auth::user()->id,
                'id_transportasi' => $transportasi->id,
                'jumlah_kendaraan' => $request->input('jumlah_kendaraan'),
                'jumlah_hari' => $request->input('jumlah_hari'),
                'jumlah_penumpang' => $request->input('jumlah_penumpang'),
                'lokasi_jemput' => $request->input('lokasi_jemput'),
                'lokasi_tujuan' => $request->input('lokasi_tujuan'),
                'waktu_jemput' => $request->input('waktu_jemput'),
                'tanggal_jemput' => $request->input('tanggal_jemput'),
                'no_hp' => $request->input('no_hp'),
                'catatan' => $request->input('catatan'),
                'total_harga' => $totalHarga
            ]);

            return redirect()->route('user.transportasi.detail', ['slug' => $transportasi->slug])->with('success', 'Pemesanan berhasil!');
        } catch (\Exception $e) {
            // Jika ada kesalahan saat menyimpan data
            return redirect()->back()->with('error', 'An error occurred during booking process.');
        }
    }

    public function riwayat()
    {   
        $hari_ini = date('Y-m-d');
        $riwayatPenginapan = PesananPenginapan::where('id_user', Auth::user()->id)->get();
        $riwayatTransportasi = PesananTransportasi::where('id_user', Auth::user()->id)->get();
        return view('user.riwayat', compact('riwayatPenginapan', 'riwayatTransportasi', 'hari_ini'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function profileForm()
    {
        $user = Auth::user();
        return view('user.profile-edit', compact('user'));
    }
    
    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('id', Auth::id())->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function pesanan()
    {
        $pesananPenginapan = PesananPenginapan::where('id_user', Auth::user()->id)->where('status_pesanan', 1)->get();
        $pesananTransportasi = PesananTransportasi::where('id_user', Auth::user()->id)->where('status_pesanan', 1)->get();

        return view('user.pesanan', compact('pesananPenginapan', 'pesananTransportasi'));
    }
}
