<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload Form</title>
  </head>
  <body>
    <?= form_open_multipart('upload/add') ?>

    <input type="file" name="filefoto" size="20">
    <br>
    <input type="submit" value="upload">

    <?= form_close() ?>
  </body>
</html>
