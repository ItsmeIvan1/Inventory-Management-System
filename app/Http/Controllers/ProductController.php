<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tbl_suppliers;
use App\Models\tbl_products;
use App\Models\tbl_categories;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $queryForSupplier = DB::table('tbl_suppliers')
                            ->where(['status' => 1])
                            // ->orderBy('name', 'asc')
                            ->get();
        
        $queryForCategory = DB::table('tbl_categories')
                                ->where(['category_status' => 1])
                                // ->orderBy('category_name', 'asc')
                                ->get();
        
        if($request->ajax())
        {
            $query = DB::table('tbl_products')
            ->join('tbl_status', 'tbl_products.product_status', '=', 'tbl_status.id')
            ->join('tbl_suppliers', 'tbl_products.supplier_id', '=', 'tbl_suppliers.supplier_id')
            ->join('tbl_categories', 'tbl_products.category_id', '=', 'tbl_categories.category_id')
            ->select('tbl_products.*', 'tbl_status.status_name', 'tbl_suppliers.name', 'tbl_categories.category_name');

            return DataTables::of($query)
                    ->filter(function ($query) use ($request) {
                    if ($request->has('search') && $request->search['value'] !== '') {
                        $search = $request->search['value'];
                        $query->where(function ($q) use ($search) {
                            $q->where('tbl_products.product_name', 'like', "%{$search}%")
                                ->orWhere('tbl_products.product_description', 'like', "%{$search}%")
                                ->orWhere('tbl_products.product_unit', 'like', "%{$search}%")
                                ->orWhere('tbl_products.product_price', 'like', "%{$search}%")
                                ->orWhere('tbl_products.product_quantity', 'like', "%{$search}%")
                                ->orWhere('tbl_status.status_name', 'like', "%{$search}%")
                                ->orWhere('tbl_products.other_details', 'like', "%{$search}%")
                                ->orWhere('tbl_suppliers.name', 'like', "%{$search}%")
                                ->orWhere('tbl_categories.category_name', 'like', "%{$search}%");
                            });
                        }
                    })

                ->make(true);
        }

        return view('Product', ['supplier' => $queryForSupplier], ['category' => $queryForCategory]);
    }

    public function addProduct(Request $request)
    {
        $Product_name           = $request->input('productName');
        $Product_description    = $request->input('productDescription');
        $Product_unit           = $request->input('productUnit');
        $Product_price          = $request->input('productPrice');
        $Product_quantity       = $request->input('productQuantity');
        $Product_details        = $request->input('productOtherDetails');
        $Product_supplier       = $request->input('productSupplier');
        $Product_category       = $request->input('productCategory');

        $queryInsert = DB::table('tbl_products')->insert([
            'product_name'          => $Product_name,
            'product_description'   => $Product_description,
            'product_unit'          => $Product_unit,
            'product_price'         => $Product_price,
            'product_quantity'      => $Product_quantity,
            'product_status'        => 1,
            'other_details'         => $Product_details,
            'supplier_id'           => $Product_supplier,
            'category_id'           => $Product_category,
            'created_at'            => now()
        ]);

        if($queryInsert)
        {

            return response()->JSON([
                'status'    => 'success',
                'message'   => 'Successfully created'
            ], 200);
        }

        else
        {
            return response()->JSON([
                'message'   => 'Something went wrong'
            ], 500);
        }

        
 
    }
}
