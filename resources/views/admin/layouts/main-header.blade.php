<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo"">&nbsp;
            <i class="fa fa-truck" aria-hidden="true"></i>
            <em>Talabia</em></a>
        <a class="navbar-brand brand-logo-mini"">&nbsp;
            <i class="fa fa-truck" aria-hidden="true"></i>
            <em>Talabia</em></a>


    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-50 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
    </ul>


    {{-- <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>{{trans('Sidebar_trans.Notifications')}}</strong>
                    <span class="badge badge-pill badge-warning">05</span>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">New registered user <small
                        class="float-right text-muted time">Just now</small> </a>
                <a href="#" class="dropdown-item">New invoice received <small
                        class="float-right text-muted time">22 mins</small> </a>
                <a href="#" class="dropdown-item">Server error report<small
                        class="float-right text-muted time">7 hrs</small> </a>
                <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1
                        days</small> </a>
                <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2
                        days</small> </a>
            </div>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>Quick Links</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                        <h5>New Task</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                        <h5>Assign Task</h5>
                    </a>
                </div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                        <h5>Add Orders</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                        <h5>New Orders</h5>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">


            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">

                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                        class="badge badge-info">6</span> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="text-danger ti-unlock"></i>{{ __('Sidebar_trans.Logoff') }}</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            </div>
        </li> --}}
    <li class="nav-item dropdown p-0 fixed-top d-flex flex-row">
        <a id="navbarDropdown" class="nav-link" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" v-pre href="#">
            <div class="d-flex flex-md-row-reverse">
                <div class="d-flex flex-column justify-content-center align-items-center text-capitalize">
                    <span>
                        {{ Auth::user()->name }}
                    </span>

                </div>
                <div class="mx-2 d-sm-none d-md-block">
                    <img src="{{ asset('profilepic') . '/' . auth()->user()->profile_pic }}"
                        class="rounded-circle card-img-top" style="width:50px; height:50px; object-fit:cover">
                </div>

            </div>
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profiles.show', auth()->user()->id) }}">
                {{ __('??????????') }}
            </a>

            <a class="dropdown-item" href="{{ route('profiles.edit', auth()->user()->id) }}">
                {{ __('??????????') }}
            </a>


            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                {{ __('????????') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    </ul>
</nav>
