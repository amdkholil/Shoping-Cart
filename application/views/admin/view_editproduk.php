<h3>Edit data Produk</h3>
<hr>
<?= $this->session->flashdata('pesan') ?>
<form action="<?= base_url() ?>produk/update" method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td style="width:15%">Nama Produk</td>
            <td>
                <div class="col-sm-10">
                    <input type="input" name="nama" class="form-control" value="<?= $row->produk_nama ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:15%">Harga Produk</td>
            <td>
                <div class="col-sm-10">
                    <input type="input" name="harga" class="form-control" value="<?= $row->produk_harga ?>">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:15%">File foto</td>
            <td>
                <div class="col-sm-6">
                    <input type="file" name="filefoto">
                    <input type="hidden" name="filelama" value="<?= $row->produk_image ?>">
                    <input type="hidden" name="kode" value="<?= $row->produk_id ?>">
                </div>
                <div class="col-sm-6">
                    <img src="<?= base_url() ?>assets/images/<?= $row->produk_image ?>" alt="" style="width:20%">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-success btn-md" value="Update">
                <button type="reset" class="btn btn-secondary btn-md" onclick="history.back()">Batal</button>
            </td>
        </tr>
    </table>
</form>
