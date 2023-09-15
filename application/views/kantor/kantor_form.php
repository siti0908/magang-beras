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
        <h2 style="margin-top:0px">Kantor <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nopend <?php echo form_error('nopend') ?></label>
            <input type="text" class="form-control" name="nopend" id="nopend" placeholder="Nopend" value="<?php echo $nopend; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kode Pos <?php echo form_error('kode_pos') ?></label>
            <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nopend Kcu <?php echo form_error('nopend_kcu') ?></label>
            <input type="text" class="form-control" name="nopend_kcu" id="nopend_kcu" placeholder="Nopend Kcu" value="<?php echo $nopend_kcu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Regional <?php echo form_error('regional') ?></label>
            <input type="text" class="form-control" name="regional" id="regional" placeholder="Regional" value="<?php echo $regional; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nopend Kprk <?php echo form_error('nopend_kprk') ?></label>
            <input type="text" class="form-control" name="nopend_kprk" id="nopend_kprk" placeholder="Nopend Kprk" value="<?php echo $nopend_kprk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Tipe Kantor <?php echo form_error('tipe_kantor') ?></label>
            <input type="text" class="form-control" name="tipe_kantor" id="tipe_kantor" placeholder="Tipe Kantor" value="<?php echo $tipe_kantor; ?>" />
        </div>
	    <input type="hidden" name="id_kantor" value="<?php echo $id_kantor; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kantor') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>