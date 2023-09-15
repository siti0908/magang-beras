<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <style>
           
        </style>
    </head>
    <body>
          <?php echo form_open_multipart('supply_point/create_action');?>
        <form action="<?php echo $action; ?>" method="post">

            <div class="form-group">
            <label for="varchar">Supply Point <?php echo form_error('supply_point') ?></label>
           <select name="id_bulog" class="form-control">
          <option value="" >Supply Point </option>
                <?php if ($list_bulog):?>
                    <?php foreach ($list_bulog as $lb):?>
                        <option value="<?php echo $lb->id_bulog?>" <?php if($lb->id_bulog==$id_bulog){echo "selected";}?>> <?php echo $lb->supply_point?>
                            <?php echo $id_bulog?>
                        </option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
            <input type="varchar" class="form-control" name="kabupaten" id="kabupaten" placeholder="kabupaten" value="<?php echo $kabupaten; ?>" />
        </div>
	   <!--  <div class="form-group">
            <label for="int">Id Bulog <?php echo form_error('id_bulog') ?></label>
            <input type="text" class="form-control" name="id_bulog" id="id_bulog" placeholder="Id Bulog" value="<?php echo $id_bulog; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Beras (Kg) <?php echo form_error('kg') ?></label>
            <input type="text" class="form-control" name="kg" id="kg" placeholder="Kg" value="<?php echo $kg; ?>" />
        </div>
	<!--     <div class="form-group">
            <label for="timestamp">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Dokumentasi <?php echo form_error('dokumentasi') ?></label>
            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi" placeholder="Dokumentasi" value="<?php echo $dokumentasi; ?>" />
        </div>
	    <input type="hidden" name="id_supply" value="<?php echo $id_supply; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('supply_point') ?>" class="btn btn-default">Cancel</a>
	 <?php echo form_close();?>
    </body>
</html>