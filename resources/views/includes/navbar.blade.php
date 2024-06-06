	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<div style="flex">
					<img src="" class="img-circle" alt="" style="width: 30px;">
					<span style="font-weight: bold;">Telegraphic Transfer System</span>
					
				</div>

			</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

				
			</ul>

			
			<ul class="nav navbar-nav navbar-right">

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						
                        @if (session()->has('user_name'))
                            <span>Welcome, {{ session('user_name') }}!</span>
                            <!-- Additional content for logged-in users -->
                        @else
                            
                        @endif

						<i class="caret"></i>
					</a>

					{{-- <ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> Logout</a></li>
					</ul> --}}

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    
				</li>
			</ul>

			<p class="navbar-text">
				<span class="label bg-success">Online</span>
			</p>
		</div>
	</div>
	<!-- /main navbar -->

    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
    
            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">
    
    
                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">
    
                                <!-- Main -->
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
    
                            
                                    <li id="0">
                                        <a href=""><i class="icon-home"></i><span>Dashboard</span></a>
                                    </li>
                                
                                    <li id="">
                                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i><span>Test</span></a>
                                                <ul>
                                                    <li id=""><a href="" class=""><i class=""></i><span>Test1</span></a></li> 
                                                    <li id=""><a href="" class=""><i class=""></i><span>Test2</span></a></li> 
                                                    <li id=""><a href="" class=""><i class=""></i><span>Test3</span></a></li> 
                                                    <li id=""><a href="" class=""><i class=""></i><span>Test4</span></a></li> 
                                                    <li id=""><a href="" class=""><i class=""></i><span>Test5</span></a></li> 
                                                </ul>
                                    </li>

                                    <li id="0">
                                        <a href=""><i class="icon-home"></i><span>Dashboard</span></a>
                                    </li>

                                    <li id="0">
                                        <a href=""><i class="icon-home"></i><span>Dashboard</span></a>
                                    </li>
                   
    
                               
                                <!-- /main -->
    
                            </ul>
                        </div>
                    </div>
                    <!-- /main navigation -->
    
                </div>
            </div>
            <!-- /main sidebar -->

            <div class="content-wrapper">