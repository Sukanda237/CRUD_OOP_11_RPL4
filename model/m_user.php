<?php
//memanggil file m_koneksi
include_once "m_koneksi.php";

class m_user
{

    // membuat fungsi untuk menampilkan data dari tabel user 
    function tampil_data()
    {
        //membuat objek dari kelas m_koneksi
        $koneksi = new koneksi();

        //query untuk menmpilkan semua data dari tabel user
        $sql = "SELECT * FROM users";

        // perintah untuk menjalankan sql tampil data 
        $query = mysqli_query($koneksi->koneksi, $sql);

        // mengecek apakah data yang ada ditabel user ada isinya atau tidak 
        if ($query->num_rows > 0) {

            // merubah data menjadi data berbentuk objek dan dimasukan kedalam variabel array
            while ($data = mysqli_fetch_object($query)) {
                // menyimpan data objek kedalam variabel array 
                $result[] = $data;
            }

            //kemablikan nilai array yang didalamnya terdapat data objek
            return $result;
        }
    }

    function tampil_data_by_id($id)
    {

        $koneksi = new koneksi();

        // nama tabel disesuaikan dengan studi kasus yang digunkan, dan field user_id juga disesuaikan dengan field yang ada pada tabel yang digunakan
        $sql = "SELECT * FROM users WHERE user_id = $id";

        //kembalikan hasil dari query di atas dan kita ubah datanya menjadi variabel objek, dan berupa data single, artinya kita tidak butuh pengulangan
        return mysqli_fetch_object(mysqli_query($koneksi->koneksi, $sql));
    }

    function tambah_data($id, $nama, $email, $pass)
    {


        $koneksi = new koneksi();

        $sql = "INSERT INTO users VALUES ('$id','$nama','$email','$pass')";

        $query = mysqli_query($koneksi->koneksi, $sql);

        return $query;
    }

    function update_data($id, $nama, $email)
    {
        $koneksi = new koneksi();

        return mysqli_query($koneksi->koneksi, "UPDATE users SET nama = '$nama', email = '$email' WHERE user_id = '$id'");
    }

    function hapus_data($id)
    {

        $koneksi = new koneksi();

        $sql = "DELETE FROM users WHERE user_id = $id";

        return mysqli_query($koneksi->koneksi, $sql);
    }
}
