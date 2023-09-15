<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>         
        </style>
    </head>
    <body>
          <?php echo form_open_multipart('bulog/create_action');?>
       
        <form action="<?php echo $action; ?>" method="post">
        <!-- <form action="<?php echo $action; ?>" method="post"> -->

          <div class="form-group">
            <label for="varchar">Kiriman <?php echo form_error('id_stok_bulog') ?></label>
           <select name="id_stok_bulog" class="form-control">
          <option value="" >Pilih Kiriman </option>
                <?php if ($list_stok):?>
                    <?php foreach ($list_stok as $ls):?>
                        <option value="<?php echo $ls->id_stok_bulog?>" <?php if($ls->id_stok_bulog==$id_stok_bulog){echo "selected";}?>> <?php echo $ls->keterangan?>
                            <?php echo $id_stok_bulog?>
                        </option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div> 


	    <!-- <div class="form-group">
            <label for="int">Id Stok Bulog <?php echo form_error('id_stok_bulog') ?></label>
            <input type="text" class="form-control" name="id_stok_bulog" id="id_stok_bulog" placeholder="Id Stok Bulog" value="<?php echo $id_stok_bulog; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Supply Point <?php echo form_error('supply_point') ?></label>
            <input type="text" class="form-control" name="supply_point" id="supply_point" placeholder="Supply Point" value="<?php echo $supply_point; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Berat (Kg) <?php echo form_error('kg') ?></label>
            <input type="text" class="form-control" name="kg" id="kg" placeholder="Kg" value="<?php echo $kg; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="timestamp">Tgl <?php echo form_error('tgl') ?></label>
            <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div> -->
         <div class="form-group">
            <label for="varchar">Dokumentasi <?php echo form_error('dokumentasi') ?></label>
            <input type="file" class="form-control" name="dokumentasi" id="dokumentasi" placeholder="Dokumentasi" value="<?php echo $dokumentasi; ?>" />
        </div>
	    <input type="hidden" name="id_bulog" value="<?php echo $id_bulog; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('bulog') ?>" class="btn btn-default">Cancel</a>
     <?php echo form_close();?>
	
    </body>
</html>