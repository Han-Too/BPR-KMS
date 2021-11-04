<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <img src="{{ asset('img/dashboard/logo_bpr.png') }}" class="rounded 6 ms-2" alt="Logo Bank Bpr" width="34px">
            <a class="navbar-brand ps-2" href="{{ route('dashboard')}}">
              HRMS (Human Resource Management System)
            </a>
            <!-- Sidebar Toggle-->
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      @if (Auth::user()->profile_photo_path)
                        <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Logo User" style="width: 40px; height: 40px; border-radius: 100%;">
                      @else
                        <img src="{{ asset('img/dashboard/user.png') }}" class="rounded 6" alt="Logo User" width="40px">
                      @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Logout</a></li>
                    </ul>
                </li>
            </ul>
</nav>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">LogOut</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Apakah Anda Mau Keluar?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="post" action="/postlogout">
                          @csrf
                            <button type="submit" class="btn btn-danger">LogOut</button>
                          </form>
                        </div>
                      </div>
                    </div>
        </div>
        <!-- Modal -->