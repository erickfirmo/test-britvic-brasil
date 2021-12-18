<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Session;

class VehicleController extends Controller
{
    protected $vehicle;

    public function __construct(Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = $this->vehicle->get();

        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            $vehicle = $this->vehicle->create($data);

            Session::flash('success', 'Veículo criado com sucesso!');

            return redirect()->route('vehicles.edit', ['vehicle' => $vehicle->id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('error', $e->getMessage());
            }

            Session::flash('error', 'Ocorreu um erro ao criar veículo!');
            
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('vehicles.edit', ['vehicle' => $id]);
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
            $vehicle = $this->vehicle->findOrFail($id);

            return view('vehicles.edit', compact('vehicle'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('error', $e->getMessage());
            }

            Session::flash('error', 'Veículo não encontrado!');
            
            return redirect()->back();
        }
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
        try {
            $data = $request->all();

            $vehicle = $this->vehicle->findOrFail($id);

            $vehicle->update($data);

            Session::flash('success', 'Veículo atualizado com sucesso!');

            return redirect()->route('vehicles.edit', ['vehicle' => $id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('error', $e->getMessage());
            }

            Session::flash('error', 'Veículo não encontrado!');
            
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
            if (env('APP_DEBUG'))
            {
                Session::flash('error', $e->getMessage());
            }

            Session::flash('error', 'Ocorreu um erro ao remover veículo!');
            
            return redirect()->back();
        }
    }
}
