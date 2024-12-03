<?php include "../backend/fetchDataSensor.php"; ?>

<div>
  <div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart"></canvas></div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@simondmc/popup-js@1.4.2/popup.min.js"></script>
  <script>
    const ctx = document.getElementById("myChart").getContext("2d");
    const labels = <?php echo json_encode($serialNumbers); ?>;
    const data = {
      labels: labels,
      datasets: [
        {
          label: "R Upper Water Flow",
          data: <?php echo json_encode($rUpperWaterFlow); ?>,
          fill: false,
          borderColor: "rgb(100, 50, 200)",
          tension: 0.1,
        },
        {
          label: "L Upper Water Flow",
          data: <?php echo json_encode($lUpperWaterFlow); ?>,
          fill: false,
          borderColor: "rgb(75, 192, 192)",
          tension: 0.1,
        },
        // sebagai control line (garis hitam putus-putus)
        // Lower limit line
        {
          label: "Lower Limit",
          data: Array(labels.length).fill(59), // Replace 20 with your actual lower limit
          fill: false,
          borderColor: "black",
          borderDash: [5, 5], // Dashed line
          pointRadius: 0,
        },
        // Upper limit line
        {
          label: "Upper Limit",
          data: Array(labels.length).fill(41), // Replace 50 with your actual upper limit
          fill: false,
          borderColor: "black", 
          borderDash: [5, 5], // Dashed line
          pointRadius: 0,
        }
      ],
    };

    const options = {
      responsive: true,
      scales: {
        y: {
          min: 0, // Minimum value for y-axis
          max: 80, // Maximum value for y-axis
        }
      },
      plugins: {
        legend: {
          display: true,
          position: "top",
        },
        title: {
          display: true,
          text: "Upper Water Cooling Flow (ds/min)",
        },
      },
    };

    const myChart = new Chart(ctx, {
      type: "line",
      data: data,
      options: options,
    });

    function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart.data.labels = data.labels;
          myChart.data.datasets[0].data = data.rUpperWaterFlow;
          myChart.data.datasets[1].data = data.lUpperWaterFlow;
          myChart.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
  </script>
<!-- <button type="button" class="btn py-1 px-3 mt-2" style="background-color: #DEDEDE; color: black; position: absolute; top: 23.5rem;">Lihat detail</button> -->
</div>

