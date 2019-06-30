<?php

namespace App\Http\Controllers;

use App\ListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->id;
        $query = DB::table('washes')->select(DB::raw('washes.id, washes.id_client'))
                                       ->where('id', $id);
        return $query;
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ListService  $listService
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $r = listService::mostrar();
        return $r;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ListService  $listService
     * @return \Illuminate\Http\Response
     */
    public function edit(ListService $listService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ListService  $listService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListService $listService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ListService  $listService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListService $listService)
    {
        //
    }
}
