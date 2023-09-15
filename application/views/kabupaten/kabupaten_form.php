<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
         
        </style>
    </head>
    <body>
          <?php echo form_open_multipart('kabupaten/create_action');?>
        
        <form action="<?php echo $action; ?>" method="post">
          <div class="form-group">
            <label for="varchar">Kabupaten <?php echo form_error('kabupaten') ?></label>
           <select name="id_supply" class="form-control">
          <option value="" >Pilih Kabupaten </option>
                <?php if ($list_supply_point):?>
                    <?php foreach ($list_supply_point as $lsp):?>
                        <option value="<?php echo $lsp->id_supply?>" <?php if($lsp->id_supply==$id_supply){echo "selected";}?>> <?php echo $lsp->kabupaten?>
                            <?php echo $id_supply?>
                        </option>
                    <?php endforeach?>
                <?php endif?>
            </select>
        </div>   

          
	    <!-- <div class="form-group">
            <label for="int">Id Supply <?php echo form_error('id_supply') ?></label>
            <input type="text" class="form-control" name="id_supply" id="id_supply" placeholder="Id Supply" value="<?php echo $id_supply; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="varchar">Nama Diskrit <?php echo form_error('nama_kabupaten') ?></label>
            <input type="text" class="form-control" name="nama_kabupaten" id="nama_kabupaten" placeholder="Nama Kabupaten" value="<?php echo $nama_kabupaten; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Berat (Kg) <?php echo form_error('kg') ?></label>
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
	    <input type="hidden" name="id_kabupaten" value="<?php echo $id_kabupaten; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kabupaten') ?>" class="btn btn-default">Cancel</a>
     <?php echo form_close();?>
	
    </body>
</html>