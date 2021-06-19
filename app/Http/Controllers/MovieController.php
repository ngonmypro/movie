<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use App\Models\ImgMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Movie_List = Movie::paginate(10);
        return view('movies.index', compact('Movie_List'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('img');
        $new_image = date('Ymd').'_'.rand().'_'.$request->name.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_image);

        #   Insert into
        $Create_Movie = Movie::create([
                            'name'      => $request->name,
                            'date_in'   => $request->date_in,
                            'date_out'  => $request->date_out,
                        ]);

        $Create_Img = ImgMovie::create([
                            'id_movie'  => $Create_Movie->id,
                            'name'      => $new_image,
                        ]);

        return redirect('movie_manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Movie_Detail = Movie::where('id', $id)
                    ->first();

        $Rating = Review::where('id_movie', $Movie_Detail->id)
                ->avg('point');

        $Review = Review::where('id_movie', $Movie_Detail->id)->get();

        $Image_List = ImgMovie::where('id_movie', $Movie_Detail->id)
                    ->where('status', true)
                    ->orderByDesc('main')
                    ->paginate(1);
        Log::info("message".json_encode($Review, JSON_PRETTY_PRINT));
        return view('movies.detail', compact('Movie_Detail', 'Image_List', 'Rating', 'Review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Movie_Detail = Movie::where('id', $id)
                    ->first();
        Log::info("Edit ".$id);
        return view('movies.edit', compact('Movie_Detail', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Edit_Movie = Movie::find($id);
        $Edit_Movie->name       = $request->get('name');
        $Edit_Movie->date_in    = $request->get('date_in');
        $Edit_Movie->date_out   = $request->get('date_out');
        $Edit_Movie->status     = $request->get('status');
        $Edit_Movie->save();

        return redirect('movie_manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Delete_Movie = Movie::find($id);

        $Select_Img = ImgMovie::where('id_movie', $id)->get();
        foreach ($Select_Img as $key => $img_row) {
            $image_path = public_path('images').'/'.$img_row->name;

            unlink($image_path);
            $img_row->delete();
        }

        $Delete_Movie->delete();

        return redirect('movie_manage');
    }
}
