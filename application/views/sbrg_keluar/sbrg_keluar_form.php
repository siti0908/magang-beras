<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
          
        </style>
    </head>
    <body>
        <?php echo form_open_multipart('sbrg_keluar/create_action');?>
        <form action="<?php echo $action; ?>" method="post">
	   <!--  <div class="form-group">
            <label for="timestamp">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Kota Tujuan <?php echo form_error('kota_tujuan') ?></label>
            <input type="text" class="form-control" name="kota_tujuan" id="kota_tujuan" placeholder="Kota Tujuan" value="<?php echo $kota_tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Distrik <?php echo form_error('distrik') ?></label>
            <input type="text" class="form-control" name="distrik" id="distrik" placeholder="Distrik" value="<?php echo $distrik; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kg <?php echo form_error('kg') ?></label>
            <input type="text" class="form-control" name="kg" id="kg" placeholder="Kg" value="<?php echo $kg; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Ekspedisi <?php echo form_error('ekspedisi') ?></label>
            <input type="text" class="form-control" name="ekspedisi" id="ekspedisi" placeholder="Ekspedisi" value="<?php echo $ekspedisi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Dokumentasi <?php echo form_error('dokumentasi') ?></label>
            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi" placeholder="Dokumentasi" value="<?php echo $dokumentasi; ?>" />
        </div>
	    <input type="hidden" name="id_keluar" value="<?php echo $id_keluar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('sbrg_keluar') ?>" class="btn btn-default">Cancel</a>
	   <?php echo form_close();?>
    </body>
</html>