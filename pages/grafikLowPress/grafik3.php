<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart3"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx3 = document.getElementById("myChart3").getContext("2d");
  const labels3 = <?php echo json_encode($SERIAL_No); ?>;
  const data3 = {
    labels: labels3,
    datasets: [
      {
        label: "R UPPER DIE IN 2",
        data: <?php echo json_encode($R_UPPER_DIE_IN_2); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L UPPER DIE IN 2",
        data: <?php echo json_encode($L_UPPER_DIE_IN_2); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      // garis control limit
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels2.length).fill(270), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels2.length).fill(320), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options3 = {
    responsive: true,
    scales: {
      y: {
        min: 250, // Minimum value for y-axis
        max: 380, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Upper Die Int 2 (°C)",
      },
    },
  };

  const myChart3 = new Chart(ctx3, {
    type: "line",
    data: data3,
    options: options3,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart3.data.labels = data.labels;
          myChart3.data.datasets[0].data = data.R_UPPER_DIE_IN_2;
          myChart3.data.datasets[1].data = data.L_UPPER_DIE_IN_2;
          myChart3.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
