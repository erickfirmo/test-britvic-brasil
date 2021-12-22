<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Session;
use App\Http\Requests\Customers\StoreCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Http\Traits\ViewAlerts;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    use ViewAlerts;
    
    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->middleware('auth');

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

            $this->error($e, 'Ocorreu um erro ao carregar a listagem de clientes!');

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
            
            $this->error($e, 'Ocorreu um erro ao carregar a página de cadastro de clientes');

            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Customers\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $data = $request->validated();

            $customer = $this->customer->create($data);

            $this->success('Cliente criado com sucesso!');

            return redirect()->route('customers.edit', ['customer' => $customer->id]);

        } catch (\Exception $e) {

            $this->error($e, 'Ocorreu um erro ao criar cliente');

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
        try {
            $customer = $this->customer->findOrFail($id);

            $disabled = true;

            return view('customers.show', compact('customer', 'disabled'));

        } catch (\Exception $e) {
            
            $this->error($e, 'Ocorreu um erro ao carregar as informações do cliente!');

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
            $customer = $this->customer->findOrFail($id);

            return view('customers.edit', compact('customer'));

        } catch (\Exception $e) {
            
            $this->error($e, 'Ocorreu um erro ao carregar as informações do cliente');

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Customers\UpdateCustomerRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        try {
            $data = $request->all();

            $customer = $this->customer->findOrFail($id);

            $customer->update($data);

            $this->success('Cliente atualizado com sucesso!');

            return redirect()->route('customers.edit', ['customer' => $id]);

        } catch (\Exception $e) {
            if (env('APP_DEBUG'))
            {
                Session::flash('danger', 'Ocorreu um erro ao atualizar as informações do cliente:' . $e->getMessage());
                return redirect()->back();
            }

            Session::flash('danger', 'Ocorreu um erro ao atualizar as informações do cliente!');
            return redirect()->back();


            $this->error($e, 'Ocorreu um erro ao carregar as informações do cliente');

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
            $customer = $this->customer->findOrFail($id);

            $customer->delete();

            $this->success('Cliente removido com sucesso!');

            return redirect()->route('customers.index');

        } catch (\Exception $e) {

            $this->error($e, 'Ocorreu um erro ao remover cliente:');

            return redirect()->back();
        }
    }
}
