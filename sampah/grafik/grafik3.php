<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart3"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx3 = document.getElementById("myChart3").getContext("2d");
  const labels3 = <?php echo json_encode($serialNumbers); ?>;
  const data3 = {
    labels: labels3,
    datasets: [
      {
        label: "R_UP_Main_Temp_Cy_On",
        data: <?php echo json_encode($rUpMainTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_UP_Main_Temp_Cy_On",
        data: <?php echo json_encode($lUpMainTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels3.length).fill(250), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels3.length).fill(300), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options3 = {
    responsive: true,
    scales: {
      y: {
        min: 200, // Minimum value for y-axis
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
        text: "Upper Main Body",
      },
    },
  };

  const myChart3 = new Chart(ctx3, {
    type: "line",
    data: data3,
    options: options3,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart3.data.labels = data.labels;
        myChart3.data.datasets[0].data = data.datasets[0].data; 
        myChart3.data.datasets[1].data = data.datasets[1].data; 
        myChart3.update();
      });
  }, 1000);
</script>
