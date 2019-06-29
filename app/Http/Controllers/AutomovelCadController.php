<?php

namespace App\Http\Controllers;

use App\AutomovelCad;
use Illuminate\Http\Request;

class AutomovelCadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // protected $redirectTo = '/home';

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        return view('automovelcad');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'model' => ['required', 'string', 'max:255'],
            'plate' => ['required', 'string', 'max:255', 'unique:cars'],
            'color' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return User::create([
            'model' => $data['model'],
            'plate' => $data['plate'],
            'color' => $data['color'],
        ]);
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AutomovelCad  $automovelCad
     * @return \Illuminate\Http\Response
     */
    public function show(AutomovelCad $automovelCad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AutomovelCad  $automovelCad
     * @return \Illuminate\Http\Response
     */
    public function edit(AutomovelCad $automovelCad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AutomovelCad  $automovelCad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutomovelCad $automovelCad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AutomovelCad  $automovelCad
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutomovelCad $automovelCad)
    {
        //
    }
}
