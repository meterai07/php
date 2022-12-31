$(document).ready(function () {
    console.log("ready!");
    $("#search-button").hide();

    $("#keyword").on("keyup", function () {
        $("#table").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());
    });
}); 