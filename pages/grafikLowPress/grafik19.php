<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart19"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx19 = document.getElementById("myChart19").getContext("2d");
  const labels19 = <?php echo json_encode($serialNumbers); ?>;
  const data19 = {
    labels: labels19,
    datasets: [
      {
        label: "L Upper S/P Temp <Cycle Start>",
        data: <?php echo json_encode($lUpperSPTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels19.length).fill(250), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels19.length).fill(330), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options19 = {
    responsive: true,
    scales: {
      y: {
        min: 200, // Minimum value for y-axis
        max: 350, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Upper S/P Temp <Cycle Start>",
      },
    },
  };

  const myChart19 = new Chart(ctx19, {
    type: "line",
    data: data19,
    options: options19,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart19.data.labels = data.labels;
          myChart19.data.datasets[0].data = data.lUpperSPTempCycleStart;
          myChart19.data.datasets[1].data = data.rUpperSPTempHldCompTemp;
          myChart19.data.datasets[2].data = data.lUpperSPTempHldCompTemp;
          myChart19.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
