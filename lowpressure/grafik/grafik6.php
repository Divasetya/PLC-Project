<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart6"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx6 = document.getElementById("myChart6").getContext("2d");
  const labels6 = <?php echo json_encode($serialNumbers); ?>;
  const data6 = {
    labels: labels6,
    datasets: [
      {
        label: "R_YUGUCHI_Temp_Cy_On",
        data: <?php echo json_encode($rYuguchiTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_YUGUCHI_Temp_Cy_On",
        data: <?php echo json_encode($lYuguchiTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels6.length).fill(250), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels6.length).fill(300), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options6 = {
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
        text: "Yuguchi",
      },
    },
  };

  const myChart6 = new Chart(ctx6, {
    type: "line",
    data: data6,
    options: options6,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart6.data.labels = data.labels;
        myChart6.data.datasets[0].data = data.datasets[0].data; 
        myChart6.data.datasets[1].data = data.datasets[1].data; 
        myChart6.update();
      });
  }, 1000);
</script>
