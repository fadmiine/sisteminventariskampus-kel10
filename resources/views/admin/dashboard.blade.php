@extends('main', ['pageSlug' => 'dashboard'])

@section('content')
   <div class="row">
    <!-- Total Inventaris -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
            <div class="card-header">
                <h2>{{ $totalBarang }}</h2>
                <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Detail Inventaris</a>
                    </div>
                </div>
                <div class="sub-title">
                    <span class="mr-1">Total Inventaris</span> |
                    <span class="mx-1">{{ $totalBarang > 0 ? '100%' : '0%' }}</span>
                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div id="spline-area-barang"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Pengguna -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
            <div class="card-header">
                <h2>{{ $totalPengguna }}</h2>
                <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Detail Pengguna</a>
                    </div>
                </div>
                <div class="sub-title">
                    <span class="mr-1">Total Pengguna</span> |
                    <span class="mx-1">{{ $totalPengguna > 0 ? '100%' : '0%' }}</span>
                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div id="spline-area-pengguna"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Peminjaman Aktif -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
            <div class="card-header">
                <h2>{{ $totalPeminjamanAktif }}</h2>
                <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Detail Peminjaman</a>
                    </div>
                </div>
                <div class="sub-title">
                    <span class="mr-1">Peminjaman Aktif</span> |
                    <span class="mx-1">{{ $totalPeminjamanAktif > 0 ? '100%' : '0%' }}</span>
                    <i class="mdi mdi-arrow-up-bold text-warning"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div id="spline-area-peminjaman"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengembalian Hari Ini -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
            <div class="card-header">
                <h2>{{ $totalPengembalianHariIni }}</h2>
                <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" data-toggle="dropdown"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Detail Pengembalian</a>
                    </div>
                </div>
                <div class="sub-title">
                    <span class="mr-1">Pengembalian Hari Ini</span> |
                    <span class="mx-1">{{ $totalPengembalianHariIni > 0 ? '100%' : '0%' }}</span>
                    <i class="mdi mdi-arrow-up-bold text-info"></i>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-wrapper">
                    <div id="spline-area-pengembalian"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
