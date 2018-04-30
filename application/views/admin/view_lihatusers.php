<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <!-- Bootstrap CSS-->
        <!-- <link href="<?php //echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"> -->

    </head>
    <body>
        <h3>Data Users</h3>
        <?php
        echo anchor('users/add', 'Tambah Data',array('class'=>'btn btn-sm btn-primary'))
            ?>
        <p></p>
        <table class="table table-striped">
            <tr>
                <th>no</th>
                <th>Username</th>
                <th>Terakhir Login</th>
                <th colspan="2">Users</th>
            </tr>
            <?php
            $no=1;
            foreach ($tampil->result() as $baris){
                echo "<tr>
                    <td width=10>$no</td>
                    <td>$baris->username</td>
                    <td>$baris->last_login</td>
                    <td width='20'>".anchor('users/edit/'.$baris->users_id,'Edit',array('class'=>'btn btn-info btn-sm'))."</td>
                    <td width='20'>".anchor('users/delete/'.$baris->users_id,'Hapus',array('class'=>'btn btn-danger btn-sm', 'onclick'=>'return confirm(\'Apakah anda yakin akan menghapus data ini?\')'))."</td>
                </tr>
                ";
                    $no++;
            } ?>
        </table>

            <?php  echo $paging ?>
</body>
</html>
