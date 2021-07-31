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
              <h5 class="text-white">{{ "Rp. ".number_format($pemasukan_hari_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($pemasukan_bulan_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($pemasukan_tahun_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($seluruh_pemasukan->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($pengeluaran_hari_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($pengeluaran_bulan_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($pengeluaran_tahun_ini->total) }}</h5>
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
              <h5 class="text-white">{{ "Rp. ".number_format($seluruh_pengeluaran->total) }}</h5>
              <p class="text-white mb-0">Semua</p>
            </div>
          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>

  Pemasukan Bulanan
<script type="text/javascript">
    
   
    Highcharts.chart('container', {
        title: {
            text: 'Pengguna Baru, 2020'
        },
        subtitle: {
            text: 'Source: serambilaravel.com'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Jumlah Pengguna Mendafatar'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Pengguna Baru',
            data: users
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 200
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>

@endsection