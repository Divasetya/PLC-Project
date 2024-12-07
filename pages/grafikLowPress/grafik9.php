<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart9"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx9 = document.getElementById("myChart9").getContext("2d");
  const labels9 = <?php echo json_encode($serialNumbers); ?>;
  const data9 = {
    labels: labels9,
    datasets: [
      {
        label: "R Upper S/P Water Flow",
        data: <?php echo json_encode($rUpperSPWaterFlow); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Upper S/P Water Flow",
        data: <?php echo json_encode($lUpperSPWaterFlow); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels9.length).fill(10), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels9.length).fill(80), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options9 = {
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
        text: "Upper S/P Water Flow",
      },
    },
  };

  const myChart9 = new Chart(ctx9, {
    type: "line",
    data: data9,
    options: options9,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart9.data.labels = data.labels;
          myChart9.data.datasets[0].data = data.rUpperSPWaterFlow;
          myChart9.data.datasets[1].data = data.lUpperSPWaterFlow;
          myChart9.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
