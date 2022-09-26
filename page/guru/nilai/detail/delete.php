<?php 

    $id_nilai = $_GET['id_nilai'];

    if(isset($_GET['id_nilai'])) {

        if(delete_nilai($_POST) > 0) {

            echo "
                        <script>
                            alert ('Nilai Berhasil Dihapus');
                            window.location.href='index.php?page=nilai';
                        </script>
                    ";

        }else{

            echo "
                        <script>
                            alert ('Nilai Gagal Dihapus');
                            window.location.href='index.php?page=nilai';
                        </script>
                    ";

        }

    }

?>