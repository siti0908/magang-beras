<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Resi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <style>
    body {
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div style="width: 500px;margin-left:30px">
    <div class="row">
      <div class="col-sm-8 col-md-8 border">
        <div class="row">
          <div class="col border">POS Express Dokumen</div>
        </div>
        <div class="row">
          <div class="col border">
            <?php echo generate_barcode($data_barang_data['id_order']); ?>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 border">
        <h2>LOGO</h2>
      </div>
    </div>
    <div class="row">
      <div class="col border">ID Order : <b><?= $data_barang_data['id_order']; ?></b></div>
    </div>
    <div class="row" style="height: 40px;">
      <div class="col border"></div>
    </div>
    <div class="row">
      <div class="col border">Request Pickup : <b><?= $data_barang_data['request_pickup']; ?></b></div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border text-center">ID PEL:</div>
      <div class="col border text-center">KCU BATAM 209999</div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border">Pengirim : <b><?= $data_barang_data['pengirim']; ?></b></div>
      <div class="col border">Pengirim: <b><?= $data_barang_data['pengirim']; ?></b></div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border">Penerima: <b><?= $data_barang_data['penerima']; ?></b></div>
      <div class="col border">
        <div class="row">
          <div class="col-sm-4 col-md-4 border text-center">
            <img width="100px" src="<?php echo generate_qrcode($data_barang_data['id_order']) ?>" alt="">
          </div>
          <div class="col-sm-8 col-md-8">
            <div class="row border justify-content-center"><b>NON COD</b></div>
            <div class="row border" style="height:20px"></div>
            <div class="row border" style="height:20px"></div>
            <div class="row border" style="height:20px"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row" style="height: 10px;">
      <div class="col"></div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-md-8">
        <div class="row">
          <div class="col-sm-6 col-md-6 border">

            Bukti Pengiriman <br>
            Kantor kirim jansdkjasd <br>
            Lorem ipsum dolor sit amet consectetur

          </div>
          <div class="col border">
            Pengirim <br>
            Kantor kirim jansdkjasd <br>
            Lorem ipsum dolor sit amet consectetur
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 border">

            Bukti Pengiriman <br>
            Kantor kirim jansdkjasd <br>
            Lorem ipsum dolor sit amet consectetur

          </div>
          <div class="col border">
            Pengirim <br>
            Kantor kirim jansdkjasd <br>
            Lorem ipsum dolor sit amet consectetur
          </div>
        </div>

      </div>
      <div class="col-sm-4 col-md-4 border">
        Total Nominal <br>
        Kantor kirim jansdkjasd <br>
        Lorem ipsum dolor sit amet consectetur
      </div>
    </div>
  </div>

  <script>
    // cetak halaman
    window.print();
  </script>
</body>

</html>