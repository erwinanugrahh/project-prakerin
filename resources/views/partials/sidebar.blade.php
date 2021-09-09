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
                <li class="parent" id="dashboard">
                    <a href="{{ url('/dashboard') }}" class=""><i class="fa fa-dashboard mr-3"></i>
                        <span class="none">Dashboard </span>
                    </a>
                </li>
                @switch(auth()->user()->role)
                    @case('admin')
                        @include('partials.admin-nav')
                        @break
                    @case('teacher')
                        @include('partials.teacher-nav')
                        @break
                    @case('student')
                        @include('partials.student-nav')
                        @break
                    @case('blogger')
                        @include('partials.blogger-nav')
                        @break
                    @default
                @endswitch
                @if ((student()->is_blogger??teacher()->is_blogger))
                <li class="parent" id="blog">
                    <a href="{{ route('blog.index') }}" class=""><i class="fab fa-blogger-b mr-3"></i>
                        <span class="none">Blog </span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>
