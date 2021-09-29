<!--Header-->
<div class="row header shadow-sm">

    <!--Logo-->
    <div class="col-sm-3 pl-0 text-center header-logo">
       <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo">
                @if (file_exists(public_path('logo.png')))
                    <img src="{{ url('logo.png') }}" alt="" style="max-width: 100px; max-height: 30px" srcset="">
                @else
                    <i class="fa fa-xing"></i>{{ auth()->user()->role }}</a>
                @endif
            </h3>
       </div>
    </div>
    <!--Logo-->

    <!--Header Menu-->
    <div class="col-sm-9 header-menu pt-2 pb-0">
        <div class="row">

            <!--Menu Icons-->
            <div class="col-sm-4 col-8 pl-0">
                <!--Toggle sidebar-->
                <span class="menu-icon" onclick="toggle_sidebar()">
                    <span id="sidebar-toggle-btn"></span>
                </span>
                <!--Toggle sidebar-->
                <!--Notification icon-->
                <div class="menu-icon">
                    <a class="" href="#" onclick="toggle_dropdown(this); return false" role="button" class="dropdown-toggle">
                        <i class="fa fa-bell"></i>
                        @if (auth()->user()->unreadNotifications->count()>0)
                            <span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown dropdown-left bg-white shadow border">
                        <a class="dropdown-item" href="#"><strong>Notifikasi</strong></a>
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <div class="dropdown-divider"></div>
                        <a href="{{ $notification->data['url'] }}" class="dropdown-item">
                            <div class="media">
                                <div class="align-self-center mr-3 rounded-circle notify-icon {{ $notification->data['color']??'bg-primary' }}">
                                    <i class="{{ $notification->data['icon']??'fa fa-bookmark' }}"></i>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0"><strong>{{ $notification->data['title']??'Pesan notifikasi' }}</strong></h6>
                                    <p>{{ strip_tags($notification->data['text']??'Text notifikasi') }}</p>
                                    <small class="text-success">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @if (auth()->user()->unreadNotifications->count()>6)
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center link-all" href="#">Lihat semua notifikasi ></a>
                        @elseif(auth()->user()->unreadNotifications->count()<1)
                            <div class="dropdown-item text-warning">Tidak ada notifikasi</div>
                        @endif
                    </div>
                </div>
                <!--Notication icon-->
            </div>
            <!--Menu Icons-->

            <!--Search box and avatar-->
            <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                @if (!isset($searchbar))
                <div class="search-rounded mr-3">
                    <input type="text" class="form-control search-box" id="search" placeholder="Enter keywords.." />
                </div>
                @endif
                <div class="mr-4">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ url(auth()->user()->avatar) }}" alt="Adam" class="rounded-circle" width="40px" height="40px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-user pr-2"></i> Profile</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off pr-2"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!--Search box and avatar-->
        </div>
    </div>
    <!--Header Menu-->
</div>
<!--Header-->
