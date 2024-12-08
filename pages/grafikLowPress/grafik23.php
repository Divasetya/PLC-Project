<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart23"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx23 = document.getElementById("myChart23").getContext("2d");
  const labels23 = <?php echo json_encode($serialNumbers); ?>;
  const data23 = {
    labels: labels23,
    datasets: [
      {
        label: "R Lower Main1 Temp <Process>",
        data: <?php echo json_encode($rLowerMain1TempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Main1 Temp <Process>",
        data: <?php echo json_encode($lLowerGate1TempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels23.length).fill(470), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels23.length).fill(530), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options23 = {
    responsive: true,
    scales: {
      y: {
        min: 400, // Minimum value for y-axis
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
        text: "Lower Main 1 <Process>",
      },
    },
  };

  const myChart23 = new Chart(ctx23, {
    type: "line",
    data: data23,
    options: options23,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart23.data.labels = data.labels;
          myChart23.data.datasets[0].data = data.rLowerGate1TempHldCompTemp;
          myChart23.data.datasets[1].data = data.lLowerGate1TempHldCompTemp;
          myChart23.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
