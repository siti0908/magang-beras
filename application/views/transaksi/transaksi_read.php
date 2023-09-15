<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Transaksi Read</h2>
        <table class="table">
	    <tr><td>Tgl Transaksi</td><td><?php echo $tgl_transaksi; ?></td></tr>
	    <tr><td>Id Pengirim</td><td><?php echo $id_pengirim; ?></td></tr>
	    <tr><td>Alamat Pengirim</td><td><?php echo $alamat_pengirim; ?></td></tr>
	    <tr><td>No Tlp Pengirim</td><td><?php echo $no_tlp_pengirim; ?></td></tr>
	    <tr><td>Id Barang</td><td><?php echo $id_barang; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
	    <tr><td>Id Penerima</td><td><?php echo $id_penerima; ?></td></tr>
	    <tr><td>Alamat Penerima</td><td><?php echo $alamat_penerima; ?></td></tr>
	    <tr><td>No Tlp Penerima</td><td><?php echo $no_tlp_penerima; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>