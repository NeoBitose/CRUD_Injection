<?php
require "../../app/models/PortofolioModel.php";

if(isset($_GET['action']) and $_GET['action'] == 'create') {
  PortofolioController::create();
}
else if(isset($_GET['action']) and $_GET['action'] == 'update') {
  PortofolioController::update();
}
else if(isset($_GET['action']) and $_GET['action'] == 'delete') {
  PortofolioController::delete();
} 

class PortofolioController{

  static function index(){
    $data = PortofolioModel::read();
    return $data;
  }

  public static function create(){
    global $url;
    // die(print_r($_FILES['gambar']['name']));
    if ($_FILES['gambar']['name'] != '') {
      $extension = substr($_FILES['gambar']['name'],strlen($_FILES['gambar']['name'])-4,strlen($_FILES['gambar']['name']));
      $file = md5($_FILES['gambar']['name']).time().$extension;
      $result = move_uploaded_file($_FILES['gambar']['tmp_name'], 'C:\laragon\www\CRUD_Injection\views\asset\img/'.$file);
      $data = PortofolioModel::create($_POST["judul"],$_POST["deskripsi"],$_POST["link"],$_POST["tanggal"],$file);
      header("Location:".$url."/views/user/portofolio.php");
    } 
    else {
      $data = PortofolioModel::create($_POST["judul"],$_POST["deskripsi"],$_POST["link"],$_POST["tanggal"],null);
      header("Location:".$url."/views/user/portofolio.php");
    }
  }

  public static function detail(){
    $data = PortofolioModel::detail($_GET["id"]);
    return $data;
  }

  public static function update(){
    global $url;
    if ($_FILES['gambar']['name'] != '') {
      $extension = substr($_FILES['gambar']['name'],strlen($_FILES['gambar']['name'])-4,strlen($_FILES['gambar']['name']));
      $file = md5($_FILES['gambar']['name']).time().$extension;

      $data = PortofolioModel::detail($_POST["id"]);
      if ($data->gambar_porto != null) {
        if (file_exists('C:\laragon\www\CRUD_Injection\views\asset\img/'.$data->gambar_porto)) {
          unlink('C:\laragon\www\CRUD_Injection\views\asset\img/'.$data->gambar_porto);
        } 
      }
      
      $result = move_uploaded_file($_FILES['gambar']['tmp_name'], 'C:\laragon\www\CRUD_Injection\views\asset\img/'.$file);
      $data = PortofolioModel::update($_POST["id"],$_POST["judul"],$_POST["deskripsi"],$_POST["link"],$_POST["tanggal"],$file);
      header("Location:".$url."/views/user/portofolio.php");
    } 
    else {
      $data = PortofolioModel::update($_POST["id"],$_POST["judul"],$_POST["deskripsi"],$_POST["link"],$_POST["tanggal"],null);
      header("Location:".$url."/views/user/portofolio.php");
    }
  }

  public static function delete(){
    global $url;
    $data = PortofolioModel::delete($_GET["id"]);
    header("Location:".$url."/views/user/portofolio.php");
  }
}