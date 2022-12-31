$(document).ready(function () {
    $("#search-button").hide();

    $("#keyword").on("keyup", function () {
        $("#loading").show();
        
        // ajax menggunakan load
        // $("#table").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());

        // ajax menggunakan get

            $.get("ajax/mahasiswa.php?keyword=" + $(this).val(), function (data) {
                setTimeout(() => {
                    $("#table").html(data);
                    $("#loading").hide();
                }, 200);
            });

    });
}); 