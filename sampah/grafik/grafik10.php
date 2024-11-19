<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart10"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx10 = document.getElementById("myChart10").getContext("2d");
  const labels10 = <?php echo json_encode($serialNumbers); ?>;
  const data10 = {
    labels: labels10,
    datasets: [
      {
        label: "R_Low_air_1_Flow",
        data: <?php echo json_encode($rLowAir1Flow); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_Low_air_1_Flow",
        data: <?php echo json_encode($lLowAir1Flow); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels10.length).fill(340), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels10.length).fill(380), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options10 = {
    responsive: true,
    scales: {
      y: {
        min: 300, // Minimum value for y-axis
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
        text: "Air Flow",
      },
    },
  };

  const myChart10 = new Chart(ctx10, {
    type: "line",
    data: data10,
    options: options10,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart10.data.labels = data.labels;
        myChart10.data.datasets[0].data = data.datasets[0].data; // Update R_UP_Main_Temp_Cy_On data
        myChart10.data.datasets[1].data = data.datasets[1].data; // Update L_UP_Main_Temp_Cy_On data
        myChart10.update();
      });
  }, 1000);
</script>
