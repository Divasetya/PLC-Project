<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart7"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx7 = document.getElementById("myChart7").getContext("2d");
  const labels7 = <?php echo json_encode($serialNumbers); ?>;
  const data7 = {
    labels: labels7,
    datasets: [
      {
        label: "Humidity",
        data: <?php echo json_encode($humidity); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "Humidity <Cycle Start>",
        data: <?php echo json_encode($humidityCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels7.length).fill(80), // Replace 400 with your actual upper limit
        fill: false,
        borderColor: "black", // Green color for upper limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels7.length).fill(10), // Replace 300 with your actual lower limit
        fill: false,
        borderColor: "black", // Red color for lower limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options7 = {
    responsive: true,
    scales: {
      y: {
        min: 0, // Minimum value for y-axis
        max: 100, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Humidity",
      },
    },
  };

  const myChart7 = new Chart(ctx7, {
    type: "line",
    data: data7,
    options: options7,
  });

  function fetchData() {
      fetch("../backend/fetchdataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart7.data.labels = data.labels;
          myChart7.data.datasets[0].data = data.humidity;
          myChart7.data.datasets[1].data = data.humidityCycleStart;
          myChart7.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
