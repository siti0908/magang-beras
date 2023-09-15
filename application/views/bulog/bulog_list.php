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
      
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('bulog/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('bulog/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('bulog'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
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
		<th>Kiriman</th>
		<th>Supply Point</th>
		<th>Berat (Kg)</th>
        <th>Tanggal</th>
		<th>Dokumentasi</th>
		<th>Action</th>
            </tr></thead><?php
            foreach ($bulog_data as $bulog)
            {
                ?>
                <tr>
			<!-- <td width="80px"><?php echo ++$start ?></td> -->
			<td><?php echo $bulog->keterangan ?></td>
			<td><?php echo $bulog->supply_point ?></td>
            <td><?php $bulog->kg; echo number_format( $bulog->kg, 0, '', '.') ?></td>
            
			<!-- <td><?php echo $bulog->kg ?></td> -->
            <td><?php echo $bulog->tgl ?></td>
			<!-- <td><?php echo $bulog->dokumentasi ?></td> -->
            <td><a target="_blank" href="<?=base_url('assets/foto/'.$bulog->dokumentasi)?>"><?php echo $bulog->dokumentasi ?></a></td>

			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('bulog/read/'.$bulog->id_bulog),'Read'); 
				echo ' | '; 
				echo anchor(site_url('bulog/update/'.$bulog->id_bulog),'Update'); 
				echo ' | '; 
				echo anchor(site_url('bulog/delete/'.$bulog->id_bulog),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('bulog/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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