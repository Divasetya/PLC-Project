<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart11"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx11 = document.getElementById("myChart11").getContext("2d");
  const labels11 = <?php echo json_encode($serialNumbers); ?>;
  const data11 = {
    labels: labels11,
    datasets: [
      {
        label: "R Lower Gate1 Temp <Cycle Start>",
        data: <?php echo json_encode($rLowerGate1TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Gate1 Temp <Cycle Start>",
        data: <?php echo json_encode($lLowerGate1TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels11.length).fill(470), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels11.length).fill(530), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options11 = {
    responsive: true,
    scales: {
      y: {
        min: 450, // Minimum value for y-axis
        max: 550, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Lower Gate 1 <Cycle Start>",
      },
    },
  };

  const myChart11 = new Chart(ctx11, {
    type: "line",
    data: data11,
    options: options11,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart11.data.labels = data.labels;
          myChart11.data.datasets[0].data = data.rLowerGate1TempCycleStart;
          myChart11.data.datasets[1].data = data.lLowerGate1TempCycleStart;
          myChart11.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
