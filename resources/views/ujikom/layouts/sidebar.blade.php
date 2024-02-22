<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light navbar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ujikom/books*') || Request::is('ujikom/publishers*') ? 'active' : '' }}"
                    data-bs-toggle="collapse" href="#adminMenu" role="button" aria-expanded="false"
                    aria-controls="adminMenu">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Admin
                </a>
                <div class="collapse" id="adminMenu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('ujikom/books*') ? 'active' : '' }}"
                                href="/ujikom/books">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('ujikom/publishers*') ? 'active' : '' }}"
                                href="/ujikom/publishers">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Penerbit
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('ujikom/reports*') ? 'active' : '' }}" href="/ujikom/reports">
                    <span data-feather="alert-circle" class="align-text-bottom"></span>
                    Pengadaan
                </a>
            </li>
        </ul>
    </div>
</nav>
