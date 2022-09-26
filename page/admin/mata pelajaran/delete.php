<?php 

    $id_mapel = $_GET['id_mapel'];

    if(isset($_GET['id_mapel'])) {

        if(delete_mapel($_POST) > 0) {
            echo "
                <script>
                    alert ('Data Mapel Berhasil Dihapus');
                    window.location.href='index.php?page=matapelajaran';
                </script>
                ";
        }else{
            echo "
                <script>
                    alert ('Data Mapel Berhasil Dihapus');
                    window.location.href='index.php?page=matapelajaran';
                </script>
                ";
        }

    }

?>