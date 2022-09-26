var cari_kelas = document.getElementById('cari_kelas');
var tabel_kelas = document.getElementById('tabel_kelas');

cari_kelas.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            tabel_kelas.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/kelas.php?kelas=' + cari_kelas.value, true);
    xhr.send();








});