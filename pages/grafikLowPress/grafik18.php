<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart18"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx18 = document.getElementById("myChart18").getContext("2d");
  const labels18 = <?php echo json_encode($serialNumbers); ?>;
  const data18 = {
    labels: labels18,
    datasets: [
      {
        label: "PRS C Temp <Cycle Start>",
        data: <?php echo json_encode($prsCTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels18.length).fill(650), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels18.length).fill(730), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options18 = {
    responsive: true,
    scales: {
      y: {
        min: 600, // Minimum value for y-axis
        max: 750, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "PRS.C Temp <Cycle Start>",
      },
    },
  };

  const myChart18 = new Chart(ctx18, {
    type: "line",
    data: data18,
    options: options18,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart18.data.labels = data.labels;
          myChart18.data.datasets[0].data = data.prsCTempCycleStart;
          myChart18.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
