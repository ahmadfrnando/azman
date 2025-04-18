<?php

namespace App\Http\Controllers;

use App\Models\Penginapan;
use App\Models\PesananPenginapan;
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
            return redirect()->intended('/dashboard'); // Ubah sesuai dengan rute yang sesuai
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
        return view('user.dashboard');
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
            'jumlah_kamar' => 'required|integer|min:1|max:'.$penginapan->tersedia,
            'jumlah_hari' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            PesananPenginapan::create([
                'id_user' => Auth::user()->id,
                'id_penginapan' => $penginapan->id,
                'jumlah_kamar' => $request->input('jumlah_kamar'),
                'jumlah_hari' => $request->input('jumlah_hari'),
                'no_hp' => $request->input('no_hp'),
                'pesan' => $request->input('pesan'),
            ]);

            return redirect()->route('user.penginapan.detail', ['slug' => $penginapan->slug])->with('success', 'Pemesanan berhasil!');
        } catch (\Exception $e) {
            // Jika ada kesalahan saat menyimpan data
            return redirect()->back()->with('error', 'An error occurred during booking process.');
        }
    }
    
    public function transportasi()
    {
        return view('user.transportasi');
    }
}
