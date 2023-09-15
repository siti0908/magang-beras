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
        <!-- <h2 style="margin-top:0px">Stok List</h2> -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('stok/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('stok/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('stok'); ?>" class="btn btn-default">Reset</a>
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
              <h3 class="box-title"> Stok Bulog</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Berat (Kg)</th>
		<th>Keterangan</th>
		<th>Dokumentasi</th>
		<th>Action</th>
            </tr></thead><?php
            foreach ($stok_data as $stok)
            {
                ?>
                <tr>
                  
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $stok->tgl ?></td>
            <td><?php $stok->kg; echo number_format( $stok->kg, 0, '', '.') ?></td>
			<!-- <td><?php echo $stok->kg ?></td> -->
			<td><?php echo $stok->keterangan ?></td>
            <td><a target="_blank" href="<?=base_url('assets/foto/'.$stok->dokumentasi)?>"><?php echo $stok->dokumentasi ?></a></td>

			<!-- <td><?php echo $stok->dokumentasi ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('stok/read/'.$stok->id_stok_bulog),'Read'); 
				echo ' | '; 
				echo anchor(site_url('stok/update/'.$stok->id_stok_bulog),'Update'); 
				echo ' | '; 
				echo anchor(site_url('stok/delete/'.$stok->id_stok_bulog),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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