@include('includes/Header');

<div class="page-container" >

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

        
                <!-- Grid -->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <!-- Horizontal form -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Create Account<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">
                                <form class="form-horizontal" id="createForm">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label col-lg-2">First name<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="firstname" id="firstname" class="form-control">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Middle name<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="middlename" id="middlename" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Last name<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="lastname" id="lastname" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Suffix</label>
                                        <div class="col-lg-10">
                                            <select name="suffix" id="suffix" class="form-control">
                                                <option value=""></option>
                                                <option value="JR">JR</option>
                                                <option value="SR">SR</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                                <option value="V">V</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Age<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="age" id="age" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Email<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="email" name="email" id="email" class="form-control">
                                            <span style="color: red; padding: 1px; display: none;" id="spanEmail"></span>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Username<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="text" name="username" id="username" class="form-control">
                                            <span style="color: red; padding: 1px; display: none;" id="spanUsername"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Password<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="password" name="password" id="password" class="form-control">
                                            <span style="color: red; padding: 1px; display: none;" id="spanPassword"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-lg-2">Re-type Password<span style="color: red;">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="password" name="retypepassword" id="retypepassword" class="form-control">
                                            <span style="color: red; padding: 1px; display: none;" id="spanRetypePassword"></span>
                                        </div>
                                    </div>


                                    <div class="text-right">
                                        <a href="{{ route('login') }}">Log in</a>
                                        <button type="button" id="btnCreateAcc" class="btn btn-primary">Create Account <i class="icon-arrow-right14 position-right"></i></button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /horizotal form -->

                    </div>

               
                </div>
                <!-- /grid -->


            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>

<script>

    $(document).ready(function(){

        var pattern = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;

        var headers = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};

        const buttonCreate = $('#btnCreateAcc').prop('disabled', true);

        $('#btnCreateAcc').click(function(){

            var formData = $('#createForm').serialize();

            $.ajax({
                type: 'POST',
                url: "{{ route('create') }}",
                data: formData,
                // headers: headers,
                success: function(response) {

                    if(response.status == 'empty')
                    {
                        swal({
                        title: "Error",
                        text: response.message,
                        type: "error",
                        closeOnClickOutside: false
                        });
                    }

                    else
                    {
                        if(response.status == 'success')
                        {
                            console.log(response.message);

                            swal({
                            title: "Success",
                            text: response.message,
                            type: "success",
                            closeOnClickOutside: false
                            });

                            $('#createForm input[type="text"]').val('');
                            $('#createForm input[type="password"]').val('');
                            $('#createForm input[type="email"]').val('');
                            $('#createForm select').val('');
                        }

                        else
                        {
                            console.log(response.message)

                        }
                    }


                },

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })

        $('#email').keyup(function(){

            const thisEmail = $(this).val();

            $.ajax({
                type: 'POST',
                url: "{{ route('findEmail') }}",
                data: {email: thisEmail},
                headers: headers,
                success: function(response) {

                   if(thisEmail == '')
                   {
                        $('#spanEmail').empty();
                        $('#spanEmail').hide();
                        buttonCreate.prop('disabled', true);
                   }


                    else if(response.status == 'success')
                    {
                        console.log(response.message);

                        $('#spanEmail').empty();
                        $('#spanEmail').show();
                        $('#spanEmail').append(response.message);

                        buttonCreate.prop('disabled', true);

                    }

                    else if(response.status == 'checker')
                    {
                        $('#spanEmail').empty();
                        $('#spanEmail').show();
                        $('#spanEmail').append(response.message);
                        buttonCreate.prop('disabled', true);
                    }

                    else if (response.status == 'valid')
                    {
                        $('#spanEmail').empty();
                        $('#spanEmail').hide();
                        buttonCreate.prop('disabled', false);
                    }


                },

                error: function(xhr, status, error) {
                    console.error(error);
                }
            });   

        })

        $('#username').keyup(function(){

            const user = $(this).val();

            const usernameAlert = $('#spanUsername');

            if(user == '')
            {
                usernameAlert.empty();
                usernameAlert.hide();
                buttonCreate.prop('disabled', true); 
            }

            else if(user.length <= 5)
            {
                usernameAlert.empty();
                usernameAlert.show();
                usernameAlert.append('Username must be 6 character');
                buttonCreate.prop('disabled', true); 
                
            }

            else if(!pattern.test(user))
            {
                usernameAlert.empty();
                usernameAlert.show();
                usernameAlert.append('Your username must contain both letters and numbers.');  
                buttonCreate.prop('disabled', true);   
            }

            else{

                usernameAlert.empty();
                usernameAlert.hide();
                buttonCreate.prop('disabled', false);
            }

        })

        $('#password').keyup(function(){

            const password = $(this).val();

            const spanAlert = $('#spanPassword');

            if(password == '')
            {
                spanAlert.empty();
                spanAlert.hide();
                buttonCreate.prop('disabled', true);
            }

            else if(password.length < 8)
            {
                spanAlert.empty();
                spanAlert.show();
                spanAlert.append('Password must be 8 character long');
                buttonCreate.prop('disabled', true);
            }

            else
            {
                spanAlert.empty();
                spanAlert.hide();
                buttonCreate.prop('disabled', false);
            }
        })

        $('#retypepassword').keyup(function(){
            
            const password = $('#password').val();
            const retypePass = $(this).val();

            const spanError = $('#spanRetypePassword');

            if(retypePass == '')
            {
                spanError.empty();
                spanError.hide();
                buttonCreate.prop('disabled', true);     
            }

            else if(password !== retypePass)
            {
                spanError.empty();
                spanError.show();
                spanError.append("Password doesn't match!");
                buttonCreate.prop('disabled', true);
            }

            else
            {
                spanError.empty();
                spanError.hide();
                buttonCreate.prop('disabled', false);  
            }
        })

    })

</script>

@include('includes/Footer');