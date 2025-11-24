<?php
//memanggil file m_user yang ada pada folder model
include_once '../model/m_user.php';

//membuat variabel objek dari kelas m_user
$user = new m_user();



try {
    //mengecek apakah ada aksi yang dilakukan oleh view
    if (!empty($_GET['aksi'])) {

        if (!($_GET['aksi']  == "hapus")) {

            if ($_GET['aksi'] == "edit") {
                //didapat dari v_tampil_data_user
                $id = $_GET['id'];

                //memanggil fungsi pada m_user
                $users = $user->tampil_data_by_id($id);

                //memanggil tampilan update pada folder view
                require_once '../view/v_update_data_user.php';
            } else {
                // di dapat dari inputan user pada halaman v_tambah_data_user
                $id = $_POST['user_id'];
                $nama = $_POST['nama'];
                $email = $_POST['email'];


                if ($_GET['aksi']  == "tambah") {

                    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    //memanggil fungsi tambah pada m_user


                    $hasil = $user->tambah_data($id, $nama, $email, $pass);
                    if ($hasil) {
                        echo "<script>alert('Data Berhasil Ditambahkan');window.location='../view/v_tampil_data_user.php'</script>";
                    } else {
                        echo "<script>alert('Data Gagal Ditambahkan');window.location='../view/v_tambah_data_user'</script>";
                    }
                } else if ($_GET['aksi'] = "update") {
                    $hasil = $user->update_data($id, $nama, $email);
                    // echo var_dump($hasil);
                    // die;
                    if ($hasil) {
                        echo "<script>alert('Data Berhasil Diupdate');window.location='../view/v_tampil_data_user.php'</script>";
                    } else {
                        echo "<script>alert('Data Gagal Diupdate');window.location='../view/v_update_data_user'</script>";
                    }
                }
            }
        } else {
            $result = $user->hapus_data($_GET['id']);

            if ($result) {
                echo "<script>alert('Data Berhasil Dihapus');window.location='../view/v_tampil_data_user.php'</script>";
            } else {
                echo "<script>alert('Data Tidak Berhasil Dihapus');window.location='../view/v_tampil_data_user.php'</script>";
            }
        }
    } else {
        //memanggil fungsi tampil data yang ada pada kelas m_user
        $users = $user->tampil_data();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
