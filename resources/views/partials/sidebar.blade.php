<div class="col-sm-3 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <img src="{{ url('admin/') }}/img/client-img4.png" alt="" class="rounded-circle" />
            <p><strong>{{ auth()->user()->name }}</strong></p>
            <span class="text-primary small"><strong>{{ auth()->user()->role }}</strong></span>
        </div>
        <!--Image Avatar-->

        <!--Sidebar Navigation Menu-->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
                @switch(auth()->user()->role)
                    @case('admin')
                        @include('partials.admin-nav')
                        @break
                    @case(2)

                        @break
                    @default

                @endswitch
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>
