<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            {{-- <span class="app-brand-logo demo">
            </span> --}}
            <img src="{{ asset('assets/img/favicon/logo.png') }}" alt="" class="app-brand-logo demo" width="50" />
            <span class="app-brand-text demo menu-text fw-bolder ms-2"><span class="text-uppercase">M</span>onitoring <br><span
                    class="text-uppercase">KBM</span> </span>
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
        <li class="menu-item {{ (Request::RouteIs('siswa.*')) ? 'active' : '' }}">
            {{-- <a href="{{ route('admin.siswa.index') }}" class="menu-link"> --}}
                <a href="{{ route('siswa.index') }}" class="menu-link">
                    <i class='menu-icon bx bx-group'></i>
                    Siswa
                </a>
        </li>
        {{-- /.data master user --}}
        @elseif(Auth()->user()->hasRole('wakil kurikulum'))
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Jadwal dan Penugasan Guru</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('gurumapel.*')) ? 'active' : '' }}">
            <a href="{{ route('gurumapel.index') }}" class="menu-link">
                <i class='menu-icon bx bx-laptop'></i>
                Penugasan Guru Mata pelajaran
            </a>
            <li class="menu-item {{ (Request::RouteIs('jadwalmengajar.*')) ? 'active' : '' }}">
                <a href="{{ route('jadwalmengajar.pilihkelas') }}" class="menu-link">
                    <i class='menu-icon bx bx-book'></i>
                    Jadwal Pelajaran
                </a>
            </li>
        </li>
        {{--! rombel dan kelas  !--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Rombongan belajar dan kelas</span>
        </li>
        {{-- <li class="menu-item {{ (Request::RouteIs('jadwalpiket.*')) ? 'active' : '' }}"> --}}
        <li class="menu-item {{ (Request::RouteIs('rombel.*')) ? 'active' : '' }}">
            <a href="{{ route('rombel.index') }}" class="menu-link">
                <i class='menu-icon bx bx-group'></i>
                List Rombel
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('pembagian-kelas.*')) ? 'active' : '' }}">
            <a href="{{ route('pembagian-kelas.index') }}" class="menu-link">
                <i class='menu-icon bx bx-library'></i>
                Pembagian Kelas
            </a>
        </li>
        {{--! penjadwalan !--}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Piket & absen harian guru</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('jadwalpiket.*')) ? 'active' : '' }}">
            <a href="{{ route('jadwalpiket.index') }}" class="menu-link">
                <i class='menu-icon bx bx-clipboard'></i>
                Jadwal Piket Guru
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('absensiharianguru.*')) ? 'active' : '' }}">
            <a href="{{ route('absensiharianguru.index') }}" class="menu-link">
                <i class='menu-icon bx bx-list-check'></i>
                absen guru
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Monitoring KBM</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('pantaukbm.*')) ? 'active' : '' }}">
            <a href="{{ route('pantaukbm.listkelas') }}" class="menu-link">
                <i class='menu-icon bx bxs-binoculars'></i>
                Pantau KBM
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('laporankbm.*')) ? 'active' : '' }}">
            <a href="{{ route('laporankbm.pilihkelas') }}" class="menu-link">
                <i class='menu-icon bx bxs-report'></i>
                Laporan KBM
            </a>
        </li>

        {{-- /.penjadwalan --}}
        @elseif(Auth()->user()->hasRole('guru mapel'))
        <li class="menu-item ">
            <a href="{{ route('ChangeRoleToPiket') }}" class="menu-link">
                <i class='menu-icon bx bx-bell'></i>
                Piket
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('ambilabsen.index') }}" class="menu-link">
                <i class='menu-icon bx bx-badge-check'></i>
                Absensi Guru
            </a>
        </li>
        {{-- KBM --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Kegiatan Belajar Mengajar</span>
        </li>
        <li class="menu-item {{ (Request::RouteIs('rpp.*')) ? 'active' : '' }}">
            <a href="{{ route('rpp.index') }}" class="menu-link">
                <i class='menu-icon bx bx-receipt'></i>
                RPP
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('absensiswa.*')) ? 'active' : '' }}">
            <a href="{{ route('absensiswa.index') }}" class="menu-link">
                <i class='menu-icon bx bx-user-check'></i>
                Absensi Siswa
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('laporkbm.*')) ? 'active' : '' }}">
            <a href="{{ route('laporkbm.index') }}" class="menu-link">
                <i class='menu-icon bx bx-check-square'></i>
                Lapor Proses KBM
            </a>
        </li>
        {{-- /.KBM --}}

        @elseif(Auth()->user()->hasRole('guru piket'))
        <li class="menu-item">
            <a href="{{ route('ChangeRoleToMapel') }}" class="menu-link">
                <i class='menu-icon bx bx-arrow-back'></i>
                Kembali (Mengajar)
            </a>
        </li>
        <li class="menu-item {{ (Request::RouteIs('piket.*')) ? 'active' : '' }}">
            <a href="{{ route('piket.listkelas') }}" class="menu-link">
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