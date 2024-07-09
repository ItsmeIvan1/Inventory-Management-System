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
        if ($request->ajax()) {
            $query = DB::table('tbl_suppliers')
                ->join('tbl_status', 'tbl_suppliers.status', '=', 'tbl_status.id')
                ->select('tbl_suppliers.*', 'tbl_status.status_name');
    
            return DataTables::of($query)
                ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] !== '') {
                        $search = $request->search['value'];
                        $query->where(function ($q) use ($search) {
                            $q->where('tbl_suppliers.name', 'like', "%{$search}%")
                                ->orWhere('tbl_suppliers.address', 'like', "%{$search}%")
                                ->orWhere('tbl_suppliers.contact_no', 'like', "%{$search}%")
                                ->orWhere('tbl_suppliers.email', 'like', "%{$search}%")
                                ->orWhere('tbl_status.status_name', 'like', "%{$search}%");
                        });
                    }
                })
                ->make(true);
        }

        return view('Supplier');

        // $data = DB::table('tbl_suppliers')
        //         ->join('tbl_status', 'tbl_suppliers.status', '=', 'tbl_status.id')
        //         ->select('tbl_suppliers.*', 'tbl_status.status_name')
        //         ->get();

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
    
    public function captureSupplierInModal($supplier_id)
    {
        $query = DB::table('tbl_suppliers')
                     ->where('supplier_id', $supplier_id)
                     ->first();
        
        return response()->JSON($query);
    }

    public function updateSupplierInModal(Request $request, $supplier_id)
    {

        $supplierId = $request->input('supplierId');
        $updatesupplierName = $request->input('updatesupplierName');
        $updateSupplierAddress = $request->input('updateSupplierAddress');
        $updateSupplierPhone = $request->input('updateSupplierPhone');
        $updateSupplierEmail = $request->input('updateSupplierEmail');

        $data = array (
            'name'          => $updatesupplierName,
            'address'       => $updateSupplierAddress,
            'contact_no'    => $updateSupplierPhone,
            'email'         => $updateSupplierEmail
        );


        $query = DB::table('tbl_suppliers')
                     ->where('supplier_id', $supplier_id)
                     ->update($data);
        
        if($query)
        {
            return response()->JSON([
                'status'    => 'success',
                'message'   => 'Successfully updated'
            ]);
        }

        else
        {
            return response()->JSON([
                'message'   => 'Something went wrong'
            ]);
        }

    
    }

    public function disabledSupplier($supplier_id)
    {

        $query = DB::table('tbl_suppliers')
                 ->where('supplier_id', $supplier_id)
                 ->update(['status' => 2]);
        
        if($query)
        {
            return response()->JSON([
                'status'    => 'success',
                'message'   => 'Successfully disabled'
            ]);
        }

        else
        {
            return response()->JSON([
                'message'   => 'Something went wrong'
            ]);
        }
    }

    public function retrievedUser($supplier_id)
    {
        $query = DB::table('tbl_suppliers')
        ->where('supplier_id', $supplier_id)
        ->update(['status' => 1]);

        if($query)
        {
        return response()->JSON([
            'status'    => 'success',
            'message'   => 'Successfully retrieved'
        ]);
        }

        else
        {
        return response()->JSON([
            'message'   => 'Something went wrong'
        ]);
        }
    }


}
