<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_suppliers;
use App\Models\tbl_status;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('tbl_suppliers')
            ->join('tbl_status', 'tbl_suppliers.status', '=', 'tbl_status.id')
            ->select('tbl_suppliers.*', 'tbl_status.status')
            ->get();

            return DataTables::of($data)
            ->make(true);
    
           
        }
        return view('Supplier');

        // return view('Supplier', ['suppliers' => $data]);
    }

    public function storeSupplier(Request $request)
    {

        $validatedData = $request->validate([
            'supplierName' => 'required|string|max:255',
            'supplierAddress' => 'required|string|max:255',
            'supplierPhone' => 'required|string|max:20',
            'supplierEmail' => 'required|email|max:255',
        ]);

        $supplier_name = $validatedData['supplierName'];
        $supplier_address = $validatedData['supplierAddress'];
        $supplier_phone = $validatedData['supplierPhone'];
        $supplier_email = $validatedData['supplierEmail'];


        $data = DB::table('tbl_suppliers')->insert([
            'name'          => $supplier_name,
            'address'       => $supplier_address,
            'contact_no'    => $supplier_phone,
            'email'         => $supplier_email,
            'status'        => 1
        ]);

        if($data)
        {
            return response()->JSON([
                    'status'    => 'success',
                    'message'   => 'Successfully Inserted'
            ], 200);
    
        }

        else
        {
            return response()->JSON([
                'message'   => 'Something went wrong.'
            ], 404);
        }



    }


}
