<?php 
  require '../../app/controllers/PortofolioController.php';
  $data = PortofolioController::detail($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/CRUD_Injection/views/asset/css/style.css">
  <title>CRUD_Injection | Portofolio</title>
</head>

<body>
  <div class="container">
    <div class="bg"></div>
    <div class="content flex-row">
    <?php include '../components/sidenav-user.php'?>
      <div class="main-board">
        <div class="head-board">
          <?php include '../components/top-nav.php'?>
        </div>
        <div class="board">
          <div class="flex-column">
          <div class="form-card">
            <div class="head-card">
              <h3>Ubah Data Portofolio</h3>
              <hr>
            </div>
            <div class="body-card">
              <form action="/CRUD_Injection/app/controllers/PortofolioController.php?action=update" method="POST" class="form" enctype="multipart/form-data">
                <label for="judul">Judul Portofolio</label>
                <input class="input" name="judul" id="judul" type="text" value="<?= $data->nama_porto ?>">
                <label for="deskripsi">Deskripsi Portofolio</label>
                <textarea class="input-text" name="deskripsi" id="deskripsi" cols="30" rows="3"><?= $data->deskripsi_porto ?></textarea>
                <label for="link">Link Portofolio</label>
                <input class="input" name="link" id="link" type="text" value="<?= $data->link_porto ?>">
                <label for="tanggal">Tanggal Upload</label>
                <input class="input" name="tanggal" id="tanggal" type="date" value="<?= $data->tgl_upload ?>">
                <input type="hidden" name="id" value="<?= $data->id_porto ?>">
                <label for="gambar">Gambar Upload</label>
                <input class="input" name="gambar" id="gambar" type="file">
                <p>Preview gambar : </p>
                <img id="img-preview" width="150" src="#" alt="">
                <br>
                <button class="button-submit" type="submit">Kirim</button>
              </form>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    const input_gambar = document.querySelector('#gambar')
    const preview = document.querySelector('#img-preview')

    input_gambar.addEventListener('change', () => {
      if (input_gambar.files && input_gambar.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
          preview.src = e.target.result;
        }
        reader.readAsDataURL(input_gambar.files[0]);
      }
    })
  </script>
</body>

</html>