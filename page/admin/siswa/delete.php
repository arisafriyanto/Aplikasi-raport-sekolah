<?php 

    $id_siswa = $_GET['id_siswa'];

    if(isset($_GET['id_siswa'])) {

        if(delete_siswa($_POST) > 0) {

            echo "
					<script>
						alert ('Siswa Berhasil DiHapus');
						window.location.href='index.php?page=siswa';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Siswa Gagal DiHapus');
						window.location.href='index.php?page=siswa';
					</script>
				";

        }

    }

?>