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



</div>
<!-- #/ container -->
</div>



<script>
  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

  var barChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'Pemasukan',
      fillColor : "rgba()",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $tahun = date('Y');
        $pemasukan_perbulan = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pemasukan')
        ->whereMonth('tanggal',$bulan)
        ->whereYear('tanggal',$tahun)
        ->first();
        $total = $pemasukan_perbulan->total;
        if($pemasukan_perbulan->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $tahun = date('Y');
        $pengeluaran_perbulan = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pengeluaran')
        ->whereMonth('tanggal',$bulan)
        ->whereYear('tanggal',$tahun)
        ->first();
        $total = $pengeluaran_perbulan->total;
        if($pengeluaran_perbulan->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    }
    ]

  }




  var barChartData2 = {
    labels : [
    <?php 
    $thn2 = DB::table('transaksi')
    ->select(DB::raw('year(tanggal) as tahun'))
    ->distinct()
    ->orderBy('tahun','asc')
    ->get();
    foreach($thn2 as $t){
      ?>
      "<?php echo $t->tahun; ?>",
      <?php 
    }
    ?>
    ],
    datasets : [
    {
      label: 'Pemasukan',
      data : [
      <?php
      foreach($thn2 as $t){
        $thn = $t->tahun;
        $tahun = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pemasukan')
        ->whereYear('tanggal',$thn)
        ->first();
        $total = $tahun->total;
        if($tahun->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    },
    {
      label: 'Pengeluaran',
      data : [
      <?php
      foreach($thn2 as $t){
        $thn = $t->tahun;
        $tahun = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pengeluaran')
        ->whereYear('tanggal',$thn)
        ->first();
        $total = $tahun->total;
        if($tahun->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    }
    ]

  }

  var barChartData3 = {
    <?php
    $dateBegin = strtotime("first day of this month");  
    $dateEnd = strtotime("last day of this month");

    $awal = date("Y-m-d", $dateBegin);         
    $akhir = date("Y-m-d", $dateEnd);
    ?>
    labels : [
    <?php 
    for($a=$awal;$a<=$akhir;$a++){
      ?>
      "<?php echo date('d-m-Y',strtotime($a)) ?>",
      <?php 
    }
    ?>
    ],
    datasets : [
    {
      label: 'Pemasukan',
      data : [
      <?php 
      for($a=$awal;$a<=$akhir;$a++){
        $tgl = $a;
        $pemasukan_perhari = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pemasukan')
        ->whereDate('tanggal',$tgl)
        ->first();
        $total = $pemasukan_perhari->total;
        if($pemasukan_perhari->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    },{
      label: 'Pengeluaran',
      data : [
      <?php 
      for($a=$awal;$a<=$akhir;$a++){
        $tgl = $a;
        $pemasukan_perhari = DB::table('transaksi')
        ->select(DB::raw('SUM(nominal) as total'))
        ->where('jenis','Pengeluaran')
        ->whereDate('tanggal',$tgl)        ->first();
        $total = $pemasukan_perhari->total;
        if($pemasukan_perhari->total == ""){
          echo "0,";
        }else{
          echo $total.",";
        }

      }
      ?>
      ]
    }
    ]

  }


  var barChartData4 = {
    labels : [
    @foreach($kategori as $k)
    "{{ $k->kategori }}",
    @endforeach
    ],
    datasets : [
    {
      data : [
      @foreach($kategori as $k)
      <?php 
      $id_kategori = $k->id;
      $pemasukan_perkategori = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pemasukan')
      ->where('kategori_id',$id_kategori)
      ->first();
      $total = $pemasukan_perkategori->total;
      if($pemasukan_perkategori->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    },{
      label: 'Pengeluaran',
      data : [
      @foreach($kategori as $k)
      <?php 
      $bln = date('m');
      $id_kategori = $k->id;
      $pemasukan_perkategori = DB::table('transaksi')
      ->select(DB::raw('SUM(nominal) as total'))
      ->where('jenis','Pengeluaran')
      ->where('kategori_id',$id_kategori)
      ->whereMonth('tanggal',$bln)
      ->first();
      $total = $pemasukan_perkategori->total;
      if($pemasukan_perkategori->total == ""){
        echo "0,";
      }else{
        echo $total.",";
      }
      ?>
      @endforeach
      ]
    }
    ]

  }




</script>

@endsection