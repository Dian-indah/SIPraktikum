<?php

class AslabModel
{
    /**
     * @param integer $idAslab berisi id aslab
     * Function get berfungsi untuk mengambil seluruh data praktikan dari database
     */

    public function get($idAslab) 
    {
        $sql ="SELECT praktikan.id as idPraktikan , praktikan.nama as namaPraktikan , praktikan.npm as npmPraktikan ,
        praktikan.nomor_hp as nohpPraktikan , praktikum.nama as namaPraktikum FROM praktikan
        JOIN daftarprak ON daftarprak.praktikan_id = praktikan.id
        JOIN praktikum ON daftarprak.praktikum_id = praktikum.id
        WHERE daftarprak.status = 1
        AND daftarprak.aslab_id = $idAslab
        AND praktikum.status = 1";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function get modul berfungsi untuk mengambil seluruh data modul
     */
    public function getModul()
    {
        $sql="SELECT modul.id as idModul , modul.nama as namaModul FROM modul
        JOIN praktikum on praktikum.id = modul.praktikum_id
        WHERE praktikum.status = 1";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;  
    }

    /**
     * @param integer idPraktikan berisi id praktikan
     * Function get nilai praktikan berfungsi untuk mengambil seluruh data nilai dari database
     */
    public function getNilaiPraktikan($idPraktikan)
    {
        $sql = "SELECT * from nilai
        JOIN modul on modul.id = nilai.modul_id
        WHERE praktikan_id = $idPraktikan
        ORDER BY modul.id";

        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil; 
    }

    /**
     * @param integer idModul berisi id modul
     * @param integer idPraktikan berisi id praktikan
     * @param integer nilai berisi nilai praktikan
     * Function prosesStoreNilai berfungsi untuk melakukan insert nilai praktikan ke database nilai sesuai dengan id praktikan dan id permodul
     */
    public function prosesStoreNilai($idModul,$idPraktikan,$nilai)
    {
        $sqlcek = "SELECT * FROM nilai WHERE modul_id=$idModul AND praktikan_id=$idPraktikan";
        $cek = koneksi()->query($sqlcek);
        if($cek->fetch_assoc()==null){
            $sqlinsert = "INSERT INTO nilai(modul_id,praktikan_id,nilai) VALUES($idModul,$idPraktikan,$nilai)";
            $query = koneksi()->query($sqlinsert);
        }else{
            $sqlUpdate = "UPDATE nilai SET nilai='$nilai' WHERE modul_id=$idModul and praktikan_id=$idPraktikan";
            $query = koneksi()->query($sqlUpdate);
        }
        return $query;
    }
}
// $tes = new AslabModel();
// var_export($tes->prosesStoreNilai(2,1,85));
// die();