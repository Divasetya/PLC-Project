<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart4"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx4 = document.getElementById("myChart4").getContext("2d");
  const labels4 = <?php echo json_encode($SERIAL_No); ?>;
  const data4 = {
    labels: labels4,
    datasets: [
      {
        label: "R UPPER DIE RE",
        data: <?php echo json_encode($R_UPPER_DIE_RE); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L UPPER DIE RE",
        data: <?php echo json_encode($L_UPPER_DIE_RE); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      {
        label: "R UPPER DIE FR 1",
        data: <?php echo json_encode($R_UPPER_DIE_FR_1); ?>,
        fill: false,
        borderColor: "rgb(153, 102, 255)", // Ungu
        tension: 0.1,
      },
      {
        label: "L UPPER DIE FR 1",
        data: <?php echo json_encode($L_UPPER_DIE_FR_1); ?>,
        fill: false,
        borderColor: "rgb(255, 159, 64)", // Oranye
        tension: 0.1,
      },
      {
        label: "R UPPER DIE FR 2",
        data: <?php echo json_encode($R_UPPER_DIE_FR_2); ?>,
        fill: false,
        borderColor: "rgb(75, 0, 130)", // Indigo
        tension: 0.1,
      },
      {
        label: "L UPPER DIE FR 2",
        data: <?php echo json_encode($L_UPPER_DIE_FR_2); ?>,
        fill: false,
        borderColor: "rgb(0, 128, 128)", // Teal
        tension: 0.1,
      },

      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels4.length).fill(50), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels4.length).fill(300), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options4 = {
    responsive: true,
    scales: {
      y: {
        min: 250, // Minimum value for y-axis
        max: 350, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Upper Re & Fr (°C)",
      },
    },
  };

  const myChart4 = new Chart(ctx4, {
    type: "line",
    data: data4,
    options: options4,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart4.data.labels = data.labels;
          myChart4.data.datasets[0].data = data.R_UPPER_DIE_RE;
          myChart4.data.datasets[1].data = data.L_UPPER_DIE_RE;
          myChart4.data.datasets[2].data = data.R_UPPER_DIE_FR_2;
          myChart4.data.datasets[3].data = data.L_UPPER_DIE_FR_2;
          myChart4.data.datasets[4].data = data.R_UPPER_DIE_FR_2;
          myChart4.data.datasets[5].data = data.L_UPPER_DIE_FR_2;
          myChart4.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
