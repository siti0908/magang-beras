<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
         <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
        <style>
          
        </style>
    </head>
    <body>
        <!-- <h2 style="margin-top:0px">Supply Point - Kabupaten</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('supply_point/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('supply_point/index'); ?>" class="form-inline" method="get">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('supply_point'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form> -->
            </div>
        </div>



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
                <th>Supply Point</th>
                <th>Kabupaten</th>
                <th>Berat (Kg)</th>
                <th>Tanggal</th>
                <th>Dokumentasi</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                      <?php
            foreach ($supply_point_data as $supply_point)
            {
                ?>
                <tr>
                  <!-- <td width="80px"><?php echo ++$start ?></td> -->
                <td><?php echo $supply_point->supply_point ?></td>
                <td><?php echo $supply_point->kabupaten ?></td>
            <td><?php $supply_point->kg; echo number_format( $supply_point->kg, 0, '', '.') ?></td>
                
                <!-- <td><?php echo $supply_point->kg ?></td> -->
                <td><?php echo $supply_point->tgl ?></td>
                <td><a target="_blank" href="<?=base_url('assets/foto/'.$supply_point->dokumentasi)?>"><?php echo $supply_point->dokumentasi ?></a></td>
                 
                 <td style="text-align:center" width="200px">
                    <?php 
                    echo anchor(site_url('supply_point/read/'.$supply_point->id_supply),'Read'); 
                    echo ' | '; 
                    echo anchor(site_url('supply_point/update/'.$supply_point->id_supply),'Update'); 
                    echo ' | '; 
                    echo anchor(site_url('supply_point/delete/'.$supply_point->id_supply),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                </td>
               </tr>

                <?php
            }
            ?>
                </tfoot>
              </table>
       





    <!--   <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
           <!--  <div class="box-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>No</th>
        		<th>Id Bulog</th>
        		<th>Kg</th>
        		<th>Tgl</th>
        		<th>Dokumentasi</th>
        		<th>Action</th>
                </tr>
    </thead>
      <tbody>
            <?php
            foreach ($supply_point_data as $supply_point)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $supply_point->supply_point ?></td>
			<td><?php echo $supply_point->kg ?></td>
			<td><?php echo $supply_point->tgl ?></td>
            <td><a target="_blank" href="<?=base_url('assets/foto/'.$supply_point->dokumentasi)?>"><?php echo $supply_point->dokumentasi ?></a></td> -->
			<!-- <td><?php echo $supply_point->dokumentasi ?></td> -->
			<!-- <td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('supply_point/read/'.$supply_point->id_supply),'Read'); 
				echo ' | '; 
				echo anchor(site_url('supply_point/update/'.$supply_point->id_supply),'Update'); 
				echo ' | '; 
				echo anchor(site_url('supply_point/delete/'.$supply_point->id_supply),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
              </tbody> 

        </table> -->


  

        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('supply_point/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>


  
<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

   
</script>
    </body>
</html>