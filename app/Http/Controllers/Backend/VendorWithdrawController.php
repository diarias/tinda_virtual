<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorWithdrawDataTable;
use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use App\Models\Vendor;
use App\Models\WithdrawMethod;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VendorWithdrawController extends Controller
{
        /**
     * Display a listing of the resource.
     */

    public function index(VendorWithdrawDataTable $dataTable)
    {
        $vendorid = Vendor::where('user_id', auth()->user()->id)->value('id');
       //dd($vendorid);
        $totalEarnings = OrderProduct::where('vendor_id', $vendorid)
        ->whereHas('order', function($query){
            $query->where('payment_status', 1)->where('order_status', 'delivered');
        })
        ->sum(DB::raw('unit_price * qty + variant_total'));

        



        $totalWithdraw = WithdrawRequest::where('status', 'paid')
        ->where('vendor_id',  $vendorid)
        ->sum('total_amount');

        

        $currentBalance = $totalEarnings - $totalWithdraw;

        $pendingAmount = WithdrawRequest::where('status', 'pending')
        ->where('vendor_id',  $vendorid)
        ->sum('total_amount');



        return $dataTable->render('vendor.withdraw.index', compact('currentBalance', 'totalWithdraw', 'pendingAmount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $methods = WithdrawMethod::all();
        return view('vendor.withdraw.create', compact('methods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method' => ['required', 'integer'],
            'amount' => ['required', 'numeric'],
            'account_info' => ['required', 'max:2000']
        ]);

        $method = WithdrawMethod::findOrFail($request->method);

        if($request->amount < $method->minimum_amount || $request->amount > $method->maximum_amount){
           throw ValidationException::withMessages(["The amount have to be getter then $method->minimum_amount and less then $method->maximum_amount"]);
        }




        $vendorid = Vendor::where('user_id', auth()->user()->id)->value('id');
        //dd($vendorid);
         $totalEarnings = OrderProduct::where('vendor_id', $vendorid)
         ->whereHas('order', function($query){
             $query->where('payment_status', 1)->where('order_status', 'delivered');
         })
         ->sum(DB::raw('unit_price * qty + variant_total'));
 








        $totalWithdraw = WithdrawRequest::where('status', 'paid')->sum('total_amount');

        $currentBalance = $totalEarnings - $totalWithdraw;

        if($request->amount > $currentBalance){
            throw ValidationException::withMessages(['Insufficient Balance']);
        }

        if(WithdrawRequest::where(['vendor_id' => auth()->user()->id, 'status' => 'pending'])->exists()){
            throw ValidationException::withMessages(['You already have a pending request']);
        }


        $id_vendedor =  Vendor::where('user_id', auth()->user()->id)->value('id');

        $withdraw = new WithdrawRequest();
        $withdraw->vendor_id = $id_vendedor;
        $withdraw->method = $method->name;
        $withdraw->total_amount = $request->amount;
        $withdraw->withdraw_amount = $request->amount - ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->withdraw_charge = ($method->withdraw_charge / 100) * $request->amount;
        $withdraw->account_info = $request->account_info;
        $withdraw->save();

        toastr('Request added successfully');

        return redirect()->route('vendor.withdraw.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $methodInfo = WithdrawMethod::findOrFail($id);

        return response($methodInfo);
    }

    function showRequest(string $id)
    {
        $vendorid = Vendor::where('user_id', auth()->user()->id)->value('id');
        $request = WithdrawRequest::where('vendor_id', $vendorid)->findOrFail($id);

        return view('vendor.withdraw.show', compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
