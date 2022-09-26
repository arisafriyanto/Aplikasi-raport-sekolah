<?php 



    $id_dk = $_GET['id_dk'];

    if(isset($_GET['id_dk'])) {

        if(delete_kelas_siswa($_POST) > 0) {

            echo "
					<script>
						alert ('Data Kelas Berhasil Dihapus');
						window.location.href='index.php?page=kelas_siswa';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Data Kelas Berhasil Dihapus');
						window.location.href='index.php?page=kelas_siswa';
					</script>
				";

        }

    }