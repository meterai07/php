let keyword = document.getElementById("keyword");
let searchButton = document.getElementById("search-button");
let table = document.getElementById("table");

keyword.addEventListener("keyup", function () {
    // //buat object ajax
    let xhr = new XMLHttpRequest();
    
    //cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            table.innerHTML = xhr.responseText;
        }
    };
    
    // //eksekusi ajax
    xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
    xhr.send();
});