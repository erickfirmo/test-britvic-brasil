<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Session;
use App\Http\Requests\Vehicles\StoreVehicleRequest;
use App\Http\Requests\Vehicles\UpdateVehicleRequest;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Http\Traits\ViewException;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    use ViewException;

    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->middleware('auth');

        $this->vehicle = $vehicle;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $vehicles = $this->vehicle->orderBy('id', 'desc')->paginate(20);

            return view('vehicles.index', compact('vehicles'));

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao carregar a listagem de veículos');

            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            return view('vehicles.create');

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao carregar a página de cadastro de veículos');

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Vehicles\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        try {
            $data = $request->validated();

            $vehicle = $this->vehicle->create($data);

            Session::flash('success', 'Veículo criado com sucesso!');

            return redirect()->route('vehicles.edit', ['vehicle' => $vehicle->id]);

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao criar veículo');

            return redirect()->back();
        }
    }

    /**
     * Return date range
     *
     * @param  string  $date
     * @param  string  $format
     * @return string
     */
    public function getDateRange($date, $format)
    {
        $date = $date->format($format);

        $start = Carbon::createFromFormat($format, $date)->startOfMonth()->toDateString();;

        $end = Carbon::createFromFormat($format, $date)->endOfMonth()->toDateString();

        $dateRange = CarbonPeriod::create($start, $end)->toArray();

        return $dateRange;
    }

    /**
     * Display the specified resource.
     * 
     * @param  Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $request->validate([
                'month' => 'date_format:m-Y|nullable'
            ]);

            $month = $request->input('month') ? Carbon::createFromFormat('m-Y', $request->input('month')) : Carbon::now();
            $lastMonth = $month;
            $nextMonth = $month;

            $dateRange = $this->getDateRange($month, 'm-Y');

            $month = $month->format('m/Y');
            $lastMonth = $lastMonth->subMonths(1)->format('m-Y');
            $nextMonth = $nextMonth->addMonths(2)->format('m-Y');

            $vehicle = $this->vehicle->findOrFail($id);

            $reserves =  collect($vehicle->reserves)->mapWithKeys(function($reserve, $key) {
                return [$reserve->date->format('Y-m-d') => $reserve];
            });

            $reserveDays = collect($dateRange)->mapWithKeys(function($date, $key) use ($reserves) {
                return [$date->format('d/m/Y') => ($reserves->has($date->format('Y-m-d')) ? $reserves[$date->format('Y-m-d')] : null)];
            });

            $disabled = true;
    
            return view('vehicles.show', compact('vehicle', 'disabled', 'reserveDays', 'month', 'lastMonth', 'nextMonth'));

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao carregar as informações do veículo');

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $request->validate([
                'month' => 'date_format:m-Y|nullable'
            ]);

            $month = $request->input('month') ? Carbon::createFromFormat('m-Y', $request->input('month')) : Carbon::now();
            $lastMonth = $month;
            $nextMonth = $month;

            $dateRange = $this->getDateRange($month, 'm-Y');

            $month = $month->format('m/Y');
            $lastMonth = $lastMonth->subMonths(1)->format('m-Y');
            $nextMonth = $nextMonth->addMonths(2)->format('m-Y');

            $vehicle = $this->vehicle->findOrFail($id);

            return view('vehicles.edit', compact('vehicle', 'reserveDays', 'month', 'lastMonth', 'nextMonth'));

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao carregar as informações do veículo');

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Vehicles\UpdateVehicleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $vehicle = $this->vehicle->findOrFail($id);

            $vehicle->update($data);

            Session::flash('success', 'Veículo atualizado com sucesso!');

            return redirect()->route('vehicles.edit', ['vehicle' => $id]);

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao atualizar as informações do veículo');

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehicle = $this->vehicle->findOrFail($id);

            $vehicle->delete();

            Session::flash('success', 'Veículo removido com sucesso!');

            return redirect()->route('vehicles.index');

        } catch (\Exception $e) {

            $this->exception($e, 'Ocorreu um erro ao remover veículo');

            return redirect()->back();
        }
    }
}
