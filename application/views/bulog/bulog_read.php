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
        <h2 style="margin-top:0px">Bulog Read</h2>
        <table class="table">
	    <tr><td>Id Stok Bulog</td><td><?php echo $id_stok_bulog; ?></td></tr>
	    <tr><td>Supply Point</td><td><?php echo $supply_point; ?></td></tr>
	    <tr><td>Kg</td><td><?php echo $kg; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('bulog') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>