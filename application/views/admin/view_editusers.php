<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title></title>

        <!-- Bootstrap CSS-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <h3>Edit Data User</h3>
        <?php
        echo form_open('users/edit');
        ?>
        <input type="hidden" value="<?php echo $tampil['users_id'] ?>" name="id">
        <table class="table">
            <tr>
                <td>Username</td>
                <td><input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $tampil['username'] ?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="password" placeholder="********"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-success btn-sm" name="submit">Simpan</button>
                    <?php echo anchor('users','Kembali',array('class'=>'btn btn-secondary btn-sm')) ?>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </body>
</html>