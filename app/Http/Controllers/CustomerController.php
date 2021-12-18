<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $customers = $this->customer->orderBy('id', 'desc')->paginate(20);

            return view('customers.index', compact('customers'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar a listagem de usuários:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar a listagem de usuários!');
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

            return view('customers.create');

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar a página de cadastro de usuários:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar a página de cadastro de usuários!');
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

            $customer = $this->customer->create($data);

            Session::flash('success', 'Veículo criado com sucesso!');

            return redirect()->route('customers.edit', ['customer' => $customer->id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao criar usuário: '. $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao criar usuário!');
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
        return redirect()->route('customers.edit', ['customer' => $id]);
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
            $customer = $this->customer->findOrFail($id);

            return view('customers.edit', compact('customer'));

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao carregar as informações do usuário:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao carregar as informações do usuário!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
