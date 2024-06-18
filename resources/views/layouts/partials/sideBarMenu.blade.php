<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
            <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') == 'home' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>


        @php
        $isSubmenuActive = request()->routeIs('lumbungpadi.*') || request()->routeIs('sewatratak.*') || request()->routeIs('airbersih.*');
        @endphp
        
        @if (auth()->user()->can('manajemen lumbungpadi') || auth()->user()->can('manajemen sewatratak') || auth()->user()->can('manajemen airbersih'))
            <li class="nav-item has-treeview {{ $isSubmenuActive ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $isSubmenuActive ? 'active' : '' }}">
                    <i class="fas fa-briefcase nav-icon    "></i>
                    <p>
                        Unit Usaha
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('manajemen lumbungpadi')
                        <li class="nav-item">
                            <a href="{{ route('lumbungpadi.index') }}"
                                class="nav-link {{ request()->routeIs('lumbungpadi.*') ? 'active' : '' }}">
                                <i class="fas fa-box-open"></i>
                                <p>Lumbung Padi</p>
                            </a>
                        </li>   
                    @endcan
        
                    @can('manajemen sewatratak')
                        <li class="nav-item">
                            <a href="{{ route('sewatratak.index') }}"
                                class="nav-link {{ request()->routeIs('sewatratak.*') ? 'active' : '' }}">
                                <i class="fas fa-campground fa-lg"></i>
                                <p>Sewa Tratak</p>
                            </a>
                        </li>   
                    @endcan
                    @can('manajemen airbersih')
                        <li class="nav-item">
                            <a href="{{ route('airbersih.index') }}"
                                class="nav-link {{ request()->routeIs('airbersih.*') ? 'active' : '' }}">
                                <i class="fas fa-water"></i>
                                <p>Air Bersih</p>
                            </a>
                        </li>   
                    @endcan
                </ul>
            </li>
        @endif
        
        @can('manajemen informasi')
        <li class="nav-item">
            <a href="{{ route('informasi.index') }}"
                class="nav-link {{ request()->routeIs('informasi.index') ? 'active' : '' }}">
                <i class="fas fa-edit nav-icon   "></i>
                        <p>Berita</p>
            </a>
        </li>
        @endcan

        @if (auth()->user()->can('manajemen users'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'active' : '' }}">
                <i class="fas fa-user-astronaut nav-icon   "></i>
                <p>
                    Manajemen User
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('manajemen users')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}"
                            class="nav-link {{ request()->routeIs('users.create') == 'users.create' ? 'active' : '' }}">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Tambah User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->routeIs('users.index') == 'users.index' ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon   "></i>
                            <p>List Data User</p>
                        </a>
                    </li> 
                @endcan

                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') == 'roles.index' ? 'active' : '' }}">
                        <i class="fas fa-users-cog nav-icon   "></i>
                        <p>Role & Permission</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif

     

        <li class="nav-item">
            <a href="{{ route('profile.show', Auth::user()->id) }}" class="nav-link {{ request()->routeIs('profile.show') == 'profile.show' ? 'active' : '' }}">
                <i class="fas fa-user-ninja nav-icon   "></i>
                <p>
                    Profile
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt text-cyan   "></i>
                <p>
                    Logout
                </p>
                {{-- {{ __('Logout') }} --}}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </li>

          <!-- Notifikasi -->
          @if(session()->has('lumbungpadi_notification'))
          <li class="nav-item">
            <a href="{{ route('lumbungpadi.index') }}" class="nav-link">
                  <i class="fas fa-bell nav-icon"></i>
                  <p>{{ session('lumbungpadi_notification') }}</p>
              </a>
          </li>
          @endif
          
    </ul>
</nav>