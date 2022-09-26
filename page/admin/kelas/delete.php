<?php 



    $id_kelas = $_GET['id_kelas'];

    if(isset($_GET['id_kelas'])) {

        if(delete_kelas($_POST) > 0) {

            echo "
					<script>
						alert ('Data Kelas Berhasil DiHapus');
						window.location.href='index.php?page=kelas';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Data Kelas Gagal DiHapus');
						window.location.href='index.php?page=kelas';
					</script>
				";

        }

    }