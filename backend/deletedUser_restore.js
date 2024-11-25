$(document).on("click", ".restore-btn", function () {
    const npk = $(this).data("npk");
    console.log("Tombol Pulihkan diklik. NPK:", npk); // Debug

    if (confirm("Apakah Anda yakin ingin mengaktifkan user ini?")) {
        $.ajax({
            url: "../backend/deletedUser.php",
            type: "POST",
            data: { npk: npk },
            success: function (response) {
                console.log("Response dari server:", response); // Debug respons server
                const result = JSON.parse(response);

                if (result.status === "success") {
                    alert(result.message);
                    $("#user-table").load(location.href + " #user-table>*", ""); // Refresh tabel
                } else {
                    alert(result.message);
                }
            },
            error: function () {
                alert("Terjadi kesalahan saat mengatifkan user.");
            },
        });
    }
});
