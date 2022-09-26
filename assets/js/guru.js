var cari_guru = document.getElementById('cari_guru');
var tabel_guru = document.getElementById('tabel_guru');

cari_guru.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            tabel_guru.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/guru.php?guru=' + cari_guru.value, true);
    xhr.send();








});