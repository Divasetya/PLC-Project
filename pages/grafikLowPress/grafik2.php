<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart2"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx2 = document.getElementById("myChart2").getContext("2d");
  const labels2 = <?php echo json_encode($SERIAL_No); ?>;
  const data2 = {
    labels: labels2,
    datasets: [
      {
        label: "L UPPER DIE IN 1",
        data: <?php echo json_encode($R_UPPER_DIE_IN_1); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L UPPER DIE IN 1",
        data: <?php echo json_encode($L_UPPER_DIE_IN_1); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      // garis control limit
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels2.length).fill(200), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels2.length).fill(324), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options2 = {
    responsive: true,
    scales: {
      y: {
        min: 150, // Minimum value for y-axis
        max: 330, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Upper Die Int 1 (°C)",
      },
    },
  };

  const myChart2 = new Chart(ctx2, {
    type: "line",
    data: data2,
    options: options2,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart2.data.labels = data.labels;
          myChart2.data.datasets[0].data = data.R_UPPER_DIE_IN_1;
          myChart2.data.datasets[1].data = data.L_UPPER_DIE_IN_1;
          myChart2.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
