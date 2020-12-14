<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{asset('img/logo/logo2.png')}}">
                </div>
                <div class="sidebar-brand-text mx-3">Tech-House Admin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                    aria-expanded="true" aria-controls="collapseBootstrap">
                    <i class="far fa-fw fa-window-maximize"></i>
                    <span>Bootstrap UI</span>
                </a>
                <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Bootstrap UI</h6>
                        <a class="collapse-item" href="alerts.html">Alerts</a>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                        <a class="collapse-item" href="modals.html">Modals</a>
                        <a class="collapse-item" href="popovers.html">Popovers</a>
                        <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
                    </div>
                </div>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                    <span>Manage Products</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Products</h6>
                        <a class="collapse-item" href="{{route('admin.products')}}"><i class="fas fa-edit fa-sm fa-fw mr-2"></i>Products</a>
                        <a class="collapse-item" href="{{route('admin.product.create')}}"><i class="fas fa-plus-circle fa-sm fa-fw mr-2"></i>Add New Product</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                    <span>Manage Category</span>
                </a>
                <div id="collapseCategory" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Category</h6>
                        <a class="collapse-item" href="{{route('admin.categories')}}"><i class="fas fa-edit fa-sm fa-fw mr-2"></i>Category</a>
                        <a class="collapse-item" href="{{route('admin.category.create')}}"><i class="fas fa-plus-circle fa-sm fa-fw mr-2"></i>Add Category</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrand"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2"></i>
                    <span>Manage Brand</span>
                </a>
                <div id="collapseBrand" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage Brand</h6>
                        <a class="collapse-item" href="{{route('admin.brands')}}"><i class="fas fa-edit fa-sm fa-fw mr-2"></i>Brand</a>
                        <a class="collapse-item" href="{{route('admin.brand.create')}}"><i class="fas fa-plus-circle fa-sm fa-fw mr-2"></i>Add Brand</a>
                        
                    </div>
                </div>
            </li>
           
            {{-- <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Examples
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage"
                    aria-expanded="true" aria-controls="collapsePage">
                    <i class="fas fa-fw fa-columns"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Example Pages</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div> --}}
        </ul>