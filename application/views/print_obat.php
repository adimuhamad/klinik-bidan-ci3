<!DOCTYPE html>
<html>
<head>
  <title>Print</title>
</head>
<body>

  <table border="1" width="700">
    <h1>
          Daftar Stock Obat
        </h1>
    <tr bgcolor="yellow">
      <th>Nomor</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stock</th>
    </tr>

    <?php

        $no = 1;
        foreach ($obat as $obt) : ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $obt->namaobat ?></td>
          <td><?php echo $obt->jenisobat ?></td>
          <td><?php echo "Rp ".number_format ($obt->hargamodal) ?></td>
          <td><?php echo "Rp ".number_format ($obt->hargajual) ?></td>
          <td><?php echo $obt->stock ?></td>
        </tr>

      <?php endforeach; ?>

      </table>

      <a href="<?php echo base_url('obat') ?>"> Kembali</i></a>

      <script type="text/javascript">
        window.print();
      </script>

</body>
</html>