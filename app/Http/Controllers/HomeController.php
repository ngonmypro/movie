<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Movie_list = Movie::LeftJoin('img_movies', 'movies.id', '=', 'img_movies.id_movie')
                    ->select(
                        'movies.id',
                        'movies.name',
                        'movies.date_in',
                        'img_movies.name as img_name'
                    )
                    ->where('img_movies.main', true)
                    ->where('movies.status', true)
                    ->get();
Log::info("Movie_list ".json_encode($Movie_list, JSON_PRETTY_PRINT));
        $New_Movie_Rating = [];
        $param = [];
            foreach ($Movie_list as $key => $value) {
                $Movie_Rating = Review::where('id_movie', $value->id)
                                ->avg('point');

                $param['id']        = $value->id;
                $param['name']      = $value->name;
                $param['date_in']   = $value->date_in;
                $param['img_name']  = $value->img_name;
                $param['rating']    = $Movie_Rating ? $Movie_Rating : 0;
                array_push($New_Movie_Rating, $param);
            }

        return view('movies.main_movie', compact('New_Movie_Rating'));
    }
}
