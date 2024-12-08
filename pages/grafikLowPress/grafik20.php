<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart20"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx20 = document.getElementById("myChart20").getContext("2d");
  const labels20 = <?php echo json_encode($serialNumbers); ?>;
  const data20 = {
    labels: labels20,
    datasets: [
      {
        label: "HLD.C Temp <Cycle Start>",
        data: <?php echo json_encode($hldCTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels20.length).fill(680), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels20.length).fill(730), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options20 = {
    responsive: true,
    scales: {
      y: {
        min: 650, // Minimum value for y-axis
        max: 750, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "HLD.C Temp <Cycle Start>",
      },
    },
  };

  const myChart20 = new Chart(ctx20, {
    type: "line",
    data: data20,
    options: options20,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart20.data.labels = data.labels;
          myChart20.data.datasets[0].data = data.hldCTempCycleStart;
          myChart20.data.datasets[1].data = data.hldCTempHldCompTemp;
          myChart20.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
