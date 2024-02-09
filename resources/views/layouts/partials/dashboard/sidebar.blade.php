<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- --}}
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Monitoring KBM</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ (Request::RouteIs('dashboard')) ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                Dashboard
            </a>
        </li>

        @if (Auth()->user()->hasRole('admin'))

        {{--! data master !--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master KBM</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('mapel.*')) ? 'active' : '' }}">
            <a href="{{ route('mapel.index') }}" class="menu-link">
                <i class='menu-icon bx bx-book-reader'></i>
                Mata Pelajaran
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('jurusan.*')) ? 'active' : '' }}">
            <a href="{{ route('jurusan.index') }}" class="menu-link">
                <i class='menu-icon bx bx-layer'></i>
                Jurusan
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('kelas.*')) ? 'active' : '' }}">
            <a href="{{ route('kelas.index') }}" class="menu-link">
                <i class='menu-icon bx bx-group'></i>
                Kelas
            </a>
        </li>
        {{-- /.data master --}}
        {{--! data master user !--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Master Users</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('akun.guru.*')) ? 'active' : '' }}">
            <a href="{{ route('akun.guru.index') }}" class="menu-link">
                    <i class='menu-icon bx bx-user'></i>
                    Guru
                </a>
        </li>
        {{-- <li class="menu-item disabled {{ (Request::RouteIs('admin.siswa.*')) ? 'active' : '' }}"> --}}
        <li class="menu-item disabled ">
            {{-- <a href="{{ route('admin.siswa.index') }}" class="menu-link"> --}}
                <a href="#" class="menu-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgb(140,153,167);transform: ;msFilter:;">
                        <circle cx="6" cy="4" r="2"></circle>
                        <path d="M9 7H3a1 1 0 0 0-1 1v7h2v7h4v-7h2V8a1 1 0 0 0-1-1z"></path>
                        <circle cx="17" cy="4" r="2"></circle>
                        <path d="M20.21 7.73a1 1 0 0 0-1-.73h-4.5a1 1 0 0 0-1 .73L12 14h2l-1 4h2v4h4v-4h2l-1-4h2z">
                        </path>
                    </svg>
                    Siswa
                </a>
        </li>
        {{-- /.data master user --}}
        @elseif(Auth()->user()->hasRole('wakil kurikulum'))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pembagian Tugas Mengajar</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('gurumapel.*')) ? 'active' : '' }}">
            <a href="{{ route('gurumapel.index') }}" class="menu-link">
                <i class='menu-icon bx bx-laptop'></i>
                Guru Mapel
            </a>
        </li>
        {{--! penjadwalan !--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Jadwal</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('jadwalmengajar.*')) ? 'active' : '' }}">
            <a href="{{ route('jadwalmengajar.pilihkelas') }}" class="menu-link">
                <i class='menu-icon bx bx-book'></i>
                Jadwal Pelajaran
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('jadwalpiket.*')) ? 'active' : '' }}">
            <a href="{{ route('jadwalpiket.index') }}" class="menu-link">
                <i class='menu-icon bx bx-clipboard'></i>
                Jadwal Piket Guru
            </a>
        </li>
        
        {{-- /.penjadwalan --}}
        @elseif(Auth()->user()->hasRole('guru mapel'))
        <li class="menu-item">
            <a href="{{ route('gmapel.piket') }}" class="menu-link">
                <i class='menu-icon bx bx-bell'></i>
                Piket
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-badge-check'></i>
                Absensi Guru
            </a>
        </li>
        {{-- KBM --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kegiatan Belajar Mengajar</span>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-receipt'></i>
                RPP
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-user-check'></i>
                Absensi Siswa
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-check-square'></i>
                Lapor Proses KBM
            </a>
        </li>
        {{-- /.KBM --}}

        @elseif(Auth()->user()->hasRole('guru piket'))
        <li class="menu-item">
            <a href="{{ route('piket.mengajar') }}" class="menu-link">
                <i class='menu-icon bx bx-arrow-back'></i>
                Kembali (Mengajar)
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link">
                <i class='menu-icon bx bx-show'></i>
                Pantau Proses KBM
            </a>
        </li>

        @elseif(Auth()->user()->hasRole('siswa'))
        @endif
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Text menu divider</span>
        </li> --}}
    </ul>
</aside>