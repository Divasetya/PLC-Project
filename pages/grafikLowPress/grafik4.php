<?php include "../backend/lowPressure_fetchData.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart4"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx4 = document.getElementById("myChart4").getContext("2d");
  const labels4 = <?php echo json_encode($serialNumbers); ?>;
  const data4 = {
    labels: labels4,
    datasets: [
      {
        label: "R_UP_SP_Temp_Cy_On",
        data: <?php echo json_encode($rUpSpTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_UP_SP_Temp_Cy_On",
        data: <?php echo json_encode($lUpSpTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels4.length).fill(100), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels4.length).fill(150), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options4 = {
    responsive: true,
    scales: {
      y: {
        min: 50, // Minimum value for y-axis
        max: 200, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Spark Plug",
      },
    },
  };

  const myChart4 = new Chart(ctx4, {
    type: "line",
    data: data4,
    options: options4,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart4.data.labels = data.labels;
        myChart4.data.datasets[0].data = data.datasets[0].data; 
        myChart4.data.datasets[1].data = data.datasets[1].data; 
        myChart4.update();
      });
  }, 1000);
</script>
