<?php include "../backend/fetchDataSensor.php"; ?>
 
<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart31"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> 
  const ctx31 = document.getElementById("myChart31").getContext("2d");
  const labels31 = <?php echo json_encode($serialNumbers); ?>;
  const data31 = {
    labels: labels31,
    datasets: [
      {
        label: "Cooling Water IN <Process>",
        data: <?php echo json_encode($coolingWaterInHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "Cooling Air IN <Process>",
        data: <?php echo json_encode($coolingAirInHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels31.length).fill(25), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels31.length).fill(40), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options31 = {
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
        text: "Cooling Temp <Process>",
      },
    },
  };
 
  const myChart31 = new Chart(ctx31, {
    type: "line",
    data: data31,
    options: options31,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update  chart labels and data dynamically
          myChart31 .data.labels = data.labels;
          myChart31 .data.datasets[0].data = data.coolingWaterInHldCompTemp;
          myChart31 .data.datasets[0].data = data.coolingAirInHldCompTemp;
          myChart31.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
