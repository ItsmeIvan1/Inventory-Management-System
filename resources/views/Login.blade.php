@include('includes/Header')

<body class="login-container">
    <div class="page-container">
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">
        
                <!-- Content area -->
                <div class="content">
        
                    <!-- Login form -->
                    <form class="login-form" action="">
                        <div class="panel panel-body card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>
        
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" placeholder="Username">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>
        
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" class="form-control" placeholder="Password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
                                </div>
        
                                <div class="text-center">
                                    <a href="{{ route('create-account') }}">Create Account</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->
        
                </div>
                <!-- /content area -->
        
        
            </div>
            <!-- /main content -->
        
        </div>
    </div>

<style>

.content{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);

}

</style>
   
</body>



