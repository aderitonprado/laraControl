<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Cast\String_;
use Symfony\Component\Console\Input\StringInput;

class SupplyControllerApi extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function index(Request $request)
    {
        $offset = $request->offset ?? 0;
        $limit = $request->limit ?? 15;
        
        $array['data'] = Supply::with('thirdyParties')->orderBy('id', 'desc')->paginate($limit, ['*'], 'page', $offset);
        return $array;
    }

    public function show(Request $request)
    {
        $array['error'] = '';
        $search = Supply::find($request->id);

        if (!$search) {
            $array['error'] = 'Abastecimento não encontrado!';
            return $array;
        }

        $array['data'] = $search;

        return $array;
    }

    public function store(Request $request)
    {
        $array['error'] = '';

        $validator = Validator::make($request->all(), [
            'supply_date'      => 'required',
            'third_party_code' => 'required',
            'supply_driver'    => 'required',
            'client_type'      => 'required',
            'vehicles_last_km' => 'required',
            'qtd'              => 'required',
            'start_time'       => 'required',
            'third_party_id'   => 'required',
        ]);

        if ($validator->fails()) {
            $arr['error'] = $validator->messages();
            return $arr;
        }

        $supply_date = Carbon::createFromFormat('d/m/Y', $request->input('supply_date'))->format('d-m-Y');
        $supply_date = Carbon::createFromFormat('d-m-Y', $supply_date)->format('Y-m-d');

        $arr['supply_date']       = $supply_date;
        $arr['third_party_code']  = $request->input('third_party_code');
        $arr['supply_driver']     = $request->input('supply_driver');
        $arr['client_type']       = $request->input('client_type');
        $arr['vehicles_last_km']  = $request->input('vehicles_last_km');
        $arr['qtd']               = $request->input('qtd');
        $arr['obs']               = $request->input('obs');
        $arr['start_time']        = $request->input('start_time');
        $arr['third_party_id']    = $request->input('third_party_id');
        $arr['vehicles_plate']    = $request->input('vehicles_plate');

        $arr['supply_pump']         = 1;
        $arr['warehouse']           = 1;
        $arr['pump_start']          = 1;
        $arr['pump_end']            = 1;
        $arr['pump_price']          = 3.50;
        $arr['pump_total_price']    = 3.50 * $request->input('qtd');
        $arr['end_time']            = $request->input('start_time');
        $arr['hour_meter']          = 1;
        $arr['vehicles_fleet']      = 1;

        $arr['user_id'] = $this->loggedUser->id;

        try {
            $array['data'] = Supply::create($arr);
            //return $array;
        } catch (\Throwable $th) {
            $array['error'] = $th->getMessage();
        }

        return $array;
    }

    public function update(Request $request)
    {
        $array['error'] = '';
        $validator = Validator::make($request->all(), [
            'supply_date'      => 'required',
            'third_party_code' => 'required',
            'supply_driver'    => 'required',
            'client_type'      => 'required',
            'vehicles_last_km' => 'required',
            'qtd'              => 'required',
            'start_time'       => 'required',
            'third_party_id'   => 'required',
            'third_party_code' => 'required',
        ]);

        if ($validator->fails()) {
            $array['error'] = $validator->messages();
            return $array;
        }

        //return $request->all();

        $supply = Supply::find($request->id);
        
        $supply_date = Carbon::createFromFormat('d/m/Y', $request->input('supply_date'))->format('d-m-Y');
        $supply_date = Carbon::createFromFormat('d-m-Y', $supply_date)->format('Y-m-d');

        $supply->supply_date            = $supply_date;
        $supply->third_party_code       = $request->third_party_code;
        $supply->supply_driver          = $request->supply_driver;
        $supply->client_type            = $request->client_type;
        $supply->vehicles_last_km       = $request->vehicles_last_km;
        $supply->qtd                    = $request->qtd;
        $supply->start_time             = $request->start_time;
        $supply->third_party_id         = $request->third_party_id;
        $supply->vehicles_plate         = $request->vehicles_plate;
        $supply->obs                    = $request->obs;
        
        $supply->end_time               = $request->start_time;
        $supply->userid_update          = $this->loggedUser->id;
        $supply->supply_pump            = 1;
        $supply->warehouse              = 1;
        $supply->pump_start             = 1;
        $supply->pump_end               = 1;
        $supply->pump_price             = 3.50;
        $supply->pump_total_price       = $request->qtd * 3.50;
        $supply->hour_meter             = 1;
        $supply->vehicles_fleet         = 1;

        try {
            $array['data'] = $supply->update();
        } catch (\Throwable $th) {
            $array['error'] = $th->getMessage();
        }

        return $array;
    }

    public function destroy(Request $request)
    {
        $array['error'] = '';
        if(!Supply::find($request->id)){
            $array['error'] = 'Abastecimento não encontrado!';
            return $array;
        }

        $del = Supply::destroy($request->id);

        if($del){ 
            $array['data'] = 'Abastecimento excluído com sucesso!';
        }

        return $array;
    }

    public function totals()
    {
        $array = ['error' => ''];

        $array['total_abastecimentos_geral'] = Supply::all()->count();

        $startOfWeek = Carbon::now()->locale('pt_BR')->startOfWeek()->toDateString();
        $endOfWeek = Carbon::now()->locale('pt_BR')->endOfWeek()->toDateString();
        $startOfMonth = Carbon::now()->locale('pt_BR')->firstOfMonth()->toDateString();
        $endOfMonth = Carbon::now()->locale('pt_BR')->endOfMonth()->toDateString();
        $today = Carbon::now()->locale('pt_BR')->today()->toDateString();

        $array['total_abastecimentos_mes'] = Supply::where('supply_date', '>=', $startOfMonth)
        ->where('supply_date', '<=', $endOfMonth)
        ->count();

        $array['total_litros_mes'] = Supply::where('supply_date', '>=', $startOfMonth)
        ->where('supply_date', '<=', $endOfMonth)->sum('qtd');

        $array['total_abastecimentos_semana'] = Supply::where('supply_date', '>=', $startOfWeek)
        ->where('supply_date', '<=', $endOfWeek)->count();

        $array['total_litros_semana'] = Supply::where('supply_date', '>=', $startOfWeek)
        ->where('supply_date', '<=', $endOfWeek)->sum('qtd');

        $array['total_abastecimentos_hoje'] = Supply::where('supply_date', '=', $today)->count();
        $array['total_litros_hoje'] = Supply::where('supply_date', '=', $today)->sum('qtd');

        return $array;
    }
}
