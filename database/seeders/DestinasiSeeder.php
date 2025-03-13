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
            'nama' => 'Pantai Pandan',
            'slug' => 'pantai-pandan',
            'deskripsi' => 'Pantai Pandan adalah salah satu pantai yang paling popular di Tapanuli Tengah. Ketika berada di pantai ini, sejauh mata memandang yang akan terlihat hanyalah perairan yang membentang di laut lepas. Di Pantai Pandan ini air lautnya berwarna hijau kebiru-biruan dan cukup jernih. Airnya tenang, bahkan tanpa ombak. Jadi, Anda bisa dengan bebas berenang sejauh beberapa meter dari mulut pantai dengan aman. Pasir di Pantai Pandan berwarna putih dan sangat lembut. Di sekitar pantai juga sangat bersih, sehingga sekalipin Anda berkeliling pantai Anda tidak akan menemukan sampah-sampah yang berserakan.',
            'gambar' => 'destinasi/destinasitapteng1.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Pulau Mursala',
            'slug' => 'pulau-mursala',
            'deskripsi' => 'Pulau Mursala adalah salah satu pulau yang berada di wilayah Kabupaten Tapanuli Tengah. Pulau ini termasuk wilayah Kecamatan Tapian Nauli, Tapanuli Tengah dan terletak di sebelah Barat Daya Kota Sibolga dan berjarak 22,5 km dari Pandan, Tapanuli Tengah. Pulau Mursala mempunyai luas ± 8.000 Ha dan dapat ditempuh melalui Pandan atau Sibolga menggunakan kapal cepat dalam waktu sekitar 1 jam atau menggunakan kapal biasa selama 3 jam. Pulau Mursala sangat popular di masyarakat Sumatera Utara, bahkan Indonesia. Hal tersebut karena keunikannya, yaitu air terjun yang berada di tengah laut. Bahkan Air terjun Pulau Mursala adalah salah satu tempat syuting film King Kong tahun 2005 oleh Peter Jackson. Dan di jadikan Judul Film drama indonesia yang bernuansa Batak, yang di sutradarai oleh Viva Westi pada tahun 2013.',
            'gambar' => 'destinasi/destinasitapteng2.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Pantai Binasi',
            'slug' => 'pantai-binasi',
            'deskripsi' => 'Pantai Binasi terletak di Kabupaten Tapanuli Tengah, tepatnya di kecamatan Sorkam Barat Tapanuli Tengah, Sumatera Utara. Kurang lebih memakan waktu 1 setengah jam dari Kota sibolga. Pantai ini belum banyak dipoles dan masih sangat natural. Pantai ini sangat lah panjang dan tidak jauh kalah keindahannya dengan pantai tapanuli tengah lainnya.',
            'gambar' => 'destinasi/destinasitapteng3.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Sungai Sibuluan',
            'slug' => 'sungai-sibuluan',
            'deskripsi' => 'Sungai Sibuluan yang terletak di Kabupaten Tapanuli Tengah terkenal sebagai tempat Balimo-limo yang merupakan tradisi untuk penyucian dan pembersihan diri sebelum berpuasa Ramadhan. Menyambut datangnya bulan suci Ramadhan, ribuan warga Kota Sibolga dan Kabupaten Tapanuli Tengah maupun dari luar daerah ber­bon­dong-bondong mendatangi objek wisata pemandian ini untuk mandi balimo-limo. Tradisi yang membudaya pada masyarakat Sibolga dan Tapanuli Tengah menjelang sehari sebelum bulan Puasa Ramadan, disambut dengan mandi Balimau atau bahasa Pesisir disebut Balimo-limo.',
            'gambar' => 'destinasi/destinasitapteng4.jpg',
        ]);
        Destinasi::create([
            'nama' => 'Makam Papan Tinggi Barus',
            'slug' => 'makam-papan-tinggi-barus',
            'deskripsi' => 'Kota Barus terletak di pantai barat pulau Sumatera, sekitar 60 km disebelah utara kota Sibolga, berada di sebelah selatan Kecamatan Singkil, Aceh Selatan. Barus dapat dicapai dengan menggunakan pesawat udara dari Medan ke Sibolga selama 30 menit dan dilanjutkan dengan perjalanan darat dari Sibolga selama 2 jam lagi menuju Barus. Atau bisa juga melalui perjalanan darat dengan minibus travel dari kota Medan, ke Barus selama 9 jam.
            <br>
            Sebagai kota tua dan bersejarah serta telah menjadi kota yang mempunyai Bandar niaga (pelabuhan) internasional sejak sebelum Masehi menjadikan Kota Barus menjadi Kota yang mempunyai peninggalan sejarah penting bagi masuk dan berkembangnya agama Islam pertama kali di Nusantara. Kota Barus atau biasa disebut Fansur barangkali satu-satunya kota di Nusantara yang namanya telah disebut sejak awal abad Masehi oleh literatur-literatur dalam berbagai bahasa, seperti dalam bahasa Yunani, Suriah, Armenia, Arab, India, Tamil, China, Melayu, dan Jawa.
            <br>
            Sebagian bukti sejarah penting di Barus diantaranya berupa Makam Islam kuno dengan sebuah penanda berupa tulisan arab di batu nisan yang terbuat dari batu cadas dengan tinggi sekitar 1,5 meter berat ratusan kilogram di pemakaman Papan Tinggi menyebutkan bahwa (sesuai yang tertulis di batu nisan) yang dimakamkan di tempat itu adalah sahabat nabi yang bernama Syekh Mahmud Fil Hadratul Maut yang ditahrikhkan pada tahun 34 H sampai 44 H. Dengan mengacu umur manusia yang berkisar 60 tahun sd 100 tahun, maka sangat logis dikatakan bahwa yang meninggal di Makam Islam kuno di Kota Barus Tapanuli Tengah Sumatera Utara adalah para sahabat Nabi Muhammad SAW.
            <br>
            Inilah salah satu fakta sejarah penting bagi negeri ini khusunya umat Islam yang perlu dirawat dan dilestarikan dengan baik yang bersumber dari tulisan di Batu Nisan di Makam Islam Kuno di Kota Barus Tapanuli Tengah Sumatera Utara Indonesia. Coba kalau di makam Islam Kuno tersebut tidak ada batu nisannya atau ada batu nisannya tapi tidak ada tulisannya maka sejarah penting masuknya Islam pertama kali di Indonesia Bumi Nusantara tidak akan pernah terungkap. Dan anak cucu kita kelak tidak akan mengenal nama-nama penyebar agama Islam yang berjasa besar dalam penyebaran aama Islam di Nusantara dan bahkan cenderung melupakannya serta menganggapnya hanya sekedar dongeng belaka ataupun malah hilang sama sekali dan dilupakan sejarah.',
            'gambar' => 'destinasi/destinasitapteng5.jpeg',
        ]);
        Destinasi::create([
            'nama' => 'Bandara Pinangsori',
            'slug' => 'bandara-pinangsori',
            'deskripsi' => 'Sedikit bergeser dari topik, bandara ini bukan sebagai tempat wisata, melainkan merupakan sebuah fasilitas tempat pesawat terbang untuk lepas landas dan mendarat. Bandar Udara Dr. Ferdinand Lumban Tobing adalah bandar udara yang terletak di Kecamatan Pinangsori, Kabupaten Tapanuli Tengah Sumatera Utara. Bandara yang melayani penerbangan Domestik ini memiliki ukuran landasan pacu 2.250 x 30 m. Nama Bandar Udara ini di ambil dari nama pahlawan nasional Indonesia asal Sumatera Utara. Bandara ini berjarak kurang lebih 40 km dari Kota Sibolga. Bandara ini sering disebut masyarakat luar sebagai bandara Sibolga.',
            'gambar' => 'destinasi/destinasitapteng6.jpg',
        ]);
    }
}
