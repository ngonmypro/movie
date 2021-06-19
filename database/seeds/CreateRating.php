<?php

use App\Models\Review;
use Illuminate\Database\Seeder;

class CreateRating extends Seeder
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
                'id_movie'  => '1',
                'id_user'   => '1',
                'point'     => '5',
                'comment'   => 'TEST COMMENT',
            ],
            [
                'id_movie'  => '1',
                'id_user'   => '2',
                'point'     => '4',
                'comment'   => 'New Test',
            ],
            [
                'id_movie'  => '2',
                'id_user'   => '3',
                'point'     => '3',
                'comment'   => 'TT',
            ],
            [
                'id_movie'  => '3',
                'id_user'   => '2',
                'point'     => '4',
                'comment'   => '',
            ],
            [
                'id_movie'  => '7',
                'id_user'   => '1',
                'point'     => '5',
                'comment'   => 'Very Good',
            ],
            [
                'id_movie'  => '9',
                'id_user'   => '3',
                'point'     => '1',
                'comment'   => '',
            ],
            [
                'id_movie'  => '9',
                'id_user'   => '2',
                'point'     => '3',
                'comment'   => '',
            ],
            [
                'id_movie'  => '4',
                'id_user'   => '2',
                'point'     => '4',
                'comment'   => '...',
            ],
            [
                'id_movie'  => '6',
                'id_user'   => '1',
                'point'     => '3',
                'comment'   => '',
            ],
            [
                'id_movie'  => '8',
                'id_user'   => '1',
                'point'     => '4',
                'comment'   => 'AAA',
            ],
            [
                'id_movie'  => '5',
                'id_user'   => '2',
                'point'     => '5',
                'comment'   => 'SSS',
            ],
            [
                'id_movie'  => '4',
                'id_user'   => '1',
                'point'     => '5',
                'comment'   => '',
            ],
        ];

        foreach ($data as $key => $value) {
            Review::create([
                'id_movie'      => $value['id_movie'],
                'id_user'       => $value['id_user'],
                'point'         => $value['point'],
                'comment'       => $value['comment'],
            ]);
        }
    }
}
