<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
           
        </style>
    </head>
    <body>
          <?php echo form_open_multipart('stok/create_action');?>

        <form action="<?php echo $action; ?>" method="post">
	    <!-- <div class="form-group">
            <label for="timestamp">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Berat (Kg) <?php echo form_error('kg') ?></label>
            <input type="text" class="form-control" name="kg" id="kg" placeholder="Kg" value="<?php echo $kg; ?>" />
        </div>
	    <div class="form-group">
            <label for="keterangan">Keterangan <?php echo form_error('keterangan') ?></label>
            <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Dokumentasi <?php echo form_error('dokumentasi') ?></label>
            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi" placeholder="Dokumentasi" value="<?php echo $dokumentasi; ?>" />
        </div>
	    <input type="hidden" name="id_stok_bulog" value="<?php echo $id_stok_bulog; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stok') ?>" class="btn btn-default">Cancel</a>
     <?php echo form_close();?>
	
    </body>
</html>