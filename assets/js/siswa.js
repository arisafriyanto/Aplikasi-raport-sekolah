var cari = document.getElementById('cari');
var tombolCari = document.getElementById('tombolCari');
var kontener = document.getElementById('kontener');

cari.addEventListener('keyup', function() {





    var xhr = new XMLHttpRequest();




    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            kontener.innerHTML = xhr.responseText;

        }

    }

    xhr.open('GET', 'ajax/siswa.php?keyword=' + cari.value, true);
    xhr.send();








});