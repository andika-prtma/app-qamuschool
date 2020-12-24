<!DOCTYPE html>
<html>
<head>
    <title>Import Excel CodeIgniter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<?= $this->session->flashdata('notif') ?>
<div class="container" style="margin-top: 100px">
    <div class="row">
        <div class="col-md-8 offset-2">
            <form method="POST" action="<?= base_url('welcome/import_soal') ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputEmail1">UNGGAH FILE EXCEL</label>
                <input type="file" name="userfile" class="form-control">
              </div>

              <button type="submit" class="btn btn-success">UPLOAD</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>