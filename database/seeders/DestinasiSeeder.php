<?php

namespace Database\Seeders;

use App\Models\Destinasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        Destinasi::create([
            'nama' => 'Danau Siais',
            'slug' => 'danau-siais',
            'deskripsi' => 'Danau Siais adalah salah satu tempat wisata alam yang memukau di Tapanuli Selatan, Sumatera Utara. Terletak di kaki pegunungan, danau ini menawarkan pemandangan yang menenangkan dengan air yang jernih dikelilingi oleh pepohonan hijau. Pengunjung dapat menikmati udara segar, berperahu, atau hanya sekedar bersantai menikmati keindahan alam. Danau Siais juga menjadi tempat yang ideal untuk fotografi dan berkemah, menjadikannya pilihan sempurna bagi pecinta alam dan petualang.',
            'gambar' => 'destinasi/destinasi1.jpeg',
        ]);
        Destinasi::create([
            'nama' => 'Aek Sijorni',
            'slug' => 'aek-sijorni',
            'deskripsi' => 'Sudah bukan menjadi rahasia umum lagi, Aek Sijorni merupakan salah satu objek wisata populer yang menjadi icon dari  KabaputenTapanuli Selatan. Aek Sijorni terkenal karena air yang begitu jernih, mengalir langsung dari pegunungan. Tempat wisata ini telah ada sejak lama sekali namun hingga kini masih tetap eksis dan memiliki banyak pengunjung.',
            'gambar' => 'destinasi/destinasi2.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Air Terju Si Lima-lima',
            'slug' => 'air-terjun-si-lima-lima',
            'deskripsi' => 'Air Terjun Si Lima-Lima terletak di Kec. Marancar, Kab. Tapanuli Selatan. Air Terjun ini merupakan air terjun paling populer di masyarakat Tapanuli Selatan.Air terjun ini berada cukup jauh di pedalaman dan harus menaiki begitu banyak anak tangga. Namun, sesampainya di sana pasti anda tidak akan menyesal  karena pemandangan yang disuguhkan begitu indah dan alami.',
            'gambar' => 'destinasi/destinasi3.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Aek Sabaon Si Bio-bio',
            'slug' => 'aek-sabon-si-bio-bio',
            'deskripsi' => 'Aek Sabaon atau juga terkenal dengan sebutan Si Bio-Bio adalah sebuah objek wisata di Kecamatan Marancar. Beberapa tahun belakangan, tempat wisata ini menjadi sangat populer di masyarakat. Banyak masyarakat dan juga pasangan yang berdatangan bersama keluarganya ke sini di saat liburan.Lantaran karena Aek Sabaon memiliki pemandangan yang indah yang memiliki banyak spot foto yang bagus. Tak sedikit masyarakat menyebutnya seperti swiss-mini, karena pemandangannya itu.',
            'gambar' => 'destinasi/destinasi4.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Puncak Tor Si Mago-mago',
            'slug' => 'puncak-tor-si-mago-mago',
            'deskripsi' => 'Puncak Si Mago-Mago terletak di Kec. Sipirok, salah satu tempat wisata paling populer di Tapanuli Selatan. Dari puncak ini, kamu bisa menyaksikan pemandangan yang begitu indah. Hamparan bukit hijau luas yang dapat menyejukkan mata. Cocok sebagai tempat untuk healing.',
            'gambar' => 'destinasi/destinasi5.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Puncak Saragodung',
            'slug' => 'puncak-saragodung',
            'deskripsi' => 'Puncak Saragodung adalah ekowisata terkenal lainnya di Sipirok. Puncak mungkin terlihat tidak begitu jauh berbeda dari puncak tor si mago-mago, tapi tetap saja tempat yang berbeda pasti memiliki pesonanya masing-masing.Selain itu, Puncak Saragodung juga sedikit lebih tinggi daripada puncak si mago-mago jadi pasti lebih menantang.',
            'gambar' => 'destinasi/destinasi6.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Taman Hotel Tor Sibohi',
            'slug' => 'taman-hotel-tor-sibohi',
            'deskripsi' => 'Taman hotel tor si bohi juga terletak di Kecamatan Sipirok. Hal yang membuat tempat ini begitu menarik adalah tamannya yang begitu luas dan sangat asri, juga bentuk hotelnya yang bergaya rumah adat. Benar-benar menggambarkan suasana pedesaan yang menyegarkan mata.Sudah banyak anak muda telah menghabiskan waktu untuk bermain ke tempat ini, karena spot fotonya memang asthetic-able.',
            'gambar' => 'destinasi/destinasi7.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Pantai Barat Muara Upu',
            'slug' => 'pantai-barat-muara-upu',
            'deskripsi' => 'Pantai Barat merupakan sebuah pantai yang terletak di sudut Tapanuli Selatan di Kecamatan Muara Batangtoru dan berhadapan langsung dengan Samudera Hindia. Pantai ini terkenal akan kekayaan alam baharinya, pun pasir putihnya yang indah.Namun belakangan, kepopuleran pantai menurun dikalangan masyarakat Tapanuli Selatan.',
            'gambar' => 'destinasi/destinasi8.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Parsariran',
            'slug' => 'parsariran',
            'deskripsi' => 'Ekowisata berkonsep pemandian umum lainnya di Tapanuli Selatan adalah Parsariran. Pemandian Parsariran ini memiliki air yang sangat jernih dan batu-batu yang begitu besar. Tempat masih selalu ramai pengunjung di saat weekend lho padahal sudah sangat lama.',
            'gambar' => 'destinasi/destinasi9.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Gunung Si Bual-buali',
            'slug' => 'gunung-si-bual-buali',
            'deskripsi' => 'Gunung Si Bual-Buali adalah gunung stratovolcano yang terletak di Kecamatan Sipirok. Gunung ini terkenal dengan kawa haritte, yang merupakan spot foto favorit anak-anak muda. Sudah banyak sekali masyarakat yang mendaki ke gunung untuk menyaksikan pesona alam Tapanuli Selatan.',
            'gambar' => 'destinasi/destinasi10.jpg',
        ]);


    }
}
