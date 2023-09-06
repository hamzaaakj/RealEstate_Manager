<!-- resources/views/layouts/app.blade.php -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary custom-bg-gray">
       <!-- Sidebar Toggle-->
       <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

       @if(auth()->user()->is_admin === 1)
       <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown ml-md-2">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="notificationsDropdown" href="/notifications" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                </a>
                <div class="dropdown-menu left" aria-labelledby="notificationsDropdown">
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    @php
                        $data = $notification->data;
                        $reservationId = $data['reservation_id'];
                        $order = \App\Models\Order::find($reservationId);
                        $apartment = $order->apartment;
                        $apartmentNumber = $apartment->ApartmentsNumber;
                    @endphp
                    <a class="dropdown-item notification-item" href="/orders/{{ $reservationId }}" data-notification-id="{{ $notification->id }}">
                        {{ $data['message'] }}. Apartment Number: {{ $apartmentNumber }}
                    </a>
                    @endforeach
                </div>
            </div>
            
        </li>

           <!-- Add the avatar div inside the navbar-nav ul -->
<li class="nav-item ml-md-2 dropdown">
        <img src="{{ asset('images/admin.png') }}" alt="Avatar" class="avatar-img">
</li>
       </ul>
   @endif
   
   
    
  
</nav>


        <br>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordi on sb-sidenav-primary custom-bg-gray" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            @can('is-admin')
                            <div class="sb-sidenav-menu-heading">Administration</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @endcan
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa-sharp fa-light fa-building"></i></div>
                                Residences
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('residences.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>List residences</a>
                                </nav>
                                @can('is-admin')
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('residences.create') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div> Add residence</a>
                                </nav>
                                @endcan
                            </div>
                            <a class="nav-link collapsed" href="" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-house"></class=>"></i></div>
                                Apartements
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="{{ route('apartments.index') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>List Apartements</a> 
                                </nav>
                                @can('is-admin')
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="{{ route('apartments.create') }}"><div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>Add Apartement</a> 
                                </nav>
                                @endcan
                            </div>
                            @can('is-admin')
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                List Commercial
                            </a>
                            <a class="nav-link" href="{{ route('users.create') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
                                Create New Commercial
                            </a>
                            @endcan
                            <div class="sb-sidenav-menu-heading">Customers</div>
                            <a class="nav-link" href="{{ route('clients.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" aria-hidden="true"></i></div>
                                List Clients
                            </a>  
                            <div class="sb-sidenav-menu-heading">Orders</div>
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <div class="sb-nav-link-icon"><i class="far fa-handshake" aria-hidden="true"></i></div>
                                List Orders
                            </a>  
                        </div>
                    </div>
                    <!-- Authentication Links -->
                    <div class="nav">
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <li >
                            <a  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="text-center mt-4">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                      {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @endguest
                        </li>
                    </div>
                   
                </nav>
            </div>