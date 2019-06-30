<?php

namespace App\Http\Controllers;

use App\WashCad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WashCadController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'max:20', 'unique:clients'],
            'birthdate' => ['required', 'date', 'max:255'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        return User::create([            
            'id_client' => $data['id_client'],
            'id_car' => $data['id_car'],
            'id_service' => $data['id_service'],
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
        $wash = new WashCad;
        $wash->id_client = $request->id_client;
        $wash->id_car = $request->id_car;
        $wash->id_service = $request->id_service;
        $wash->save();
        return redirect()->route('home')->with('message', 'Lavagem cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WashCad  $washCad
     * @return \Illuminate\Http\Response
     */
    public function show(WashCad $washCad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WashCad  $washCad
     * @return \Illuminate\Http\Response
     */
    public function edit(WashCad $washCad)
    {
        $wash = WashCad::findOrFail($id);
        return view('home', compact('wash'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WashCad  $washCad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WashCad $washCad)
    {
        $wash = WashCad::findOrFail($id);
        $wash->id_client = $request->id_client;
        $wash->id_car = $request->id_car;
        $wash->id_service = $request->id_service;
        $car->save();
        return redirect()->route('home')->with('message', "Lavagem Atualizada com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WashCad  $washCad
     * @return \Illuminate\Http\Response
     */
    public function destroy(WashCad $washCad)
    {
        $wash = WashCad::findOrFail($id);
        $wash->delete();
        return redirect()->route('home')->with('alert-success', 'Lavagem removida da base de dados!');
    }
}
