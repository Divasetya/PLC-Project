<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart3"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx3 = document.getElementById("myChart3").getContext("2d");
  const labels3 = <?php echo json_encode($serialNumbers); ?>;
  const data3 = {
    labels: labels3,
    datasets: [
      {
        label: "Cooling Water In <Cycle Start>",
        data: <?php echo json_encode($coolingWaterInCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "Cooling Air In <Cycle Start>",
        data: <?php echo json_encode($coolingAirInCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      //sebagai control line (grais hitam putus-putus)
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels3.length).fill(30), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels3.length).fill(45), // Replace 300 with your actual upper limit
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
        min: 25, // Minimum value for y-axis
        max: 50, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Cooling Temp (°C)",
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
          myChart3.data.datasets[0].data = data.coolingWaterInCycleStart;
          myChart3.data.datasets[1].data = data.coolingAirInCycleStart;
          myChart3.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
