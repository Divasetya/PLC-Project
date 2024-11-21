<?php include "../backend/lowPressure_fetchData.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart2"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx2 = document.getElementById("myChart2").getContext("2d");
  const labels2 = <?php echo json_encode($serialNumbers); ?>;
  const data2 = {
    labels: labels2,
    datasets: [
      {
        label: "R_Low_Main2_Temp_Cy_On",
        data: <?php echo json_encode($rLowMain2TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_Low_Main2_Temp_Cy_On",
        data: <?php echo json_encode($lLowMain2TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels2.length).fill(430), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels2.length).fill(560), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options2 = {
    responsive: true,
    scales: {
      y: {
        min: 400, // Minimum value for y-axis
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
        text: "Lower Main Body #2",
      },
    },
  };

  const myChart2 = new Chart(ctx2, {
    type: "line",
    data: data2,
    options: options2,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart2.data.labels = data.labels;
        myChart2.data.datasets[0].data = data.datasets[0].data; 
        myChart2.data.datasets[1].data = data.datasets[1].data; 
        myChart2.update();
      });
  }, 1000);
</script>
