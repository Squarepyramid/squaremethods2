<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Brand</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">

            <li class="nav-item"><a class="nav-link" href="{{asset('services')}}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>


            <li class="nav-item"><a class="nav-link" href="{{route('sop')}}"><i class="fas fa-table"></i><span>SOP</span></a></li>

            <li class="nav-item">
                <a href="{{ route('equipements.index') }}" class="nav-link">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                    <span>
                        Equipements
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('activites.index') }}" class="nav-link">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>
                        Activities
                    </span>
                </a>
            </li>

            {{-- item --}}
            <li class="nav-item">
                <a href="{{ route('taches.index') }}" class="nav-link">
                    <i class="fa-solid fa-list-check"></i>
                    <span>
                        Tasks
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </span>
                </a>
            </li>

            {{-- item --}}
            <li class="nav-item">
                <a href="{{ route('etablissements.index') }}" class="nav-link">
                    <i class="fa-solid fa-building"></i>
                    <span>
                        Establishments
                    </span>
                </a>
            </li>

            {{-- item --}}
<!--            <li class="nav-item">
                <a href="{{ route('calender.index') }}" class="nav-link">
                    <i class="fa-solid fa-calendar"></i>
                    <span>
                        Planning
                        <span class="right badge badge-danger">New</span>
                    </span>
                </a>
            </li>-->


            {{-- item --}}
            <li class="nav-item">
                <a href="{{ route('techniciens.index') }}" class="nav-link">
                    <i class="fa-solid fa-toolbox"></i>
                    <span>
                        Technicians
                        <span class="right badge badge-danger">New</span>
                    </span>
                </a>
            </li>

            {{-- item --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
