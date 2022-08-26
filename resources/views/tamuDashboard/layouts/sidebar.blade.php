<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                            <a class="nav-link" href="{{ url('/Tamu')}}">
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
                                        <div class="sb-sidenav-menu-heading pb-1 pt-1">Visitor</div>
                                        <hr style="height: 2px">
                                        <a class="nav-link" href="{{ url('/TamuPeraturan') }}">
                                            Lihat Peraturan
                                        </a>
                                        <a class="nav-link" href="{{ url('/TamuKegiatan') }}">
                                            Lihat Kegiatan
                                        </a>
                                        <a class="nav-link" href="{{ url('/TamuSOP') }}">
                                            Lihat SOP
                                        </a>
                                        <a class="nav-link" href="{{ url('/TamuPengetahuan') }}">
                                            Lihat Pengetahuan
                                        </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Visitor
                    </div>
                </nav>
</div>