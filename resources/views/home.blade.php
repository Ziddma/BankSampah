@extends('layouts.admin')

@section('main-content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hasil Penjualan Sampah (Bulan Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 62.000,00</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Yearly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Hasil Penjualan Sampah (Tahun Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 860.000,00</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Berat Sampah Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Berat Sampah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBerat }} kg</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-weight fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Users Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Users') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Buttons Row -->
    <div class="row mb-4">
        <div class="col-md-6 mb-2">
            <a href="{{ route('kategori_sampah.index') }}" class="btn btn-primary btn-lg w-100">
                <i class="fas fa-boxes"></i> {{ __('Kategori Sampah') }}
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('sampah.index') }}" class="btn btn-secondary btn-lg w-100">
                <i class="fas fa-trash-alt"></i> {{ __('Data Sampah') }}
            </a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-2">
            <a href="{{ route('kerajinan.index') }}" class="btn btn-success btn-lg w-100">
                <i class="fas fa-recycle"></i> {{ __('Kerajinan') }}
            </a>
        </div>
        <div class="col-md-6 mb-2">
            <a href="{{ route('penjualan.index') }}" class="btn btn-warning btn-lg w-100">
                <i class="fas fa-fw fa-money-bills"></i> {{ __('Data Penjualan') }}
            </a>
        </div>
    </div>

    <!-- Chart Section -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <h2 style="font-size: 30px; color: #262626;">Jumlah Stock Sampah</h2>
            <div class="container">
                <canvas id="myChart" width="100%" height="50%"></canvas>
            </div>

            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            "Kresek", "Plastik", "Karah Warna", "Botol mineral plastik", 
                            "Botol mineral kaca", "Gelas mineral plastik", "Kaleng", 
                            "Kardus/Karton", "Dedaunan", "Sampah hasil masak", "Besi", 
                            "Baja", "Tembaga", "Aluminium", "Zeng", "Kain", 
                            "Sandal dan Sepatu", "Lampu"
                        ],
                        datasets: [{
                            label: 'Jumlah Stock (Kg)',
                            data: [
                                20, 30, 15, 10, 8, 12, 5, 25, 40, 35, 18, 22, 7, 13, 9, 4, 11, 6
                            ],
                            backgroundColor: [
                                'rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 
                                'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 
                                'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 
                                'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 
                                'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 
                                'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 
                                'rgba(55, 100, 180, 1)', 'rgba(60, 170, 240, 1)', 
                                'rgba(25, 20, 80, 1)', 'rgba(175, 195, 195, 1)', 
                                'rgba(150, 100, 250, 1)', 'rgba(77, 66, 55, 1)'
                            ],
                            borderColor: 'transparent',
                            borderWidth: 2.5,
                            barPercentage: 0.8,
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 5
                                }
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
@endsection
