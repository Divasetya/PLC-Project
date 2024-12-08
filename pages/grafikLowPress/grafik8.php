<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart8"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx8 = document.getElementById("myChart8").getContext("2d");
  const labels8 = <?php echo json_encode($serialNumbers); ?>;
  const data8 = {
    labels: labels8,
    datasets: [
      {
        label: "R Upper1 Temp <Cycle Start>",
        data: <?php echo json_encode($rUpper1TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "R Upper2 Temp <Cycle Start>",
        data: <?php echo json_encode($rUpper2TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels8.length).fill(250), // Replace 400 with your actual upper limit
        fill: false,
        borderColor: "black", // Green color for upper limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels8.length).fill(350), // Replace 300 with your actual lower limit
        fill: false,
        borderColor: "black", // Red color for lower limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options8 = {
    responsive: true,
    scales: {
      y: {
        min: 200, // Minimum value for y-axis
        max: 400, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Upper Temp",
      },
    },
  };

  const myChart8 = new Chart(ctx8, {
    type: "line",
    data: data8,
    options: options8,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart8.data.labels = data.labels;
          myChart8.data.datasets[0].data = data.rUpper1TempCycleStart;
          myChart8.data.datasets[1].data = data.rUpper2TempCycleStart;
          myChart8.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
