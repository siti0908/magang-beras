<!DOCTYPE html>
<html>

<head>
  <title>Contoh DataTables</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

</head>

<body>

  <div class="container mt-4">

    <h2>Data Project</h2>

    <table id="example" class="table table-striped table-bordered" style="width:100%;">
      <thead>
        <tr>
        
         <th>Id Order</th>
      <th>Request Pickup</th>
      <th>NPWP</th>
      <th>Pengirim</th>
      <th>Penerima</th>
      <th>Tujuan</th>
      <th>Tarif</th>
      <th>Berat</th>
      <th>Nilai Barang</th>
      <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($data_barang_data as $data_barang){
               echo "<tr>";
                    echo "<td class='text-center'><a href='" . generate_qrcode($data_barang->id_order) . "' target='_BLANK'><img id='gambarQrCode' src=" . generate_qrcode($data_barang->id_order) . " width='70px' /></a></td>";
                    echo "<td>" . $data_barang->request_pickup . "</td>";
                    echo "<td>" . $data_barang->npwp . "</td>";
                    echo "<td>" . $data_barang->pengirim . "</td>";
                    echo "<td>" . $data_barang->penerima . "</td>";
                    echo "<td>" . $data_barang->tujuan . "</td>";
                    echo "<td>" . $data_barang->tarif . "</td>";
                    echo "<td>" . $data_barang->berat . "</td>";
                    echo "<td>" . $data_barang->nilai_barang . "</td>";
                    echo "<td>" . $data_barang->keterangan . "</td>";
                    echo "</tr>";
                }
                ?> 

       <!--  <?php
        // Looping data mahasiswa
        foreach ($project as $value) {
          echo "<tr>";
          echo "<td class='text-center'><a href='" . generate_qrcode($value['id']) . "' target='_BLANK'><img id='gambarQrCode' src=" . generate_qrcode($value['id']) . " width='70px' /></a></td>";
          echo "<td>" . $value['project_code'] . "</td>";
          echo "<td>" . $value['name'] . "</td>";
          echo "<td>" . $value['client_name'] . "</td>";
          echo "</tr>";
        }
        ?> -->
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      window.print();
    })
  </script>
</body>

</html>