<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $client = DB::table('clients')->count('id');
        $client = DB::table('clients')->select(DB::raw('count(id) as id_client'))->get();
        $service = DB::table('services')->select(DB::raw('count(id) as id_service'))->get();
        $wash = DB::table('washes')->join('services', 'washes.id_service', '=', 'services.id')
                                   ->select(DB::raw('count(services.id) as total, sum(services.price) as price'))
                                   ->where('washes.created_at', '>', DB::raw('(NOW() - INTERVAL 30 DAY)'))
                                   ->get();
        $washYear = DB::table('washes')->join('services', 'washes.id_service', '=', 'services.id')
                                       ->select(DB::raw('count(services.id) as total, sum(services.price) as price'))
                                       ->where('washes.created_at', '>', DB::raw('(NOW() - INTERVAL 1 YEAR)'))
                                       ->get();
        return view('home', compact('client', 'service', 'wash', 'washYear'));
    }

    public function listar(Request $request) {   
        // Consulta os dados a serem exibidos
        $query = DB::table('washes')->join('clients AS cli', 'washes.id_client', '=', 'cli.id')
                                    ->join('cars AS car', 'washes.id_car', '=', 'car.id')
                                    ->join('services AS ser', 'washes.id_service', '=', 'ser.id')
                                    ->select(DB::raw('cli.id as cli_id, cli.name, cli.cpf, cli.birthdate,
                                                      car.id as car_id, car.model, car.plate, car.color,
                                                      ser.id as ser_id, ser.name, ser.price'))
                                    ->order_by('ser.created_at', 'desc')
                                    ->get();
        // Monta os dados de acordo com o datatable
        $datatable =  Datatables::of($query);

        /**
        *
        * Retorna os dados no formato 
        * requisitado pelo datatable e 
        * impede o envio da coluna action
        * para a tabela.
        *
        * Isso porque a coluna action,
        * não possui dados, e sim os botões 
        * de ação editar e excluir. 
        **/
        return $datatable->blacklist(['action'])->make(true);
    }   
}
