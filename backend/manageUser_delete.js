$(document).ready(function () {
    $(".delete-btn").click(function () {
        const npk = $(this).data("npk");

        if (confirm("Apakah Anda yakin ingin menghapus user ini?")) {
            $.ajax({
                url: "../backend/manageUser.php",
                type: "POST",
                data: { npk: npk },
                success: function (response) {
                    const result = JSON.parse(response);

                    if (result.status === "success") {
                        alert(result.message);

                        // Refresh tabel tanpa reload penuh
                        $("#user-table").load(location.href + " #user-table>*", "");
                    } else {
                        alert(result.message);
                    }
                },
                error: function () {
                    alert("Terjadi kesalahan saat menghapus user.");
                },
            });
        }
    });
});
