var cari_mapel = document.getElementById('cari_mapel');
var tabel_mapel = document.getElementById('tabel_mapel');

cari_mapel.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            tabel_mapel.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/mapel.php?mapel=' + cari_mapel.value, true);
    xhr.send();








});