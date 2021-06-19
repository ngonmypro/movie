<?php

use App\Models\Movie;
use App\Models\ImgMovie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CreateMovie extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'      => 'DESERT DRAGON (2021) เทพมังกรทะเลทราย',
                'date_in'   => '2021-06-19',
                'date_out'  => '2021-07-10',
                'img'       => '20210620_1015843574_DESERT DRAGON (2021) เทพมังกรทะเลทราย.png',
            ],
            [
                'name'      => 'ALLEYCATS (2016) ปั่นชนนรก',
                'date_in'   => '2021-06-19',
                'date_out'  => '2021-07-10',
                'img'       => '20210620_1200169073_ALLEYCATS (2016) ปั่นชนนรก.png',
            ],
            [
                'name'      => 'SECURITY (2021) ระบบอันตราย',
                'date_in'   => '2021-06-19',
                'date_out'  => '2021-07-08',
                'img'       => '20210620_2083651934_SECURITY (2021) ระบบอันตราย.png',
            ],
            [
                'name'      => 'NOBODY (2021) คนธรรมดานรกเรียกพี่',
                'date_in'   => '2021-06-20',
                'date_out'  => '2021-07-10',
                'img'       => '20210620_1266477855_NOBODY (2021) คนธรรมดานรกเรียกพี่.png',
            ],
            [
                'name'      => 'XTREME (2021) เอ็กซ์ตรีม',
                'date_in'   => '2021-06-20',
                'date_out'  => '2021-07-10',
                'img'       => '20210620_2130797600_XTREME (2021) เอ็กซ์ตรีม.png',
            ],
            [
                'name'      => 'RAYA AND THE LAST DRAGON (2021) รายากับมังกรตัวสุดท้าย',
                'date_in'   => '2021-06-19',
                'date_out'  => '2021-06-29',
                'img'       => '20210620_2075464366_RAYA AND THE LAST DRAGON (2021) รายากับมังกรตัวสุดท้าย.png',
            ],
            [
                'name'      => 'FAST & FURIOUS 9 (2021) เร็ว แรงทะลุนรก 9',
                'date_in'   => '2021-06-20',
                'date_out'  => '2021-07-20',
                'img'       => '20210620_1643167063_FAST & FURIOUS 9 (2021) เร็ว แรงทะลุนรก 9.png',
            ],
            [
                'name'      => 'INFINITE (2021) อินฟินิท',
                'date_in'   => '2021-06-21',
                'date_out'  => '2021-07-15',
                'img'       => '20210620_516393037_INFINITE (2021) อินฟินิท.png',
            ],
            [
                'name'      => 'INSIGHT (2021) ล้วงปมระทึก',
                'date_in'   => '2021-06-21',
                'date_out'  => '2021-06-30',
                'img'       => '20210620_1096353465_INSIGHT (2021) ล้วงปมระทึก.png',
            ],
        ];

        foreach ($data as $key => $value) {
            $Create_Movie = Movie::create([
                'name'      => $value['name'],
                'date_in'   => $value['date_in'],
                'date_out'  => $value['date_out'],
            ]);

            $Create_Img = ImgMovie::create([
                'id_movie'  => $Create_Movie->id,
                'name'      => $value['img'],
            ]);
        }
    }
}
