<h3>Form input Produk</h3>
<hr>
<?= $this->session->flashdata('pesan') ?>
<form action="<?= base_url() ?>produk/insert" method="post" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tr>
            <td style="width:15%">Nama Produk</td>
            <td>
                <div class="col-sm-10">
                    <input type="input" name="nama" class="form-control">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:15%">Harga Produk</td>
            <td>
                <div class="col-sm-10">
                    <input type="input" name="harga" class="form-control">
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:15%">Image</td>
            <td>
                <div class="col-sm-6">
                    <input type="file" name="filefoto">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" class="btn btn-success btn-md" value="simpan">
                <button type="reset" class="btn btn-secondary btn-md" onclick="history.back()">Batal</button>
            </td>
        </tr>
    </table>
</form>
