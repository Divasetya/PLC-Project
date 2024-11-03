<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById("myChart").getContext("2d");
  const labels = <?php echo json_encode($serialNumbers); ?>;
  const data = {
    labels: labels,
    datasets: [
      {
        label: "R_Low_Main1_Temp_Cy_On",
        data: <?php echo json_encode($rLowMain1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(100, 50, 200)",
        tension: 0.1,
      },
      {
        label: "L_LOW_Main1_Temp_Cy_On",
        data: <?php echo json_encode($lLowMain1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels.length).fill(460), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels.length).fill(560), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options = {
    responsive: true,
    scales: {
      y: {
        min: 450, // Minimum value for y-axis
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
        text: "Lower Main Body #1",
      },
    },
  };

  const myChart = new Chart(ctx, {
    type: "line",
    data: data,
    options: options,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart.data.labels = data.labels;
        myChart.data.datasets[0].data = data.datasets[0].data; 
        myChart.data.datasets[1].data = data.datasets[1].data; 
        myChart.update();
      });
  }, 1000);
</script>
