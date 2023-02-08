<div class="content-wrapper">
  <section class="content-header">
      <h1>
        Changelog
      </h1>
    </section>
    <section class="content">
      <table class="table table-bordered table-striped">
        <tr>
          <th>Versi</th>
          <th>Tanggal</th>
          <th>Deskripsi</th>
        </tr>

        <?php

        foreach ($tb_changelog as $log) : ?>
        <tr>
          <td><?php echo $log->versi ?></td>
          <td><?php echo $log->tanggal ?></td>
          <td><?php echo $log->deskripsi ?></td>

       <?php endforeach; ?>
      </table>
    </section>
</div>