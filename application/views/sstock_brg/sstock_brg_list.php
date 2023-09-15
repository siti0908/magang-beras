<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
           
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Stok Barang</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sstock_brg/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sstock_brg/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sstock_brg'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="box box-primary">
        <div class="box-header">
        <h3 class="box-title"></h3>
        </div>
        <div class="box-body">
        <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped  table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
		<th>Tanggal Masuk</th>
		<th>Jumlah Stok Beras (Kg)</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr></thead><?php
            foreach ($sstock_brg_data as $sstock_brg)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $sstock_brg->tgl_masuk ?></td>
			<td><?php echo $sstock_brg->kg ?></td>
			<td><?php echo $sstock_brg->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('sstock_brg/read/'.$sstock_brg->id_stok),'Read'); 
				echo ' | '; 
				echo anchor(site_url('sstock_brg/update/'.$sstock_brg->id_stok),'Update'); 
				echo ' | '; 
				echo anchor(site_url('sstock_brg/delete/'.$sstock_brg->id_stok),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('sstock_brg/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>