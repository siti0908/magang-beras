<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Alokasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Supply Point <?php echo form_error('supply_point') ?></label>
            <input type="text" class="form-control" name="supply_point" id="supply_point" placeholder="Supply Point" value="<?php echo $supply_point; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Berat <?php echo form_error('berat') ?></label>
            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" value="<?php echo $berat; ?>" />
        </div>
	   <!--  <div class="form-group">
            <label for="timestamp">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="dokumentasi">Dokumentasi <?php echo form_error('dokumentasi') ?></label>
            <textarea class="form-control" rows="3" name="dokumentasi" id="dokumentasi" placeholder="Dokumentasi"><?php echo $dokumentasi; ?></textarea>
        </div>
	    <input type="hidden" name="id_alokasi" value="<?php echo $id_alokasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('alokasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>