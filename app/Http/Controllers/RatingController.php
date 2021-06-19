<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function Post(Request $request)
    {

        Log::info("user ".Auth::user()->id);
        Log::info("Post ".json_encode($request->all(), JSON_PRETTY_PRINT));
        $Review = Review::create([
            'id_movie'      => $request->movie,
            'id_user'       => Auth::user()->id,
            'point'         => $request->rating,
            'comment'       => $request->comment,
        ]);

        return redirect('movie_manage/'.$request->movie);
    }
}
