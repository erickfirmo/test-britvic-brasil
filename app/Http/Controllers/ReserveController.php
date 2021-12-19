<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\Vehicle;
use App\Models\Customer;
use Session;
use Illuminate\Support\Facades\DB;

class ReserveController extends Controller
{
    protected $reserve;

    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $reserves = $this->reserve->orderBy('id', 'desc')->paginate(20);

            return view('reserves.index', compact('reserves'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar a listagem de reservas:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar a listagem de reservas!');
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

            $vehicles = Vehicle::select(DB::raw("CONCAT(model, ' (', brand, ')') AS name"), 'id')
                                ->pluck('name', 'id');

            $customers = Customer::select(DB::raw("CONCAT(name, ' (', document_number, ')') AS name"), 'id')
                                ->pluck('name', 'id');                    

            return view('reserves.create', compact('vehicles', 'customers'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar a página de cadastro de reservas:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar a página de cadastro de reservas!');
            return redirect()->back();
        }
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

            $reserve = $this->reserve->create($data);

            Session::flash('success', 'Reserva criado com sucesso!');

            return redirect()->route('reserves.edit', ['reserve' => $reserve->id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao criar reserva: '. $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao criar reserva!');
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
        return redirect()->route('reserves.edit', ['reserve' => $id]);
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
            $reserve = $this->reserve->findOrFail($id);

            return view('reserves.edit', compact('reserve'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar as informações da reserva:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar as informações do reserva!');
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

            $reserve = $this->reserve->findOrFail($id);

            $reserve->update($data);

            Session::flash('success', 'Reserva atualizado com sucesso!');

            return redirect()->route('reserves.edit', ['reserve' => $id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao atualizar as informações da reserva:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao atualizar as informações da reserva!');
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
            $reserve = $this->reserve->findOrFail($id);

            $reserve->delete();

            Session::flash('success', 'Reserva removido com sucesso!');

            return redirect()->route('reserves.index');

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao remover reserva:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao remover reserva!');
            return redirect()->back();
        }
    }
}
