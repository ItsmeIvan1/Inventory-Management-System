@include('includes/Header')
@include('includes/Navbar')


<div class="content-wrapper">

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
    
            <a class="heading-elements-toggle"><i class="icon-more"></i></a></div>
    
            
        </div>
    
            <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                <ul class="breadcrumb">
                    <li><a href=""><i class="icon-home2 position-left"></i> Dashboard</a></li>
                    <li class="active">Product</li>
                </ul>
        
                
            </div>
        </div>

    
    
    <div class="content">

        <div style="padding-bottom: 5px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical">Add Product</button>
        </div>

        <div class="panel panel-flat">
           <div class="panel-body">
                <table class="table datatable-basic">
                    <thead>
                        <tr class="bg-success">
        
                        <th>Product Name</th>					
                        <th>Product Description</th>
                        <th>Product Unit</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>	
                        <th>Product Status</th>	
                        <th>Other details</th>	
                        <th>Supplier Name</th>	
                        <th>Category Name</th>	
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    
        
                    </tbody>
                </table>
            </div>
        </div>



    </div>
</div>

<div id="modal_form_vertical" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Supplier</h5>
            </div>

            <form id="addProductForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Product Name<span style="color: red;">*</span></label>
                                <input type="text" name="productName" id="productName"  class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Product Description<span style="color: red;">*</span></label>
                                <input type="text" name="productDescription" id="productDescription" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Product Unit<span style="color: red;">*</span></label>
                                <input type="text" name="productUnit" id="productUnit" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Product Price<span style="color: red;">*</span></label>
                                <input type="text" name="productPrice" id="productPrice" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Product Quantity<span style="color: red;">*</span></label>
                                <input type="text" name="productQuantity" id="productQuantity" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Other details<span style="color: red;">*</span></label>
                                <input type="text" name="productOtherDetails" id="productOtherDetails" class="form-control">
                            </div>

                            <div class="col-sm-12">
                                <label>Supplier<span style="color: red;">*</span></label>
                                <select name="productSupplier" id="productSupplier" class="form-control">
                                    <option value="" >Select supplier</option>
                                    @foreach($supplier as $suppliers)
                                    <option value="{{ $suppliers->supplier_id }}">{{$suppliers->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12">
                                <label>Category<span style="color: red;">*</span></label>
                                <select name="productCategory" id="productCategory" class="form-control">
                                    <option value="">Select category</option>
                                    @foreach($category as $categories)
                                    <option value="{{ $categories->category_id }}">{{$categories->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                   

    
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" id="addProduct" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

$('#li2 ').addClass('active');

$('.datatable-basic').dataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('index_product') }}",
        columns: [
            { data: 'product_name', name: 'tbl_products.product_name' },
            { data: 'product_description', name: 'tbl_products.product_description' },
            { data: 'product_unit', name: 'tbl_products.product_unit' },
            { data: 'product_price', name: 'tbl_products.product_price' },
            { data: 'product_quantity', name: 'tbl_products.product_quantity' },
            { data: 'status_name', name: 'tbl_status.status_name' },
            { data: 'other_details', name: 'tbl_products.other_details' },
            { data: 'name', name: 'tbl_suppliers.name' },
            { data: 'category_name', name: 'tbl_categories.category_name' },
            {
            data: null,
            render: function(data, type, row) {
                var dropdownHtml = '';

                    dropdownHtml += '<button type="button" class="btn btn-primary" onclick="fetchSupplier(' + row.product_id + ')" data-toggle="modal" data-target="#modal_form_vertical_update"><i class="icon-pencil4"></i>Update</button>'
                
                if (row.status_name == 'Active') {
                    dropdownHtml += '<button type="button" class="btn btn-danger" onclick="disableSupplier(' + row.product_id + ')"><i class="icon-user-block"></i> Disable</button>';
                } else {
                    dropdownHtml += '<button type="button" class="btn btn-success" onclick="retrieveSupplier(' + row.product_id + ')"><i class="icon-user-block"></i> Retrieve</button>';
                }
                
                dropdownHtml += '';
                
                return dropdownHtml;
            },
            orderable: false,
            searchable: false
            }
        ],

        order: [[0, 'asc']]
});


$('#addProduct').click(function(){

    const addProductForm = $('#addProductForm').serialize();

    $.ajax({
        type: 'POST',
        url: "{{ route('create-product') }}",
        data: addProductForm,
        success: function(response) {

            if(response.status == 'success')
            {
                swal({
                title: "Success",
                text: response.message,
                type: "success",
                closeOnClickOutside: false
                });

                $('#modal_form_vertical').modal('hide');

                $('#productName').val('');
                $('#productDescription').val('');
                $('#productUnit').val('');
                $('#productPrice').val('');
                $('#productQuantity').val('');
                $('#productOtherDetails').val('');
                $('#productSupplier').val('');
                $('#productCategory').val('');

                $('.datatable-basic').DataTable().ajax.reload();

            }

            else
            {
                swal({
                title: "Error",
                text: response.message,
                type: "error",
                closeOnClickOutside: false
                });
            }

        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
})

</script>

@include('includes/footer')