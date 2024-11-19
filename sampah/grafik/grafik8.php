<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart8"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx8 = document.getElementById("myChart8").getContext("2d");
  const labels8 = <?php echo json_encode($serialNumbers); ?>;
  const data8 = {
    labels: labels8,
    datasets: [
      {
        label: "Cool_Wtr_IN_Cy_On",
        data: <?php echo json_encode($coolWtrInCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "Cool_Air_IN_Cy_On",
        data: <?php echo json_encode($coolAirInCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels8.length).fill(20), // Replace 400 with your actual upper limit
        fill: false,
        borderColor: "black", // Green color for upper limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels8.length).fill(40), // Replace 300 with your actual lower limit
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
        text: "Cooling IN",
      },
    },
  };

  const myChart8 = new Chart(ctx8, {
    type: "line",
    data: data8,
    options: options8,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart8.data.labels = data.labels;
        myChart8.data.datasets[0].data = data.datasets[0].data; // Update R_UP_Main_Temp_Cy_On data
        myChart8.data.datasets[1].data = data.datasets[1].data; // Update L_UP_Main_Temp_Cy_On data
        myChart8.update();
      });
  }, 1000);
</script>
