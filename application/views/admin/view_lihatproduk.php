<h3>Data Produk</h3>
<?= $this->session->flashdata('pesan') ?>
<p>
  <a href="<?= base_url() ?>produk/add" class="btn btn-primary btn-sm">Tambah</a>
  <p>
      <table class="table table-striped">
          <tr>
              <th style="width: 35%">Nama Produk</th>
              <th style="width: 30%"> Harga Produk</th>
              <th style="width: 20%"> Image</th>
              <th style="width: 15%"> Aksi</th>
          </tr>
          <?php
            foreach ($query -> result() as $rowdata) {
           ?>
          <tr>
              <td><?= $rowdata -> produk_nama ?></td>
              <td><?= $rowdata -> produk_harga ?></td>
              <td><img src="<?= base_url() ?>assets/images/<?= $rowdata ->produk_image ?>" style="width:20%; height: auto"></td>
              <td><a href="<?= base_url() ?>produk/edit/?idprod=<?= $rowdata->produk_id ?>" class="btn btn-info btn-sm">
                  <i class="glyphicon glyphicon-pencil">Edit</i>
              </a>
                  <a href="<?= base_url() ?>produk/hapus/?idprod=<?= $rowdata->produk_id ?>" class="btn btn-danger btn-sm"
                      onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">
                      <i class="glyphicon glyphicon-trash">hapus</i>
                  </a>
              </td>
          </tr>
          <?php } ?>
      </table>
      <?= $paging; ?>
