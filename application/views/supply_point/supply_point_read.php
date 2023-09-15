<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
          
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Supply_point Read</h2>
        <table class="table">
	    <tr><td>Id Bulog</td><td><?php echo $id_bulog; ?></td></tr>
	    <tr><td>Kg</td><td><?php echo $kg; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td>Dokumentasi</td><td><?php echo $dokumentasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('supply_point') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>