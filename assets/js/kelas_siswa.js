var cari_kelas_siswa = document.getElementById('cari_kelas_siswa');
var tabel_kelas_siswa = document.getElementById('tabel_kelas_siswa');

cari_kelas_siswa.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            tabel_kelas_siswa.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/kelas_siswa.php?kelas_siswa=' + cari_kelas_siswa.value, true);
    xhr.send();








});