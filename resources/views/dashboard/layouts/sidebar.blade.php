<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                            <a class="nav-link" href="{{ route('dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    @if(Auth::user()->role === 'Administrator')
                                        <div class="sb-sidenav-menu-heading pb-1 pt-1">Kelola User</div>
                                        <hr style="height: 2px">
                                        <a class="nav-link" href="{{ route("menu-karyawan") }}">
                                            Kelola User
                                         </a>
                                        <a class="nav-link" href="{{ route('departemen.index') }}">
                                            Kelola Departement
                                        </a>
                                        <a class="nav-link" href="{{ route('jabatan.index') }}">
                                            Kelola Jabatan
                                        </a>
                                        <div class="sb-sidenav-menu-heading pb-1 pt-1">Kelola File</div>
                                        <hr style="height: 2px">
                                        <a class="nav-link" href="{{ route('peraturan.index') }}">
                                            Kelola Peraturan
                                        </a>
                                        <a class="nav-link" href="{{ route('kegiatan.index') }}">
                                            Kelola Kegiatan
                                        </a>
                                        <a class="nav-link" href="{{ route('sop.index') }}">
                                            Kelola SOP
                                        </a>
                                        <a class="nav-link" href="{{ route('pengetahuan.index') }}">
                                            Kelola Pengetahuan
                                        </a>
                                    @elseif(Auth::user()->role === 'Operator')
                                        <div class="sb-sidenav-menu-heading pb-1 pt-1">Operator</div>
                                        <hr style="height: 2px">
                                        <a class="nav-link" href="{{ route('peraturan.index') }}">
                                            Kelola Peraturan
                                        </a>
                                        <a class="nav-link" href="{{ route('kegiatan.index') }}">
                                            Kelola Kegiatan
                                        </a>
                                        <a class="nav-link" href="{{ route('sop.index') }}">
                                            Kelola SOP
                                        </a>
                                        <a class="nav-link" href="{{ route('pengetahuan.index') }}">
                                            Kelola Pengetahuan
                                        </a>
                                   
                                    @endif
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->name }}
                    </div>
                </nav>
</div>