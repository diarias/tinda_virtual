<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorListDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorListController extends Controller
{
    public function index(VendorListDataTable $dataTable)
    {
        return $dataTable->render('admin.vendor-list.index');
    }

    public function changeStatus(Request $request)
    {
        $customer = Vendor::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 1 : 0;
        $customer->save();

        return response(['message' => 'El estado se a cambiado correctamente!']);
    }
}
