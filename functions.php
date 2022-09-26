<?php 

    $conn = mysqli_connect("localhost", "root", "", "_raport");
    if(!$conn) {

        echo "Connection Failed";

    }




    function register($data) {

        global $conn;

        $level = $data['level'];
        $username = htmlspecialchars($data['username']);
        $nama = htmlspecialchars($data['nama']);
        $password = mysqli_real_escape_string($conn, $data['password']);
        $password2 = mysqli_real_escape_string($conn, $data['password2']);


        $sql = mysqli_query($conn, "select username from login ");
        $data = mysqli_fetch_assoc($sql);

        if($username === $data['username']) {

            echo "
					<script>
						alert ('Username Sudah Digunakan!!');
						window.location.href='register.php';
					</script>
				";

        }


        if($password != $password2) {

            echo "
					<script>
						alert ('Password Harus Sama!!');
						window.location.href='register.php';
					</script>
				";

            return false;

        }


        $password = password_hash($password, PASSWORD_DEFAULT);

        $result = mysqli_query($conn, "insert into login values (null, '$username', '$nama', '$password', '$level') ");

        return mysqli_affected_rows($conn);


        



    }







    function tampil($query) {

        global $conn;

        $result = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_assoc($result)) {

            $rows[] = $row;

        }

        return $rows;

    }




    function tambah_siswa($data) {

        global $conn;

        $kode_siswa     = htmlspecialchars($data['kode_siswa']);
        $nis            = htmlspecialchars($data['nis']);
        $username       = strtolower(stripslashes($data['username']));
        $password       = mysqli_real_escape_string($conn, $data['password']);
        $password2      = mysqli_real_escape_string($conn, $data['password2']);
        $nama_siswa     = ucwords(htmlspecialchars($data['nama_siswa']));
        $alamat         = ucwords(htmlspecialchars($data['alamat']));
        $tempat_lahir   = ucwords(htmlspecialchars($data['tempat_lahir']));
        $telepon        = htmlspecialchars($data['telepon']);
        $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);
        $tanggal_lahir  = htmlspecialchars($data['tanggal_lahir']);
        $agama          = ucwords(htmlspecialchars($data['agama']));
        $tahun_angkatan = ucwords(htmlspecialchars($data['tahun_angkatan']));
        $status         = htmlspecialchars($data['status']);

        if(empty($nis)) {
            echo "
					<script>
						alert ('Nis Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($username)) {
            echo "
					<script>
						alert ('Username Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($password)) {
            echo "
					<script>
						alert ('Password Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if($password !== $password2) {

            echo "<script>
					alert ('password harus sama');
					window.location.href='index.php?page=siswa&action=insert';
				</script>";

				return false;

        }else if(empty($nama_siswa)) {
            echo "
					<script>
						alert ('Nama Siswa Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($alamat)) {
            echo "
					<script>
						alert ('Alamat Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($tempat_lahir)) {
            echo "
					<script>
						alert ('Tempat Lahir Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($telepon)) {
            echo "
					<script>
						alert ('Telepon Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($jenis_kelamin)) {
            echo "
					<script>
						alert ('Jenis Kelamin Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($tanggal_lahir)) {
            echo "
					<script>
						alert ('Tanggal Lahir Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($agama)) {
            echo "
					<script>
						alert ('Agama Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($tahun_angkatan)) {
            echo "
					<script>
						alert ('Tahun Ajaran Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }else if(empty($status)) {
            echo "
					<script>
						alert ('Status Harus Diisi');
						window.location.href='index.php?page=siswa&action=insert';
					</script>
                ";
            return false;
        }


        
        $foto_siswa     = upload_siswa();




        $query = mysqli_query($conn, "select username from siswa where username='$username' ");
        if(mysqli_fetch_assoc($query)) {

            echo "<script>
					alert ('ws ana kh lahhh isin oh');
					window.location.href='index.php?page=siswa&action=insert';
				</script>";

				return false;

        }




        



        $password = password_hash($password, PASSWORD_DEFAULT);


        

        if(!$foto_siswa) {

            return false;

        }





        $result = mysqli_query($conn, "insert into siswa values 
                (null, '$kode_siswa', '$nis', '$username', '$password', '$nama_siswa',
                '$alamat', '$tempat_lahir', '$telepon', '$jenis_kelamin',
                '$tanggal_lahir', '$agama', '$tahun_angkatan', '$foto_siswa', '$status', 'siswa' ) ");




        return mysqli_affected_rows($conn);


    }



    function upload_siswa() {

        $namafile = $_FILES['foto_siswa']['name'];
        $ukuran = $_FILES['foto_siswa']['size'];
        $error = $_FILES['foto_siswa']['error'];
        $tmp_name = $_FILES['foto_siswa']['tmp_name'];


        if($error === 4) {

            echo "<script>
					alert ('Harus Pilih Gambar');
					window.location.href='index.php?page=siswa';
				</script>";

				return false;

        }




        if($ukuran > 1000000) {

            echo "<script>
					alert ('ukuran terlalu besar');
					window.location.href='index.php?page=siswa';
				</script>";

				return false;

        }



        $extensigambarvalid = ['jpg', 'jpeg', 'png', 'jfif'];
        $extensigambar      = explode(".", $namafile);
        $extensigambar      = strtolower(end($extensigambar));

        if(!in_array($extensigambar, $extensigambarvalid)) {

            echo "<script>
					alert ('Yang diupload bukan gambar');
					window.location.href='index.php?page=siswa';
				</script>";

				return false;

        }


        $namafilebaru = uniqid();
        $namafilebaru .= ".";
        $namafilebaru .= $extensigambar;


        move_uploaded_file($tmp_name, '../../assets/img/siswa/' . $namafilebaru);


        return $namafilebaru;





    }







    function update_siswa($data) {

        global $conn;

        $id_siswa = $_GET['id_siswa'];

        $kode_siswa     = htmlspecialchars($data['kode_siswa']);
        $nis            = htmlspecialchars($data['nis']);
        $username       = strtolower(stripslashes($data['username']));
        $password       = mysqli_real_escape_string($conn, $data['password']);
        $password2      = mysqli_real_escape_string($conn, $data['password2']);
        $nama_siswa     = ucwords(htmlspecialchars($data['nama_siswa']));
        $alamat         = ucwords(htmlspecialchars($data['alamat']));
        $tempat_lahir   = ucwords(htmlspecialchars($data['tempat_lahir']));
        $telepon        = htmlspecialchars($data['telepon']);
        $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);
        $tanggal_lahir  = htmlspecialchars($data['tanggal_lahir']);
        $agama          = ucwords(htmlspecialchars($data['agama']));
        $tahun_angkatan = ucwords(htmlspecialchars($data['tahun_angkatan']));
        $status         = htmlspecialchars($data['status']);
        $foto_siswa_lama = htmlspecialchars($data['fotosiswalama']);
        


        if($_FILES['foto_siswa']['error'] === 4) {

            $foto_siswa = $foto_siswa_lama;

        }else{

            $foto_siswa     = upload_siswa();

        }


        $result = mysqli_query($conn, "update siswa set 
                kode_siswa='$kode_siswa', nis='$nis', username='$username', password='$password', nama_siswa='$nama_siswa',
                alamat='$alamat', tempat_lahir='$tempat_lahir', telepon='$telepon', jenis_kelamin='$jenis_kelamin',
                tanggal_lahir='$tanggal_lahir', agama='$agama', tahun_angkatan='$tahun_angkatan', foto_siswa='$foto_siswa', status='$status',
                level='siswa' where id_siswa='$id_siswa' ");




        return mysqli_affected_rows($conn);


    }





    function delete_siswa($data) {

        global $conn;

        $id_siswa = $_GET['id_siswa'];

        $query = mysqli_query($conn, "delete from siswa where id_siswa='$id_siswa' ");

        return mysqli_affected_rows($conn);

    }










    function tambah_guru($data) {

        global $conn;

        $kode_guru      = htmlspecialchars($data['kode_guru']);
        $nip            = htmlspecialchars($data['nip']);
        $username       = strtolower(stripslashes($data['username']));
        $password       = mysqli_real_escape_string($conn, $data['password']);
        $password2      = mysqli_real_escape_string($conn, $data['password2']);
        $nama_guru      = ucwords(htmlspecialchars($data['nama_guru']));
        $alamat         = ucwords(htmlspecialchars($data['alamat']));
        $telepon        = htmlspecialchars($data['telepon']);
        $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);
        $status         = htmlspecialchars($data['status']);

        if(empty($nip)) {
            echo "
					<script>
						alert ('Nip Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($username)) {
            echo "
					<script>
						alert ('Username Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($password)) {
            echo "
					<script>
						alert ('Password Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if($password !== $password2) {

            echo "<script>
					alert ('password harus sama');
					window.location.href='index.php?page=guru&action=insert';
				</script>";

				return false;

        }else if(empty($nama_guru)) {
            echo "
					<script>
						alert ('Nama Guru Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($alamat)) {
            echo "
					<script>
						alert ('Alamat Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($telepon)) {
            echo "
					<script>
						alert ('Telepon Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($jenis_kelamin)) {
            echo "
					<script>
						alert ('Jenis Kelamin Harus Diisi');
						window.location.href='index.php?page=guru&action=insert';
					</script>
                ";
            return false;
        }else if(empty($status)) {
            echo "
					<script>
						alert ('Status Harus Diisi');
						window.location.href='index.php?page=guruguru&action=insert';
					</script>
                ";
            return false;
        }


        
        $foto_guru     = upload_guru();




        $query = mysqli_query($conn, "select username from guru where username='$username' ");
        if(mysqli_fetch_assoc($query)) {

            echo "<script>
					alert ('ws ana kh lahhh isin oh');
					window.location.href='index.php?page=guru&action=insert';
				</script>";

				return false;

        }


        $password = password_hash($password, PASSWORD_DEFAULT);


        

        if(!$foto_guru) {

            return false;

        }





        $result = mysqli_query($conn, "insert into guru values 
                (null, '$kode_guru', '$nip', '$username', '$password', '$nama_guru',
                '$alamat', '$telepon', '$jenis_kelamin',
                '$foto_guru', '$status', 'guru' ) ");




        return mysqli_affected_rows($conn);


    }






    function upload_guru() {

        $namafile = $_FILES['foto_guru']['name'];
        $ukuran = $_FILES['foto_guru']['size'];
        $error = $_FILES['foto_guru']['error'];
        $tmp_name = $_FILES['foto_guru']['tmp_name'];


        if($error === 4) {

            echo "<script>
					alert ('Harus Pilih Gambar');
					window.location.href='index.php?page=guru';
				</script>";

				return false;

        }




        if($ukuran > 1000000) {

            echo "<script>
					alert ('ukuran terlalu besar');
					window.location.href='index.php?page=guru';
				</script>";

				return false;

        }



        $extensigambarvalid = ['jpg', 'jpeg', 'png', 'jfif'];
        $extensigambar      = explode(".", $namafile);
        $extensigambar      = strtolower(end($extensigambar));

        if(!in_array($extensigambar, $extensigambarvalid)) {

            echo "<script>
					alert ('Yang diupload bukan gambar');
					window.location.href='index.php?page=guru';
				</script>";

				return false;

        }


        $namafilebaru = uniqid();
        $namafilebaru .= ".";
        $namafilebaru .= $extensigambar;


        move_uploaded_file($tmp_name, '../../assets/img/guru/' . $namafilebaru);


        return $namafilebaru;

    }






    function update_guru($data) {

        global $conn;

        $id_guru = $_GET['id_guru'];

        $kode_guru     = htmlspecialchars($data['kode_guru']);
        $nip            = htmlspecialchars($data['nip']);
        $username       = strtolower(stripslashes($data['username']));
        $password       = mysqli_real_escape_string($conn, $data['password']);
        $password2      = mysqli_real_escape_string($conn, $data['password2']);
        $nama_guru     = ucwords(htmlspecialchars($data['nama_guru']));
        $alamat         = ucwords(htmlspecialchars($data['alamat']));
        $telepon        = htmlspecialchars($data['telepon']);
        $jenis_kelamin  = htmlspecialchars($data['jenis_kelamin']);
        $status         = htmlspecialchars($data['status']);


        $fotogurulama = htmlspecialchars($data['fotogurulama']);
        


        if($_FILES['foto_guru']['error'] === 4) {

            $foto_guru = $fotogurulama;

        }else{

            $foto_guru     = upload_guru();

        }


        $result = mysqli_query($conn, "update guru set 
                kode_guru='$kode_guru', nip='$nip', username='$username', password='$password', nama_guru='$nama_guru',
                alamat='$alamat', telepon='$telepon', jenis_kelamin='$jenis_kelamin',
                foto_guru='$foto_guru', status='$status', level='guru' where id_guru='$id_guru' ");




        return mysqli_affected_rows($conn);

    }





    function delete_guru($data) {


        global $conn;

        $id_guru = $_GET['id_guru'];

        $sql = mysqli_query($conn, "delete from guru where id_guru='$id_guru' ");

        return mysqli_affected_rows($conn);

    }






    function tambah_mapel($data) {

        global $conn;

        $kode_pelajaran = htmlspecialchars($data['kode_pelajaran']);
        $nama_mapel = ucwords(htmlspecialchars($data['nama_mapel']));
        $keterangan = htmlspecialchars($data['keterangan']);

        if(empty($kode_pelajaran)) {

            echo "
					<script>
						alert ('Kode Pelajaran Harus Diisi');
						window.location.href='index.php?page=matapelajaran&action=insert';
					</script>
                ";
            return false;

        }else if(empty($nama_mapel)) {

            echo "
					<script>
						alert ('Nama Mata Pelajaran Harus Diisi');
						window.location.href='index.php?page=matapelajaran&action=insert';
					</script>
                ";
            return false;

        }else if(empty($keterangan)) {

            echo "
					<script>
						alert ('keterangan Harus Diisi');
						window.location.href='index.php?page=matapelajaran&action=insert';
					</script>
                ";
            return false;

        }

        $sql = mysqli_query($conn, "insert into mapel values 
        (null, '$kode_pelajaran', '$nama_mapel', '$keterangan' ) ");

        return mysqli_affected_rows($conn);

    }



    


    function update_mapel($data) {

        global $conn;

        $id_mapel = $_GET['id_mapel'];

        $kode_pelajaran = htmlspecialchars($data['kode_pelajaran']);
        $nama_mapel = htmlspecialchars($data['nama_mapel']);
        $keterangan = htmlspecialchars($data['keterangan']);

        $query = "update mapel set kode_pelajaran='".$kode_pelajaran."', nama_mapel='".$nama_mapel."',
        keterangan='".$keterangan."' where id_mapel='$id_mapel' ";

        $result = mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);

    }






    
    function delete_mapel($data) {


        global $conn;

        $id_mapel = $_GET['id_mapel'];

        $sql = mysqli_query($conn, "delete from mapel where id_mapel='$id_mapel' ");

        return mysqli_affected_rows($conn);

    }






    function tambah_kelas($data) {

        global $conn;

        $kode_kelas = htmlspecialchars($data['kode_kelas']);
        $tahun_ajaran = htmlspecialchars($data['tahun_ajaran']);
        $nama_kelas = strtoupper(htmlspecialchars($data['nama_kelas']));
        $kelas = strtoupper(htmlspecialchars($data['kelas']));
        $nama_walikelas = ucwords(htmlspecialchars($data['nama_walikelas']));
        $status = htmlspecialchars($data['status']);

        if(empty($kode_kelas)) {

            echo "
					<script>
						alert ('Kode Kelas Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }else if(empty($tahun_ajaran)) {

            echo "
					<script>
						alert ('Tahun Ajaran Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }else if(empty($nama_kelas)) {

            echo "
					<script>
						alert ('Nama Kelas Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }else if(empty($kelas)) {

            echo "
					<script>
						alert ('Kelas Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }else if(empty($nama_walikelas)) {

            echo "
					<script>
						alert ('Nama Walikelas Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }else if(empty($status)) {

            echo "
					<script>
						alert ('status Harus Diisi');
						window.location.href='index.php?page=kelas&action=insert';
					</script>
                ";
            return false;

        }

        $sql = mysqli_query($conn, "insert into kelas values 
        (null, '$kode_kelas', '$tahun_ajaran', '$nama_kelas', '$kelas', '$nama_walikelas', '$status') ");

        return mysqli_affected_rows($conn);

    }







    function update_kelas($data) {

        global $conn;

        $id_kelas = $_GET['id_kelas'];
        $kode_kelas = htmlspecialchars($data['kode_kelas']);
        $tahun_ajaran = htmlspecialchars($data['tahun_ajaran']);
        $nama_kelas = strtoupper(htmlspecialchars($data['nama_kelas']));
        $kelas = strtoupper(htmlspecialchars($data['kelas']));
        $nama_walikelas = ucwords(htmlspecialchars($data['nama_walikelas']));
        $status = htmlspecialchars($data['status']);



        $sql = mysqli_query($conn, "update kelas set
         kode_kelas='".$kode_kelas."', tahun_ajaran='".$tahun_ajaran."', nama_kelas='".$nama_kelas."', kelas='".$kelas."', 
         nama_walikelas='".$nama_walikelas."', status='".$status."' where id_kelas='$id_kelas' ");

        return mysqli_affected_rows($conn);

    }





    function delete_kelas($data) {

        global $conn;

        $id_kelas = $_GET['id_kelas'];

        $query = mysqli_query($conn, "delete from kelas where id_kelas='$id_kelas' ");

        return mysqli_affected_rows($conn);

    }








    function update_data_kelas($data) {

        global $conn;

        $id_dk = $_GET['id_dk'];

        $kode_data_siswa = $_POST['kode_data_siswa'];
        $nis             = $_POST['nis'];
        $kode_siswa      = $_POST['kode_siswa'];
        $kelas           = $_POST['kelas'];
        $nama_kelas      = $_POST['nama_kelas'];
        $tahun_ajaran    = $_POST['tahun_ajaran'];
        $nama_siswa      = $_POST['nama_siswa'];
        $walikelas       = $_POST['walikelas'];
        $jurusan         = $_POST['jurusan'];
        $status          = $_POST['status'];


        $result = mysqli_query($conn, "update kelas_siswa set kode_data_siswa='".$kode_data_siswa."',
        nis='".$nis."', kode_siswa='".$kode_siswa."', nama_kelas='".$nama_kelas."', kelas='".$kelas."', tahun_ajaran='".$tahun_ajaran."',
        nama_siswa='".$nama_siswa."', status='".$status."', walikelas='".$walikelas."', jurusan='".$jurusan."' where id_dk='$id_dk' ");


        return mysqli_affected_rows($conn);


    }






    function delete_kelas_siswa($data) {

        global $conn;

        $id_dk = $_GET['id_dk'];

        $query = mysqli_query($conn, "delete from kelas_siswa where id_dk='$id_dk' ");

        return mysqli_affected_rows($conn);

    }








    function tambah_nilai($data) {

        global $conn;

            $nama_siswa		= $_POST['nama_siswa'];
            $pelajaran      = $_POST['pelajaran'];
            $semester       = $_POST['semester'];
            $nilai_tugas_1  = htmlspecialchars($_POST['nilai_tugas_1']);
            $nilai_tugas_2  = htmlspecialchars($_POST['nilai_tugas_2']);
            $nilai_tugas_3  = htmlspecialchars($_POST['nilai_tugas_3']);
            $nilai_uts      = htmlspecialchars($_POST['nilai_uts']);
            $nilai_uas      = htmlspecialchars($_POST['nilai_uas']);
            $keterangan     = htmlspecialchars($_POST['keterangan']);


            if(empty($pelajaran)) {

                echo "
                        <script>
                            alert ('Pelajaran Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($semester)) {

                echo "
                        <script>
                            alert ('Semester Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($nilai_tugas_1)) {

                echo "
                        <script>
                            alert ('Nilai Tugas 1 Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($nilai_tugas_2)) {

                echo "
                        <script>
                            alert ('Nilai Tugas 2 Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($nilai_tugas_3)) {

                echo "
                        <script>
                            alert ('Nilai Tugas 3 Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($nilai_uts)) {

                echo "
                        <script>
                            alert ('Nilai Uts Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($nilai_uas)) {

                echo "
                        <script>
                            alert ('Nilai Uas Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }else if(empty($keterangan)) {

                echo "
                        <script>
                            alert ('Keterangan Harus Diisi');
                            window.location.href='index.php?page=nilai&action=insert';
                        </script>
                    ";
                return false;

            }



            $result = mysqli_query($conn, "insert into nilai values (null,
            '$nama_siswa','$semester', '$pelajaran', '$nilai_tugas_1', '$nilai_tugas_2',
            '$nilai_tugas_3', '$nilai_uts', '$nilai_uas', '$keterangan') ");
            

            return mysqli_affected_rows($conn);

    }




    
    function update_nilai($data) {

        global $conn;

        $id_nilai       = $_GET['id_nilai'];
        $pelajaran      = $_POST['pelajaran'];
        $semester       = $_POST['semester'];
        $nilai_tugas_1  = htmlspecialchars($_POST['nilai_tugas_1']);
        $nilai_tugas_2  = htmlspecialchars($_POST['nilai_tugas_2']);
        $nilai_tugas_3  = htmlspecialchars($_POST['nilai_tugas_3']);
        $nilai_uts      = htmlspecialchars($_POST['nilai_uts']);
        $nilai_uas      = htmlspecialchars($_POST['nilai_uas']);
        $keterangan     = htmlspecialchars($_POST['keterangan']);



        $result = mysqli_query($conn, "update nilai set
        pelajaran='".$pelajaran."', semester='".$semester."', nilai_tugas_1='".$nilai_tugas_1."',
        nilai_tugas_2='".$nilai_tugas_2."', nilai_tugas_3='".$nilai_tugas_3."', nilai_uts='".$nilai_uts."', 
        nilai_uas='".$nilai_uas."', keterangan='".$keterangan."' where id_nilai='$id_nilai'   ");

            return mysqli_affected_rows($conn);

    }





    function delete_nilai($data) {

        global $conn;

        $id_nilai = $_GET['id_nilai'];

        $sql = mysqli_query($conn, "delete from nilai where id_nilai='$id_nilai' ");

        return mysqli_affected_rows($conn);

    }