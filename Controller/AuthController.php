<?php

class AuthController
{
    private $model;

    /**
    * Function ini adalah constructor yang berguna menginisialisasi obyek aslab Model
    */
    public function __construct()
    {
        $this->model = new AuthModel();
    }

    // Function index berfungsi untuk mengatur tampilan awal
    public function index()
    {
        require_once("view/auth/index.php");
    }

    //Function login_aslab berfungsi untuk mengatur ke halaman login untuk aslab
    public function login_aslab()
    {
        require_once("view/auth/login_aslab.php");
    }

    //Function login_praktikan berfungsi untuk mengatur ke halaman login untuk praktikan
    public function login_praktikan()
    {
        require_once("view/auth/login_praktikan.php");
    }

    //Function authAslab untuk authentication aslab
    public function authAslab()
    {
        $npm = $_POST['npm']; //method post mengambil data
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAslab($npm, $password);

        if($data){// ketika data ada
            $_SESSION['role'] = 'aslab'; //untuk berpindah kehalaman
            $_SESSION['aslab'] = $data;

            header("location:index.php?page=aslab&aksi=view&pesan=Berhasil Login");//lihat di index -> namanya routing
        }else{
            header("location:index.php?page=auth&aksi=loginAslab&pesan=Password atau NPM salah");
        }
    }

    //Function authPraktikan untuk authentication praktikan
    public function authPraktikan()
    {
        $npm = $_POST['npm']; //method post mengambil data
        $password = $_POST['password'];
        $data = $this->model->prosesAuthPraktikan($npm, $password);

        if($data){// ketikadata ada
            $_SESSION['role'] = 'praktikan'; //untuk berpindah kehalaman
            $_SESSION['praktikan'] = $data;

            header("location:index.php?page=praktikan&aksi=view&pesan=Berhasil Login");//lihat di index -> namanya routing
        }else{
            header("location:index.php?page=auth&aksi=loginPraktikan&pesan=Password atau NPM salah");
        }
    }

    //Function daftarPraktikan berfungsi untuk mengatur tampilan daftar
    public function daftarPraktikan()
    {
        require_once("view/auth/daftar_praktikan.php");
    }

    /**
    * Function store berfungsi untuk memproses data untuk di tambahkan 
    * Fungsi ini membutuhkan data nama,npm,password,notelp dengan metode http request POST
    */
    public function storePraktikan()
    {
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $no_hp = $_POST['no_hp'];
        $password = $_POST['password'];
        if($this->model->prosesStorePraktikan($nama,$npm,$no_hp,$password)){
            header("location: index.php?page=auth&aksi=view&pesan=Berhasil Daftar");
        }else{
            header("location: index.php?page=aslab&aksi=view&pesan=Gagal Daftar");
        }
    }
    
    public function logout()
    {
        session_destroy();
        header("location:index.php?page=auth&aksi=view&pesan=Berhasil Logput");
    }
}
?>