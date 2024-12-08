<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart24"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx24 = document.getElementById("myChart24").getContext("2d");
  const labels24 = <?php echo json_encode($serialNumbers); ?>;
  const data24 = {
    labels: labels24,
    datasets: [
      {
        label: "R Lower Main2 Temp <Process>",
        data: <?php echo json_encode($rLowerMain2TempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Main2 Temp <Process>",
        data: <?php echo json_encode($lLowerMain2TempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 245)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels24.length).fill(520), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels24.length).fill(580), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options24 = {
    responsive: true,
    scales: {
      y: {
        min: 500, // Minimum value for y-axis
        max: 600, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Lower Main 2 <Process>",
      },
    },
  };

  const myChart24 = new Chart(ctx24, {
    type: "line",
    data: data24,
    options: options24,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart24.data.labels = data.labels;
          myChart24.data.datasets[0].data = data.rLowerMain2TempHldCompTemp;
          myChart24.data.datasets[1].data = data.lLowerMain2TempHldCompTemp;
          myChart24.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
