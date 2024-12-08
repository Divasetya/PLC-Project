<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart12"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx12 = document.getElementById("myChart12").getContext("2d");
  const labels12 = <?php echo json_encode($serialNumbers); ?>;
  const data12 = {
    labels: labels12,
    datasets: [
      {
        label: "R Lower Main1 Temp <Cycle Start>",
        data: <?php echo json_encode($rLowerMain1TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Main1 Temp <Cycle Start>",
        data: <?php echo json_encode($lLowerMain1TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels12.length).fill(420), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels12.length).fill(480), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options12 = {
    responsive: true,
    scales: {
      y: {
        min: 400, // Minimum value for y-axis
        max: 500, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Lower Main 1 <Cycle Start>",
      },
    },
  };

  const myChart12 = new Chart(ctx12, {
    type: "line",
    data: data12,
    options: options12,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart12.data.labels = data.labels;
          myChart12.data.datasets[0].data = data.rLowerGate1TempCycleStart;
          myChart12.data.datasets[1].data = data.lLowerGate1TempCycleStart;
          myChart12.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
