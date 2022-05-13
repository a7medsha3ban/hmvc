<aside class="main-sidebar sidebar-dark-primary elevation-4r">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#">{{ Auth::guard('supplier')->user()->name }}<i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        @if(Auth::guard('supplier')->user())
            <ul class="sidebar-menu" data-widget="tree">

                <!-- Start Products Module -->
                <li  class="treeview">
                    <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Products</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('product.index')}}">Show Products</a></li>
                        <li><a href="{{route('product.create')}}">Create Products</a></li>
                    </ul>
                </li>
                <!-- End Products Module -->
            </ul>
        @endif

    </section>

</aside>
