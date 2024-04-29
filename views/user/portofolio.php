<?php 
  require '../../app/controllers/PortofolioController.php';
  $data = PortofolioController::index();
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
            <div class="card-table">
              <div class="head-card">
                <h3>Table Portofolio</h3>
                <hr>
              </div>
              <div class="body-card">
                <a href="/CRUD_Injection/views/user/create.php">
                  <button class="create-btn">Tambah Data</button>
                </a>
                <table class="table" cellspacing="0">
                  <tr>
                    <th>No</th>
                    <th>Judul Portofolio</th>
                    <th>Link</th>
                    <th>Tanggal Upload</th>
                    <th>Gambar</th>
                    <th>Nama Pengguna</th>
                    <th>Aksi</th>
                  </tr>
                  <?php 
                    for ($i=0; $i < count($data); $i++) { 
                  ?>
                  <tr>
                    <td>1</td>
                    <td><?= $data[$i]['nama_porto']; ?></td>
                    <td><a href="<?= $data[$i]['link_porto']; ?>"><?= $data[$i]['link_porto']; ?></a></td>
                    <td><?= $data[$i]['tgl_upload']; ?></td>
                    <td><img src="/CRUD_Injection/views/asset/img/<?= $data[$i]['gambar_porto']; ?>" alt="" width="150"></td>
                    <td><?= $data[$i]['username']; ?></td>
                    <td>
                      <div class="grup-action-btn">
                        <a href="/CRUD_Injection/views/user/update.php?id=<?= $data[$i]['id_porto']?>">
                          <button class="edit-btn">Edit</button>
                        </a>
                        <a href="/CRUD_Injection/app/controllers/PortofolioController.php?action=delete&id=<?= $data[$i]['id_porto']?>" onclick="return confirm('Anda yakin menghapus data ini?');">
                          <button class="delete-btn">Hapus</button>
                        </a>
                      </div>
                    </td>
                  </tr>
                  <?php 
                    }
                  ?>  
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // var delete_link = document.getElementById('delete-link');
    // $('.delete-btn').click(function(e) {
    //   e.preventDefault();
    //   Swal.fire({
    //     title: 'Apakah anda yakin menghapus data ini ?',
    //     text: '',
    //     icon: 'warning',
    //     showConfirmButton: true,
    //     showCancelButton: true,
    //     confirmButtonText: 'Ya',
    //     cancelButtonText: 'Tidak'
    //   }).then((result) => {
    //     if (result.isConfirmed) {
    //       console.log('ok');
    //       window.location.href = delete_link.href;
    //     }
    //   })
    // });
    // $('.delete-btn').click(function(e) {
    // e.preventDefault();
    // var delete_link = $(this).closest('.delete-link').attr('href'); // Ambil URL dari tautan terdekat
    // Swal.fire({
    //   title: 'Apakah anda yakin menghapus data ini ?',
    //   text: '',
    //   icon: 'warning',
    //   showConfirmButton: true,
    //   showCancelButton: true,
    //   confirmButtonText: 'Ya',
    //   cancelButtonText: 'Tidak'
    // }).then((result) => {
    //   if (result.isConfirmed) {
    //     console.log('ok');
    //     window.location.href = delete_link; // Arahkan ke URL delete_link setelah konfirmasi
    //   }
    // });
  // });

  </script>
</body>

</html>