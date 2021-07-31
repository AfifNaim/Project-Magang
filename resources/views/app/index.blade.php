@extends('app.master')

@section('konten')

    <div class="main-content">

        <div class="container-fluid mt-3">

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:green;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pemasukan Hari Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pemasukan_hari_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:green;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pemasukan Bulan Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pemasukan_bulan_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('M') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:green;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pemasukan Tahun Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pemasukan_tahun_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:green;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Seluruh Pemasukan</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($seluruh_pemasukan->total) }}</h5>
                                <p class="text-white mb-0">Semua</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:red;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pengeluaran Hari Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pengeluaran_hari_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:red;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pengeluaran Bulan Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pengeluaran_bulan_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('M') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:red;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Pengeluaran Tahun Ini</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($pengeluaran_tahun_ini->total) }}</h5>
                                <p class="text-white mb-0">{{ date('Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div style="background-color:red;">
                        <div class="card-body">
                            <h3 class="card-title text-white">Seluruh Pengeluaran</h3>
                            <div class="d-inline-block">
                                <h5 class="text-white">{{ 'Rp. ' . number_format($seluruh_pengeluaran->total) }}</h5>
                                <p class="text-white mb-0">Semua</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>


        <div class="mt-5"></div>
        <h1>Pemasukan Bulanan</h1>
        <div class="col-sm-12">
            <div>
                <canvas id="myChart"></canvas>
            </div>
        </div>

    </div>



@endsection

@section('custom_script')
    <script>
        var myChart = document.getElementById("myChart");

        var barChartData = {
            labels: [
                "Jan", "Feb", "Mar",
                "Apr", "May", "Jun",
                "Jul", "Aug", "Sep",
                "Oct", "Nov", "Dec",
            ],
            datasets: [{
                    label: "Pengeluaran",
                    backgroundColor: "orangered",
                    borderColor: "maroon",
                    borderWidth: 1,
                    data: [
                        {{ 80 }}, {{ 85 }}, {{ 82 }},
                        {{ 86 }}, {{ 59 }}, {{ 75 }},
                        {{ 80 }}, {{ 85 }}, {{ 80 }},
                        {{ 90 }}, {{ 80 }}, {{ 75 }}
                    ]
                },
                {
                    label: "Pemasukan",
                    backgroundColor: "green",
                    borderColor: "black",
                    borderWidth: 1,
                    data: [
                        {{ 80 }}, {{ 75 }}, {{ 80 }},
                        {{ 80 }}, {{ 78 }}, {{ 80 }},
                        {{ 90 }}, {{ 80 }}, {{ 80 }},
                        {{ 80 }}, {{ 90 }}, {{ 80 }}
                    ]
                },
            ]
        };

        var chartOptions = {
            responsive: true,
            legend: {
                position: "top"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: {{ date('Y') }},
                        fontSize: 20
                    }

                }, ],
            }

        }

        var barChart = new Chart(myChart, {
            type: "bar",
            data: barChartData,
            options: chartOptions
        });
    </script>


@endsection
