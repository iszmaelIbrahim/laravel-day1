<?php

namespace App\Http\Controllers;

use App\Mail\NewAnime;
use App\Models\Anime;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Mail;


class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $response = Http::get('https://swapi.dev/api/people/?page=2');
        $response_json = $response->json();

        $animes = Anime::all();
        return view('animes.index',[
            'animes'=>$animes,
            'apiData' => $response_json['results']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $anime = new Anime;

        $anime->nama = $request->nama;
        $anime->episod = $request->episod;
        $anime->tahun = $request->tahun;

        // $anime->file_path = $request->gambar;

        $anime->studio_id = $request->studio_id;

        $anime->save();

        foreach (['iszmael97@gmail.com', 'profis4457029@gmail.com'] as $recipient) {
            Mail::to($recipient)->send(new NewAnime());
        }


        return redirect('/animes/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        //
        return view('animes.show',[
            'anime'=>$anime
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        //
        $anime = new Anime;

        $anime->nama = $request->nama;
        $anime->episod = $request->episod;
        $anime->tahun = $request->tahun;

        $anime->studio_id = $request->studio_id;

        $anime->save();

        return redirect('/animes/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        //
    }
}
