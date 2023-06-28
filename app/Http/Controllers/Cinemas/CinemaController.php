<?php

namespace App\Http\Controllers\Cinemas;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $userCinemas = [];
        $cinemas = auth()->user()->cinemas;
        if (!$cinemas->isEmpty()){
            $userCinemas = $cinemas;
        }

        return view('auth.cinemas.all', compact('userCinemas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('auth.cinemas.create_cinema');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->validated()) {
            $data = $request->except('_method', '_token');
            Cinema::create($data);

            return redirect(route('cinema.cinemas'))->with(['success' => 'Προσθέσατε επιτυχώς την ταινία!']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param Cinema $cinema
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cinema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cinema $cinema
     * @return Application|Factory|View
     */
    public function edit(Cinema $cinema)
    {
        $cinema = Cinema::find($cinema->id);
        return view('auth.cinemas.single_cinema', compact('cinema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cinema $cinema
     * @return RedirectResponse
     */
    public function update(Request $request, Cinema $cinema)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->validated()) {

            $data = $request->except('_method', '_token');

            Cinema::where('id', $cinema->id)
                ->where('user_id', Auth::user()->id)
                ->update($data);
        }

        return back()->with(['success' => 'Επεξεργαστήκατε επιτυχώς τον κινηματογράφο!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cinema $cinema
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Cinema $cinema)
    {
        Cinema::destroy($cinema->id);
        Session::flash('delete', "Διαγράψατε επιτυχώς την ταινία: " . $cinema->name);
        return redirect(route('cinema.cinemas'));
    }
}
