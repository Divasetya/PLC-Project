<?php include "../backend/fetchDataSensor.php"; ?>
 
<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart32"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> 
  const ctx32 = document.getElementById("myChart32").getContext("2d");
  const labels32 = <?php echo json_encode($serialNumbers); ?>;
  const data32 = {
    labels: labels32,
    datasets: [
      {
        label: "R Center Pin 1",
        data: <?php echo json_encode($rCenterPin1CycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Center Pin 1",
        data: <?php echo json_encode($lCenterPin1CycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels32.length).fill(25), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels32.length).fill(40), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options32 = {
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
        text: "Center Pin 1 <Cycle Start>",
      },
    },
  };
 
  const myChart32 = new Chart(ctx32, {
    type: "line",
    data: data32,
    options: options32,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update  chart labels and data dynamically
          myChart32 .data.labels = data.labels;
          myChart32 .data.datasets[0].data = data.rCenterPin1CycleStart;
          myChart32 .data.datasets[0].data = data.lCenterPin1CycleStart;
          myChart32.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
