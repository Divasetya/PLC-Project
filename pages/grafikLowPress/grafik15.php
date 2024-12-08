<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart15"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx15 = document.getElementById("myChart15").getContext("2d");
  const labels15 = <?php echo json_encode($serialNumbers); ?>;
  const data15 = {
    labels: labels15,
    datasets: [
      {
        label: "R Lower Air 1 Flow",
        data: <?php echo json_encode($rLowerAir1Flow); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Air 1 Flow",
        data: <?php echo json_encode($lLowerAir1Flow); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels15.length).fill(10), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels15.length).fill(20), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options15 = {
    responsive: true,
    scales: {
      y: {
        min: 0, // Minimum value for y-axis
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
        text: "Air 1 Flow",
      },
    },
  };

  const myChart15 = new Chart(ctx15, {
    type: "line",
    data: data15,
    options: options15,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart15.data.labels = data.labels;
          myChart15.data.datasets[0].data = data.rLowerAir1Flow;
          myChart15.data.datasets[1].data = data.lLowerAir1Flow;
          myChart15.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
