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
            <br>
            <b><center><?= $data_barang_data['id_order']; ?></center></b>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-md-4 border">
       <img src="<?php echo base_url() ?>assets/dist/img/posaja1.png" class="img-circle" alt="User Image">
      </div>
    </div>
    <div class="row">
      <div class="col border">NPWP : <b><?= $data_barang_data['npwp']; ?></b></div>
    
    </div>
    <div class="row" style="height: 50px;">
      <div class="col border">Ref.Pengiriman : -
        <br>
         Kode Transaksi : <?= $data_barang_data['id_order']; ?>
      </div>
    </div>
    <div class="row">
      <div class="col border">Request Pickup : <?= $data_barang_data['request_pickup']; ?></div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border text-center">ID PEL:</div>
      <div class="col border text-center">KCU BATAM 209999</div>
    </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border">Dari : <?= $data_barang_data['pengirim']; ?>

        <div class="row border justify-content-center" style="height:40px">Berat : <?= $data_barang_data['berat']; ?> KG<br> 0x0x0 cm (0)  </div> 
      </div>
      <div class="col border">Kepada: <b><?= $data_barang_data['penerima']; ?></b></div>
        </div>
    <div class="row">
      <div class="col-sm-4 col-md-4 border">
      <div class="row border justify-content-center" style="height:20px"><B>BKS (BKS)</B></div>
        Tanggal Transaksi : - <br>

        Tanggal Antaran :-

    </div>
      <div class="col border">
        <div class="row">
          <div class="col-sm-4 col-md-4 border text-center">
            <img width="100px" src="<?php echo generate_qrcode($data_barang_data['id_order']) ?>" alt="">
          </div>
          <div class="col-sm-8 col-md-8">
            <div class="row border justify-content-center"><b>NON COD</b></div>
            <div class="row border" style="height:20px"></div>
            <br>
            <br><br>
            <div class="row border justify-content-center" style="height:20px"><b>1/1</b></div>
          
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
            Kantor kirim  <br>
            Tanggal Posting : <br>
            Wkt Posting : <br>
            Berat : <?= $data_barang_data['berat']; ?> KG <br>
            0x0x0 cm (0)

          </div>
          <div class="col border">
            Pengirim <br>
            <?= $data_barang_data['pengirim']; ?> <br>
            Kota Kirim
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 border">

            ID Pelanggan :  <br>
            

          </div>
          <div class="col border">
            Penerima <br>
            <b><?= $data_barang_data['penerima']; ?></b> <br>
          
          </div>
        </div>

      </div>
      <div class="col-sm-4 col-md-4 border">
        Total Nominal: Rp. <br>
        Bea Kirim: Rp.  <br>
        Nett : Rp. <br>
        PDRI : 0 <br>
        BM : 0 <br>
        PPN : 0 <br>
        PPH : 0 <br>
        BMTPS : 0
       
      </div>
    </div>
  </div>

  <script>
    // cetak halaman
    window.print();
  </script>
</body>

</html>