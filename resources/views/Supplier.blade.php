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
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li class="active">Supplier</li>
            </ul>
    
            
        </div>
        </div>
    
    <div class="content">

        <div style="padding-bottom: 5px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_vertical">Add supplier</button>
        </div>
        

        {{-- <table class="table datatable-basic">
            <thead>
                <tr class="bg-success">

                <th>Supplier Name</th>					
                <th>Supplier Address</th>
                <th>Phone </th>
                <th>Email</th>
                <th>Status</th>	
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            
             @foreach($suppliers as $supplier)
             
               <tr>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->address }}</td>
                <td>{{ $supplier->contact_no }}</td>
                <td>{{ $supplier->email }}</td>
                <td><span class="label label-success">{{ $supplier->status_name }}</span></td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <a onclick="" data-toggle="modal" data-target="#updateModal"><i class="icon-pencil4"></i>Update</a>
                                </li>
                                
                                @if( $supplier->status  == 1)
                                    <li>
                                        <a onclick="DisabledSupplier({{ $supplier->supplier_id }})"><i class="icon-user-block"></i>Disable</a></li>
                                    </li>
                                @else
                                    <li>
                                        <a onclick="RetrievedSupplier({{ $supplier->supplier_id }})" ><i class="icon-user-block"></i>Retrieved</a></li>
                                    </li>
                                @endif   
                            </ul>
                        </li>
                    </ul>
                </td>
               </tr>
             

            @endforeach

            </tbody>
        </table> --}}

        <table class="table datatable-basic">
            <thead>
                <tr class="bg-success">

                <th>Supplier Name</th>					
                <th>Supplier Address</th>
                <th>Phone </th>
                <th>Email</th>
                <th>Status</th>	
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            

            </tbody>
        </table>


    </div>

    <!-- Vertical form modal -->
    <div id="modal_form_vertical" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Supplier</h5>
                </div>

                <form id="addSupplierForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Supplier Name<span style="color: red;">*</span></label>
                                    <input type="text" name="supplierName" id="supplierName"  class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Supplier Address<span style="color: red;">*</span></label>
                                    <input type="text" name="supplierAddress" id="supplierAddress" class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Phone<span style="color: red;">*</span></label>
                                    <input type="text" name="supplierPhone" id="supplierPhone" class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Email<span style="color: red;">*</span></label>
                                    <input type="email" name="supplierEmail" id="supplierEmail"  class="form-control">
                                </div>

        
                            </div>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" id="addSupplier" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

    <div id="modal_form_vertical_update" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Supplier</h5>
                </div>

                <form id="updateSupplierForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <input type="hidden" name="supplierId" id="supplierId"  class="form-control">
                                <div class="col-sm-12">
                                    <label>Supplier Name<span style="color: red;">*</span></label>
                                    <input type="text" name="updatesupplierName" id="updateSupplierName"   class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Supplier Address<span style="color: red;">*</span></label>
                                    <input type="text" name="updatesupplierAddress" id="updateSupplierAddress" class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Phone<span style="color: red;">*</span></label>
                                    <input type="text" name="updatesupplierPhone" id="updateSupplierPhone" class="form-control">
                                </div>

                                <div class="col-sm-12">
                                    <label>Email<span style="color: red;">*</span></label>
                                    <input type="email" name="updatesupplierEmail" id="updateSupplierEmail"  class="form-control">
                                </div>

        
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="button" id="updateSupplier" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
</div>



