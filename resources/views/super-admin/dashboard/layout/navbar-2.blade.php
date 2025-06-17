<nav class="navbar navbar-expand border-bottom bg-white navbar-light sticky-top px-4 py-0" style="height: 80px">
    <a href="#" class="sidebar-toggler text-decoration-none flex-shrink-0 align-items-center d-inline-flex btn-orange-bg">
        <i class="fa fa-bars"></i>
    </a>


    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item">


        </div>

          <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img class="rounded-circle me-lg-2" src="{{asset('back/assets/dasheets/img/profile-img.png') }}" alt=""
                      style="width: 40px; height: 40px" />
              </a>
              <div class="dropdown-menu dropdown-menu-end bg-light  rounded-0 rounded-bottom m-0">
                  <a href="" class="dropdown-item">My Profile</a>
                    <a href="{{route('super.setting.index')}}" class="dropdown-item">Settings</a>

                    <li>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                  <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </div>
      </div>
</nav>
