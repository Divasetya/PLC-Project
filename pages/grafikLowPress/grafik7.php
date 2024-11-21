<?php include "../backend/lowPressure_fetchData.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart7"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx7 = document.getElementById("myChart7").getContext("2d");
  const labels7 = <?php echo json_encode($serialNumbers); ?>;
  const data7 = {
    labels: labels7,
    datasets: [
      {
        label: "PRS_C_Temp_Cy_On",
        data: <?php echo json_encode($prsCTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "HLD_C_Temp_Cy_On",
        data: <?php echo json_encode($hldCTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels7.length).fill(690), // Replace 400 with your actual upper limit
        fill: false,
        borderColor: "black", // Green color for upper limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels7.length).fill(740), // Replace 300 with your actual lower limit
        fill: false,
        borderColor: "black", // Red color for lower limit
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options7 = {
    responsive: true,
    scales: {
      y: {
        min: 650, // Minimum value for y-axis
        max: 770, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Molten Temp",
      },
    },
  };

  const myChart7 = new Chart(ctx7, {
    type: "line",
    data: data7,
    options: options7,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart7.data.labels = data.labels;
        myChart7.data.datasets[0].data = data.datasets[0].data; // Update R_UP_Main_Temp_Cy_On data
        myChart7.data.datasets[1].data = data.datasets[1].data; // Update L_UP_Main_Temp_Cy_On data
        myChart7.update();
      });
  }, 1000);
</script>
