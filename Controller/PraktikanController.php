<?php

class PraktikanController
{
    private $model;

    /**
    * Function ini adalah constructor yang berguna menginisialisasi obyek aslab Model
    */
    public function __construct()
    {
        $this->model = new PraktikanModel();
    }

    /**Function index berfungsi untuk mengatur tampilan awal halaman praktikan*/
    public function index()
    {
        $id = $_SESSION['praktikan']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/praktikan/index.php");
    }

    /**
     * Function edit berfungsi untuk menampilkan form edit
     */
    public function edit()
    {
        $id = $_SESSION['praktikan']['id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/praktikan/edit.php");
    }

    /**
     * Function update berfungsi untuk menyimpan hasil edit
     */
    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];

        if($this->model->prosesUpdate($nama, $npm, $password, $no_hp, $id)){
            header("location:index.php?page=praktikan&aksi=view&pesan=Berhasil Ubah Data");
        }else{
            header("location:index.php?page=praktikan&aksi=edit&pesan=Gagal Ubah Data");
        }
    }

    /**Function praktikum yaitu untuk mengatur tampilan awal halaman praktikum */
    public function praktikum()
    {
        $idPraktikan = $_SESSION['praktikan']['id'];
        $data = $this->model->getPendaftaranPraktikum($idPraktikan);
        extract($data);
        require_once("View/praktikan/praktikum.php");
    }

    /**Function daftarpraktikum berfungsi untuk mengatur tampilan awal halaman daftar praktikum */
    public function daftarpraktikum()
    {
        $data = $this->model->getPraktikum();
        extract($data);
        require_once("View/praktikan/daftarPraktikum.php");
    }

    /**
     * Function storePraktikum berfungsi untuk memproses data praktikum yang telah dipilih untuk ditambahkan
     */
    public function storePraktikum()
    {
        $idPraktikum = $_POST['praktikum'];
        $idPraktikan = $_SESSION['praktikan']['id'];
        
        if($this->model->prosesStorePraktikum($idPraktikan,$idPraktikum)){
            header("location:index.php?page=praktikan&aksi=praktikum&pesan=Berhasil Daftar Praktikum");
        }else{
            header("location:index.php?page=praktikan&aksi=daftarPraktikum&pesan=Gagal Daftar Praktikum");
        }
    }

    /**Function nilaiPraktikan berfungsi untuk mengatur halaman nilai praktikum praktikan*/
    public function nilaiPraktikan()
    {
        $idPraktikan = $_SESSION['praktikan']['id'];
        $idPraktikum = $_GET['idPraktikum'];
        $modul = $this->model->getModul();
        $nilai = $this->model->getNilaiPraktikan($idPraktikan,$idPraktikum);
        extract($modul);
        extract($nilai);
        require_once("View/praktikan/nilaiPraktikan.php");
    }

}   
?>