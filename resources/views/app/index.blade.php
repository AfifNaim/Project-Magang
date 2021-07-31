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
                    label: "Pemasukan",
                    backgroundColor: "green",
                    borderColor: "none",
                    borderWidth: 1,
                    data: [
                        {{ ($grafik_pemasukan_januari->jan) }}, {{ ($grafik_pemasukan_febuari->feb) }}, {{ ($grafik_pemasukan_maret->mar) }},
                        {{ ($grafik_pemasukan_april->apr) }}, {{ ($grafik_pemasukan_mei->may) }}, {{ ($grafik_pemasukan_juni->jun) }},
                        {{ ($grafik_pemasukan_juli->jul) }}, {{ ($grafik_pemasukan_agustus->aug) }}, {{ ($grafik_pemasukan_september->sep) }},
                        {{ ($grafik_pemasukan_oktober->oct) }}, {{ ($grafik_pemasukan_november->nov) }}, {{ ($grafik_pemasukan_desember->des) }}
                    ]
                },
                {
                    label: "Pengeluaran",
                    backgroundColor: "red",
                    borderColor: "none",
                    borderWidth: 1,
                    data: [
                        {{ ($grafik_pengeluaran_januari->jan) }}, {{ ($grafik_pengeluaran_febuari->feb) }}, {{ ($grafik_pengeluaran_maret->mar) }},
                        {{ ($grafik_pengeluaran_april->apr) }}, {{ ($grafik_pengeluaran_mei->may) }}, {{ ($grafik_pengeluaran_juni->jun) }},
                        {{ ($grafik_pengeluaran_juli->jul) }}, {{ ($grafik_pengeluaran_agustus->aug) }}, {{ ($grafik_pengeluaran_september->sep) }},
                        {{ ($grafik_pengeluaran_oktober->oct) }}, {{ ($grafik_pengeluaran_november->nov) }}, {{ ($grafik_pengeluaran_desember->des) }}
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
