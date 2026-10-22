<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos = [
            [
                'title' => 'Matahari Terbit di Kaldera Bromo',
                'location' => 'Taman Nasional Bromo Tengger Semeru, Jawa Timur',
                'photographer' => 'Raden Arya Wicaksana',
                'image' => 'bromo-sunrise.jpg',
                'category' => 'Lanskap Pegunungan',
                'description' => 'Pemandangan magis saat fajar merekah di atas kaldera purba Gunung Bromo dan Batok, berselimut kabut tebal lembut di lembah pasir berbisik dengan latar megah kerucut Gunung Semeru yang mengeluarkan asap solfatara.',
            ],
            [
                'title' => 'Zamrud Gugusan Karang Misool',
                'location' => 'Kepulauan Raja Ampat, Papua Barat Daya',
                'photographer' => 'Dian Kartika Putri',
                'image' => 'raja-ampat.jpg',
                'category' => 'Bahari & Lautan',
                'description' => 'Pesona kepulauan karst purba yang dikelilingi laguna toska bergradasi biru kobalt. Habitat surga terumbu karang tropis terkaya di dunia yang mencerminkan kejernihan ekosistem laut nusantara.',
            ],
            [
                'title' => 'Sang Predator Purba Komodo',
                'location' => 'Taman Nasional Komodo, Nusa Tenggara Timur',
                'photographer' => 'Bima Satria Nugraha',
                'image' => 'komodo-dragon.jpg',
                'category' => 'Satwa Liar',
                'description' => 'Potret jarak dekat kadal terbesar di dunia (Varanus komodoensis) yang tengah berjemur di savana gersang pulau vulkanik. Simbol kekuatan dan ketahanan fauna purbakala Indonesia.',
            ],
            [
                'title' => 'Tirai Megah Air Terjun Tumpak Sewu',
                'location' => 'Lumajang, Jawa Timur',
                'photographer' => 'Fajar Santoso',
                'image' => 'tumpak-sewu.jpg',
                'category' => 'Lanskap Air',
                'description' => 'Aliran air terjun setengah lingkaran berbentuk tirai raksasa alami dengan ketinggian 120 meter. Air bersumber dari aliran Sungai Glidik yang berhulu langsung di lereng Gunung Semeru.',
            ],
            [
                'title' => 'Tatapan Teduh Orangutan Sumatra',
                'location' => 'Taman Nasional Gunung Leuser, Aceh & Sumatra Utara',
                'photographer' => 'Siti Nurhaliza Wardani',
                'image' => 'orangutan-sumatra.jpg',
                'category' => 'Satwa Liar',
                'description' => 'Momen emosional seorang induk orangutan Sumatra (Pongo abelii) bertengger di kanopi pohon kanari hutan hujan tropis primer, menjaga bayinya dengan penuh kehangatan naluriah.',
            ],
            [
                'title' => 'Danau Kawah Asam Ijen nan Memikat',
                'location' => 'Kawah Ijen, Banyuwangi, Jawa Timur',
                'photographer' => 'Yusuf Maulana',
                'image' => 'kawah-ijen.jpg',
                'category' => 'Fenomena Alam',
                'description' => 'Danau kawah klorida paling asam di dunia dengan warna hijau toska yang menakjubkan, dikelilingi dinding tebing belerang karsit yang dramatis dan uap belerang aktif.',
            ],
            [
                'title' => 'Ketenangan Danau Kaldera Toba',
                'location' => 'Danau Toba, Sumatra Utara',
                'photographer' => 'Grace Nainggolan',
                'image' => 'danau-toba.jpg',
                'category' => 'Lanskap Pegunungan',
                'description' => 'Pagi tenang di danau vulkanik supervulkano terbesar di Asia Tenggara, menampakkan refleksi bukit pinus hijau dan permukaan air yang hening laksana cermin tak berbatas.',
            ],
            [
                'title' => 'Lorong Dongeng Hutan De Djawatan',
                'location' => 'Benculuk, Cluring, Banyuwangi',
                'photographer' => 'Hendra Prasetyo',
                'image' => 'hutan-de-djawatan.jpg',
                'category' => 'Hutan & Flora',
                'description' => 'Jajaran pohon trembesi raksasa berusia ratusan tahun yang diselimuti tanaman epifit rimbun. Cahaya mentari pagi menembus celah dedaunan bagaikan pemandangan hutan fantasi.',
            ],
            [
                'title' => 'Siluet Senja di Perairan Komodo',
                'location' => 'Labuan Bajo, Nusa Tenggara Timur',
                'photographer' => 'Anisa Rahmawati',
                'image' => 'labuan-bajo-sunset.jpg',
                'category' => 'Bahari & Lautan',
                'description' => 'Gurat langit jingga kemerahan memudar lembut menyinari perahu pinisi tradisional yang lego jangkar di antara bukit pulau tak berpenghuni di Laut Flores.',
            ],
        ];

        foreach ($photos as $photo) {
            Photo::updateOrCreate(
                ['title' => $photo['title']],
                $photo
            );
        }
    }
}

