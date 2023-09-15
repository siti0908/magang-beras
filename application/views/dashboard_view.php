  
  <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/morris.js/morris.css">
     <div class="row">
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Jumlah Stok</span>
              <span class="info-box-number"> <?php
                  
                   $stok1; 
                  echo number_format($stok1, 0, '', '.')
             
               ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Bulog
                  </span>

            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengeluaran</span>
              <span class="info-box-number"> <?php
                  
                   $stok2; 
                  echo number_format($stok2, 0, '', '.')
             
               ?> Kg </span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">                   </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sisa Stok Bulog</span>
              <span class="info-box-number"> <?php
                  
                   $sisa=$stok1-$stok2; 
                  echo number_format($sisa, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                   </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
               <span class="info-box-number">
              <h2><center><?php
                  
                   $presentasi1=round($stok2/$stok1 * 100,2); 
                  echo number_format($presentasi1, 0, '', '.')
             
             ?> % </center> </h2></span>

                  <span class="progress-description">
                <center>Presentasi Stok</center> 
                  </span>
            </div>
          </div>
        </div>
       

<!-- untuk manokwaro -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Stok Manokwari</span>
              <span class="info-box-number"> <?php
                  
                   $stok3; 
                  echo number_format($stok3, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
        
        <!-- ./col -->
       
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengeluaran Manokwari</span>
              <span class="info-box-number"> <?php
                  
                   $stok4; 
                  echo number_format($stok4, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sisa Stok Manokwari</span>
              <span class="info-box-number"> <?php
                  
                   $sisa2=$stok3-$stok4; 
                  echo number_format($sisa2, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
              <!-- <span class="info-box-text">Presetase</span> -->
            <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">

              <!-- <span class="info-box-text">Presentasi</span> -->
              <span class="info-box-number">
              <h2><center><?php
                  
                   $presentasi2=round($stok4/$stok3 * 100,2); 
                  echo number_format($presentasi2, 0, '', '.')
             
             ?> % </center> </h2></span>

                  <span class="progress-description">
                <center>Presentasi Manokwari</center> 
                  </span>
            </div>
          </div>
        </div>
       
<!-- untuk Sorong -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Stok Sorong</span>
              <span class="info-box-number"> <?php
                  
                   $stok5; 
                  echo number_format($stok5, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      
        
        <!-- ./col -->
       
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengeluaran Sorong</span>
              <span class="info-box-number"> <?php
                  
                   $stok6; 
                  echo number_format($stok6, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                
                  </span>
            </div>
          </div>
        </div>
      
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sisa Stok Sorong</span>
              <span class="info-box-number"> <?php
                  
                   $sisa3=$stok5-$stok6; 
                  echo number_format($sisa3, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
          </div>
        </div>
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
              <!-- <span class="info-box-text">Presetase</span> -->
            <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">

              <!-- <span class="info-box-text">Presentasi</span> -->
              <span class="info-box-number">
              <h2><center><?php
                  
                   $presentasi3=round($stok6/$stok5 * 100,2); 
                  echo number_format($presentasi3, 0, '', '.')
             
             ?> % </center> </h2></span>

                  <span class="progress-description">
                <center>Presentasi Sorong</center> 
                  </span>
            </div>
          </div>
        </div>
       
      <!-- untuk Fakfak -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Stok Fakfak</span>
              <span class="info-box-number"> <?php
                  
                   $stok7; 
                  echo number_format($stok7, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
          </div>
        </div>
      
        
        <!-- ./col -->
       
       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pengeluaran Fakfak</span>
              <span class="info-box-number"> <?php
                  
                   $stok8; 
                  echo number_format($stok8, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                
                  </span>
            </div>
          </div>
        </div>
      
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Sisa Stok Fakfak</span>
              <span class="info-box-number"> <?php
                  
                   $sisa4=$stok7-$stok8; 
                  echo number_format($sisa4, 0, '', '.')
             
             ?> Kg</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    
                  </span>
            </div>
          </div>
        </div>
      
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
              <!-- <span class="info-box-text">Presetase</span> -->
            <span class="info-box-icon"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">

              <!-- <span class="info-box-text">Presentasi</span> -->
              <span class="info-box-number">
              <h2><center><?php
                  
                   $presentasi4=round($stok8/$stok7 * 100,2); 
                  echo number_format($presentasi4, 0, '', '.')
             
             ?> % </center> </h2></span>

                  <span class="progress-description">
                <center>Presentasi Fakfak</center> 
                  </span>
            </div>
          </div>
        </div>
       
      <div class="row">
 <!-- DONUT CHART -->
        <div class="col-md-12 col-sm-12 col-xs-12">

   <section class="col-lg-6 connectedSortable"> 
  
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Bulog</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart1" style="height: 250px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>

        <!-- Stok Bulog - Supply Poin -->
           <section class="col-lg-6 connectedSortable"> 
  
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Bulog - Supply Point</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart6" style="height: 250px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>

     

 
        

 <section class="col-lg-12 connectedSortable"> 
        <!-- TABLE: LATEST ORDERS -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Bulog - Supply Point</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <!-- <th>No</th> -->
                <!-- <th>Kiriman</th> -->
                <th>Supply Point</th>
                <th>Berat (Kg)</th>
                <th>Tanggal</th>
                <th>Dokumentasi</th>
                <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                      <?php
              $start = 0;
                        foreach ($bulog_data as $bulog)
                        {
                            ?>
                  <tr>
                  <!-- <td width="80px"><?php echo ++$start ?></td> -->
                  <!-- <td><?php echo $bulog->id_stok_bulog ?></td> -->
                  <td><?php echo $bulog->supply_point ?></td>
                  <td><?php $bulog->kg; echo number_format( $bulog->kg, 0, '', '.') ?></td>
                        
                  <!-- <td><?php echo $bulog->kg ?></td> -->
                  <td><?php echo $bulog->tgl ?></td>
                  <!-- <td><?php echo $bulog->dokumentasi ?></td> -->
                  <td><a target="_blank" href="<?=base_url('assets/foto/'.$bulog->dokumentasi)?>"><?php echo $bulog->dokumentasi ?></a></td>
                             
                              </tbody>
                              <?php
                        }
            ?>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            
        </section>
       <!--  </section> -->
        <section class="col-lg-12 connectedSortable"> 
          
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Supply Point - Kabupaten</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <!-- <th>No</th> -->
                <!-- <th>Supply Point</th> -->
                <th>Kabupaten</th>
                <th>Berat (Kg)</th>
                <th>Tanggal</th>
                <th>Dokumentasi</th>
                  </tr>
                  </thead>
                  <tbody>
              <?php
              $start = 0;
          
            foreach ($supply_point_data as $supply_point)
            {
                ?>
                <tr>
                  <!-- <td width="80px"><?php echo ++$start ?></td> -->
                <!-- <td><?php echo $bulog->supply_point ?></td> -->
                <td><?php echo $supply_point->kabupaten ?></td>
            <td><?php $supply_point->kg; echo number_format( $supply_point->kg, 0, '', '.') ?></td>
                
                <!-- <td><?php echo $supply_point->kg ?></td> -->
                <td><?php echo $supply_point->tgl ?></td>
                <td><a target="_blank" href="<?=base_url('assets/foto/'.$supply_point->dokumentasi)?>"><?php echo $supply_point->dokumentasi ?></a></td>
            <?php
            }
            ?>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          
          <!-- /.box -->
        </div>


  <!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>

<script>
  $(function () {
    "use strict";

      //Chart Stok bulog awal
    var donut = new Morris.Donut({
      element: 'sales-chart1',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Stok Bulog ", value: <?= $stok1?>},
        
      ],
      hideHover: 'auto'
    });


      //CHART  bulog - supply point
    var donut = new Morris.Donut({
      element: 'sales-chart6',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Fakfak", value: <?= $fakfak?>},
        {label: "Sorong", value: <?= $sorong?>},
        {label: "Manokwari", value: <?= $manokwari?>},  
      ],
      hideHover: 'auto'
    });

    //CHART Stok Supply Point - Kabupaten
    var donut = new Morris.Donut({
      element: 'sales-chart2',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Stok 1", value: <?= $stok1?>},
        {label: "Beras Keluar", value: <?= $jml_keluar?>},
        {label: "Sisa Stok Beras", value: <?= $kg?>}

      ],
      hideHover: 'auto'
    });

    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>
