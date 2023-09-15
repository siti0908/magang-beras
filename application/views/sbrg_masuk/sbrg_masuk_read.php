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
        <h2 style="margin-top:0px">Sbrg_masuk Read</h2>
        <table class="table">
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Kg</td><td><?php echo $kg; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Dokumentasi</td><td><?php echo $dokumentasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sbrg_masuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>