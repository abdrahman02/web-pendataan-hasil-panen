<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is('dashboard/data*') ? 'active' : '' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-files"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data/kecamatan*') ? 'active' : '' }}"
                        href="{{ route('kecamatan.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Data Kecamatan</span>
                    </a>
                </li>
                <!-- End Data Kecamatan Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data/klasifikasi-tanaman*') ? 'active' : '' }}"
                        href="{{ route('klasifikasi-tanaman.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Data Klasifikasi Tanaman</span>
                    </a>
                </li>
                <!-- End Data Klasifikasi Tanaman Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data/tahun-panen*') ? 'active' : '' }}"
                        href="{{ route('tahun-panen.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Data Tahun Panen</span>
                    </a>
                </li>
                <!-- End Data Tahun Panen Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data/tanaman*') ? 'active' : '' }}"
                        href="{{ route('tanaman.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Data Tanaman</span>
                    </a>
                </li>
                <!-- End Data Tahun Panen Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/data/produksi*') ? 'active' : '' }}"
                        href="{{ route('produksi.index') }}">
                        <i class="bi bi-grid"></i>
                        <span>Data Produksi Panen</span>
                    </a>
                </li>
                <!-- End Data Produksi Nav -->
            </ul>
        </li>
        <!-- End Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#cetak-data-nav" data-bs-toggle="collapse" href="#">
                <i class="bi-printer"></i><span>Cetak Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="cetak-data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/form-cetak/kecamatan*') ? 'active' : '' }}"
                        href="{{ route('formCetakKecamatan') }}">
                        <i class="bi bi-grid"></i>
                        <span>Cetak Data By Kecamatan</span>
                    </a>
                </li>
                <!-- End Cetak Data Kecamatan Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/form-cetak/klasifikasi*') ? 'active' : '' }}"
                        href="{{ route('formCetakKlasifikasi') }}">
                        <i class="bi bi-grid"></i>
                        <span>Cetak Data By Klasifikasi</span>
                    </a>
                </li>
                <!-- End Cetak Data Klasifikasi Tanaman Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/form-cetak/tahun-panen*') ? 'active' : '' }}"
                        href="{{ route('formCetakTahunPanen') }}">
                        <i class="bi bi-grid"></i>
                        <span>Cetak Data By Tahun Panen</span>
                    </a>
                </li>
                <!-- End Cetak Data Tahun Panen Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/form-cetak/tanaman*') ? 'active' : '' }}"
                        href="{{ route('formCetakTanaman') }}">
                        <i class="bi bi-grid"></i>
                        <span>Cetak Data By Tanaman</span>
                    </a>
                </li>
                <!-- End Cetak Data Tanaman Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/cetak-data/cetak-keseluruhan*') ? 'active' : '' }}"
                        href="{{ route('cetakKeseluruhan') }}" target="_blank">
                        <i class="bi bi-grid"></i>
                        <span>Cetak Keseluruhan Data </span>
                    </a>
                </li>
                <!-- End Cetak Data Keseluruhan Nav -->
            </ul>
        </li>
        <!-- End Cetak Data Nav -->
    </ul>
</aside>
<!-- End Sidebar-->