<?php include "../backend/lowPressure_fetchData.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart11"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx11 = document.getElementById("myChart11").getContext("2d");
  const labels11 = <?php echo json_encode($serialNumbers); ?>;
  const data11 = {
    labels: labels11,
    datasets: [
      {
        label: "Cycle_Time1",
        data: <?php echo json_encode($cycleTime1); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels11.length).fill(250), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels11.length).fill(300), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options11 = {
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
        text: "Water Flow",
      },
    },
  };

  const myChart11 = new Chart(ctx11, {
    type: "line",
    data: data11,
    options: options11,
  });

  setInterval(() => {
    fetch("fetch_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart11.data.labels = data.labels;
        myChart11.data.datasets[0].data = data.datasets[0].data; 
        myChart11.data.datasets[1].data = data.datasets[1].data; 
        myChart11.update();
      });
  }, 1000);
</script>
