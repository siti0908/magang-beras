<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
           
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Transaksi List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('transaksi/create'),'<i class="fa fa-plus"></i>  Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('transaksi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('transaksi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Tgl Transaksi</th>
		<th>Id Pengirim</th>
		<th>Alamat Pengirim</th>
		<th>No Tlp Pengirim</th>
		<th>Id Barang</th>
		<th>Berat</th>
		<th>Id Penerima</th>
		<th>Alamat Penerima</th>
		<th>No Tlp Penerima</th>
		<th>Harga</th>
		<th>Action</th>
            </tr></thead><?php
            foreach ($transaksi_data as $transaksi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $transaksi->tgl_transaksi ?></td>
			<td><?php echo $transaksi->id_pengirim ?></td>
			<td><?php echo $transaksi->alamat_pengirim ?></td>
			<td><?php echo $transaksi->no_tlp_pengirim ?></td>
			<td><?php echo $transaksi->id_barang ?></td>
			<td><?php echo $transaksi->berat ?></td>
			<td><?php echo $transaksi->id_penerima ?></td>
			<td><?php echo $transaksi->alamat_penerima ?></td>
			<td><?php echo $transaksi->no_tlp_penerima ?></td>
			<td><?php echo $transaksi->harga ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('transaksi/read/'.$transaksi->id_transaksi),'Read'); 
				echo ' | '; 
				echo anchor(site_url('transaksi/update/'.$transaksi->id_transaksi),'Update'); 
				echo ' | '; 
				echo anchor(site_url('transaksi/delete/'.$transaksi->id_transaksi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('transaksi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>