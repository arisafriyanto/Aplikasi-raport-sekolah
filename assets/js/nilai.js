var cari_nilai = document.getElementById('cari_nilai');
var tabel_nilai = document.getElementById('tabel_nilai');

cari_nilai.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            tabel_nilai.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/nilai.php?nilai=' + cari_nilai.value, true);
    xhr.send();








});