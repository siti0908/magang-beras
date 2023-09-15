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
        <h2 style="margin-top:0px">Kantor Read</h2>
        <table class="table">
	    <tr><td>Nopend</td><td><?php echo $nopend; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Phone</td><td><?php echo $phone; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Kode Pos</td><td><?php echo $kode_pos; ?></td></tr>
	    <tr><td>Nopend Kcu</td><td><?php echo $nopend_kcu; ?></td></tr>
	    <tr><td>Regional</td><td><?php echo $regional; ?></td></tr>
	    <tr><td>Nopend Kprk</td><td><?php echo $nopend_kprk; ?></td></tr>
	    <tr><td>Tipe Kantor</td><td><?php echo $tipe_kantor; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kantor') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>