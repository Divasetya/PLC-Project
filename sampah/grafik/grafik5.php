<?php include "fetch_data.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart5"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx5 = document.getElementById("myChart5").getContext("2d");
  const labels5 = <?php echo json_encode($serialNumbers); ?>;
  const data5 = {
    labels: labels5,
    datasets: [
      {
        label: "R_Low_Gat1_Temp_Cy_On",
        data: <?php echo json_encode($rLowGat1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L_LOW_Gate1_Temp_Cy_On",
        data: <?php echo json_encode($lLowGate1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels5.length).fill(400), // Replace 500 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels5.length).fill(550), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options5 = {
    responsive: true,
    scales: {
      y: {
        min: 350, // Minimum value for y-axis
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
        text: "Gate",
      },
    },
  };

  const myChart5 = new Chart(ctx5, {
    type: "line",
    data: data5,
    options: options5,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart5.data.labels = data.labels;
        myChart5.data.datasets[0].data = data.datasets[0].data; 
        myChart5.data.datasets[1].data = data.datasets[1].data; 
        myChart5.update();
      });
  }, 1000);
</script>
