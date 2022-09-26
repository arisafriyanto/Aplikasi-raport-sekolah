<?php 

    $id_guru = $_GET['id_guru'];

    if(isset($_GET['id_guru'])) {

        if(delete_guru($_POST) > 0) {

            echo "
					<script>
						alert ('Data Guru Berhasil Dihapus');
						window.location.href='index.php?page=guru';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Data Guru Gagal Dihapus');
						window.location.href='index.php?page=guru';
					</script>
				";

        }

    }

?>