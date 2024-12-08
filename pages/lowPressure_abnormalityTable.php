<?php include "../backend/fetchAbnormalities.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abnormality Table</title>
    <link rel="stylesheet" href="../src/css/styles.min.css">
    <link rel="stylesheet" href="../src/css/lowPressure.css">
    <style>
    /* Untuk mengatur gaya elemen select */
    #entriesSelect {
        color: white; /* Warna teks dropdown yang terlihat saat belum dibuka */
        border-color: white;
        appearance: none; /* Menghapus tampilan default */
        -webkit-appearance: none; /* Untuk browser berbasis WebKit */
        -moz-appearance: none; /* Untuk Firefox */
        background: transparent url("data:image/svg+xml;charset=UTF-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='white' d='M7 10l5 5 5-5H7z'/%3E%3C/svg%3E") no-repeat right 0.5rem center;
        background-size: 1rem;
        padding-right: 2rem; /* Beri ruang untuk ikon */
    }

    /* Untuk mengatur gaya teks di dalam daftar dropdown (saat dibuka) */
    #entriesSelect option {
        color: black; /* Warna teks dropdown yang ada di dalam box */
        background-color: white; /* Background putih untuk kontras */
    }
</style>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="table-container">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Serial</th>
                    <th>Sensor</th>
                    <th>Suhu</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody id="user-table">
            <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$no}</td> 
                                <td>{$row['serial_no']}</td>
                                <td>{$row['sensor_name']}</td>
                                <td>{$row['value']}</td>
                                <td>{$row['timestamp']}</td>
                            </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-between">
        <div class="mt-2">
            <label class="d-flex align-items-center">
                <span style="width: 6rem; margin-right: 20px; color: white">Jumlah baris:</span> 
                <select id="entriesSelect" class="form-select form-select-sm d-inline-block" style="width: auto; margin-right:30px;">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="100">100</option>
                </select>
            </label>
        </div>
        <div class="mt-2">
            <!-- pagination -->
            <nav aria-label="Pagination">
                <ul class="pagination">
                    <ul class="pagination listjs-pagination mb-0"></ul>
                </ul>
            </nav>

        </div>
    </div>
    
    
        
        
    </body>
    <script>
      document.addEventListener("DOMContentLoaded", () => {
    const table = document.getElementById("user-table");
    const entriesSelect = document.getElementById("entriesSelect");
    const paginationContainer = document.querySelector(".pagination ul.listjs-pagination");
    const prevButton = document.createElement("li");
    const nextButton = document.createElement("li");

    let rows = Array.from(table.querySelectorAll("tr"));
    let rowsPerPage = parseInt(entriesSelect.value); // Default rows per page
    let currentPage = 1;

    // Function to display rows based on the current page and rowsPerPage
    function displayRows() {
        const startIndex = (currentPage - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = index >= startIndex && index < endIndex ? "" : "none";
        });

        renderPagination();
    }

    // Function to render pagination controls
    function renderPagination() {
        paginationContainer.innerHTML = "";

        const totalPages = Math.ceil(rows.length / rowsPerPage);

        // Add Previous button
        prevButton.className = `page-item ${currentPage === 1 ? "disabled" : ""}`;
        prevButton.innerHTML = `<a style="height: 34.5px;" class="page-link d-flex align-items-center" href="#"><i class="bi bi-chevron-double-left"></i></a>`;
        prevButton.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                displayRows();
            }
        });
        paginationContainer.appendChild(prevButton);

        // Add page numbers
        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement("li");
            pageItem.className = `page-item ${i === currentPage ? "active" : ""}`;
            const pageLink = document.createElement("a");
            pageLink.className = "page-link";
            pageLink.textContent = i;
            pageLink.href = "#";
            pageLink.addEventListener("click", (e) => {
                e.preventDefault();
                currentPage = i;
                displayRows();
            });

            pageItem.appendChild(pageLink);
            paginationContainer.appendChild(pageItem);
        }

        // Add Next button
        nextButton.className = `page-item ${currentPage === totalPages ? "disabled" : ""}`;
        nextButton.innerHTML = `<a style="height: 34.5px;" class="page-link d-flex align-items-center" href="#"><i class="bi bi-chevron-double-right"></i></a>`;
        nextButton.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                displayRows();
            }
        });
        paginationContainer.appendChild(nextButton);
    }

    // Event listener for changing rows per page
    entriesSelect.addEventListener("change", (e) => {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1; // Reset to the first page
        displayRows();
    });

    // Initial render
    displayRows();
});

</script>
    </html>
    