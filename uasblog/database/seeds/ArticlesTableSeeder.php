<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => '3',
                'category_id' => '1',
                'title' => '10 Pantai Terindah Di Bali & Terbaik Untuk Dikunjungi',
                'description' => 'Daya tarik utama pariwisata Bali terdapat pada tempat wisata alam, salah satunya adalah tempat wisata pantai. 
                                Hampir semua wisatawan yang berlibur di Bali, pastinya akan mengunjungi tempat wisata pantai. 
                                Terutama objek wisata pantai yang memiliki pasir putih dengan pemandangan sunset.',
                'image' => 'pantai.jpg'
            ],
            [
                'user_id' => '3',
                'category_id' => '2',
                'title' => 'Info Wisata Gunung Semeru di Jawa Timur: Rute, Harga Tiket, dan Tips',
                'description' => 'Salah satu gunung berapi yang masih dikenal aktif di Jawa Timur yakni Gunung Semeru. Puncaknya berada pada ketinggian 3.676 meter 
                                di atas permukaan laut, sehingga menjadikannya sebagai gunung tertinggi di Pulau Jawa. ',
                'image' => 'gunung.jpg'
            ],
            [
                'user_id' => '4',
                'category_id' => '3',
                'title' => '12 Cara Menikmati Liburan di Danau Toba',
                'description' => 'Pulau Samosir adalah sumber penghasil kebudayaan serta berbagai kesenian yang ada di Danau Toba. Pulau yang dihuni 
                                oleh mayoritas etnis Batak Toba ini menyimpan legenda, kesenian, dan budaya yang menarik untuk ditelusuri. Untuk menuju 
                                ke Samosir, menyeberanglah menggunakan kapal yang biasanya digunakan oleh masyarakat yang ada di pelabuhan Tiga Ras atau Ajibata.',
                'image' => 'danau.jpg'
            ]
        ]);
    }
}
