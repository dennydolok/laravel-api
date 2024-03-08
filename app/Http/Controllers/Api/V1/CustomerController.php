<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\UpdateCustomerRequest;
use App\http\Controllers\Controller;
use App\http\Resources\V1\CustomerResource;
use App\http\Resources\V1\CustomerCollection;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Filters\V1\CustomersFilters;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new CustomersFilters();
        $filterItems = $filter->transform($request); //[['column', 'operator', 'value']]
        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterItems);
        if ($includeInvoices){
            $customers = $customers->with('invoices');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, )
    {
        $includeInvoices = request()->query('includeInvoices');
        if ($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}