<script>

    $('#li1').addClass('active');

    var headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

    // $('.datatable-basic').DataTable();

    $('.datatable-basic').dataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('index_supplier') }}",
        columns: [
            { data: 'name', name: 'tbl_suppliers.name' },
            { data: 'address', name: 'tbl_suppliers.address' },
            { data: 'contact_no', name: 'tbl_suppliers.contact_no' },
            { data: 'email', name: 'tbl_suppliers.email' },
            { data: 'status_name', name: 'tbl_status.id' },
            {
            data: null,
            render: function(data, type, row) {
                var dropdownHtml = '';

                    dropdownHtml += '<button type="button" class="btn btn-primary" onclick="fetchSupplier(' + row.supplier_id + ')" data-toggle="modal" data-target="#modal_form_vertical_update"><i class="icon-pencil4"></i>Update</button>'
                
                if (row.status_name == 'Active') {
                    dropdownHtml += '<button type="button" class="btn btn-danger" onclick="disableSupplier(' + row.supplier_id + ')"><i class="icon-user-block"></i> Disable</button>';
                } else {
                    dropdownHtml += '<button type="button" class="btn btn-success" onclick="retrieveSupplier(' + row.supplier_id + ')"><i class="icon-user-block"></i> Retrieve</button>';
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


    $('#addSupplier').click(function(){

        const formSupplier = $('#addSupplierForm').serialize();

       

        var supplierName = $('#supplierName');
        var supplierAddress = $('#supplierAddress');
        var supplierPhone = $('#supplierPhone');
        var supplierEmail = $('#supplierEmail');

        $.ajax({
        type: 'POST',
        url: "{{ route('create-supplier') }}",
        data: formSupplier,
        success: function(response) {

            if(response.status == 'success')
            {
                swal({
                title: "Success",
                text: response.message,
                type: "success",
                closeOnClickOutside: false
                });

                supplierName.val('');
                supplierAddress.val('');
                supplierPhone.val('');
                supplierEmail.val('');

                $('#modal_form_vertical').modal('hide');

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

    function fetchSupplier(id)
    {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        const supplierId = $('#supplierId');
        const updateSupplierName = $('#updateSupplierName');
        const updateSupplierAddress = $('#updateSupplierAddress');
        const updateSupplierPhone = $('#updateSupplierPhone');
        const updateSupplierEmail = $('#updateSupplierEmail');

        $.ajax({
            type: 'POST',
            url: "{{ url('/capture-supplier') }}/" + id,
            success: function(response) {

                supplierId.val(response.supplier_id);
                updateSupplierName.val(response.name);
                updateSupplierAddress.val(response.address);
                updateSupplierPhone.val(response.contact_no);
                updateSupplierEmail.val(response.email);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $('#updateSupplier').click(function(){

        const supplierId = $('#supplierId').val();
        const updateSupplierName = $('#updateSupplierName').val();
        const updateSupplierAddress = $('#updateSupplierAddress').val();
        const updateSupplierPhone = $('#updateSupplierPhone').val();
        const updateSupplierEmail = $('#updateSupplierEmail').val()

        $.ajax({
            type: 'PUT',
            url: "{{ url('/update-supplier') }}/" + supplierId,
            data: { updatesupplierName: updateSupplierName,
                    updateSupplierAddress: updateSupplierAddress,
                    updateSupplierPhone: updateSupplierPhone,
                    updateSupplierEmail: updateSupplierEmail
            },
            success: function(response) {

                if(response.status == 'success')
                {
                    swal({
                    title: "Success",
                    text: response.message,
                    type: "success",
                    closeOnClickOutside: false
                    });

                    $('#modal_form_vertical_update').modal('hide');

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

    function disableSupplier(id)
    {
                swal({
					title: "Are you sure?",
					text: 'You want to disabled this Supplier?',
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#EF5350",
					confirmButtonText: "Yes",
					closeOnConfirm: false,
					showCancelButton: true,
				},
				function(isConfirm){
					if (isConfirm)
					{

                        $.ajax({
                            type: 'PUT',
                            url: "{{ url('/disabled-supplier-status') }}/" + id,
                            headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                     },
                            success: function(response) {

                                if(response.status == 'success')
                                {
                                    swal({
                                    title: "Success",
                                    text: response.message,
                                    type: "success",
                                    closeOnClickOutside: false
                                    });

                                    $('#modal_form_vertical_update').modal('hide');

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

					}
					
					else 
					{
			
					}
				});
    }

    function retrieveSupplier(id)
    {
                swal({
					title: "Are you sure?",
					text: 'You want to retrieve this Supplier?',
					type: "info",
					showCancelButton: true,
					confirmButtonColor: "#EF5350",
					confirmButtonText: "Yes",
					closeOnConfirm: false,
					showCancelButton: true,
				},
				function(isConfirm){
					if (isConfirm)
					{

                        $.ajax({
                            type: 'PUT',
                            url: "{{ url('/retrieved-supplier-status') }}/" + id,
                            headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                     },
                            success: function(response) {

                                if(response.status == 'success')
                                {
                                    swal({
                                    title: "Success",
                                    text: response.message,
                                    type: "success",
                                    closeOnClickOutside: false
                                    });

                                    $('#modal_form_vertical_update').modal('hide');

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

					}
					
					else 
					{
			
					}
				});
    }

    


</script>

@include('includes/Footer')
