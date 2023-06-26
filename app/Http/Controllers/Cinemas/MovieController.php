<?php

namespace App\Http\Controllers\Cinemas;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $moviePerCinema = [];
        $cinemasToReturn = [];
        $cinemas = auth()->user()->cinemas;
        if (!$cinemas->isEmpty()){
            foreach ($cinemas as $cinema){
                $cinemasToReturn[$cinema->id] = $cinema;
                if (!$cinema->movies->isEmpty()){
                    foreach ($cinema->movies as $movie){
                        $moviePerCinema[$cinema->id][] = $movie;
                    }
                }
            }
        }

        return view('auth.cinemas.movies', compact('moviePerCinema', 'cinemasToReturn'));

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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function edit(Movie $movie)
    {
        $movie = Movie::find($movie->id);
        $cinemas = auth()->user()->cinemas;

        return view('auth.cinemas.single_movie', compact('cinemas', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Movie $movie
     * @return RedirectResponse
     */
    public function update(Request $request, Movie $movie)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'timetable' => 'required',
            'imdb_link' => 'required',
        ]);

        if ($validator->validated()) {

            $data = $request->except('_method', '_token');
            $data['imdb_code'] = $this->findImdbCodeByLink($data['imdb_link']);

            Movie::where('id', $movie->id)
                ->update($data);
        }

        return back()->with(['success' => 'Επεξεργαστήκατε επιτυχώς την ταινία!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Movie $movie)
    {
        Movie::destroy($movie->id);
        Session::flash('delete', "Διαγράψατε επιτυχώς την ταινία: " . $movie->title);
        return redirect(route('movie.movies'));
    }

    private function findImdbCodeByLink(mixed $imdb_link)
    {
        return str_replace('tt', '', basename($imdb_link));
    }
}
