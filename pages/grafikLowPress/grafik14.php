<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart14"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx14 = document.getElementById("myChart14").getContext("2d");
  const labels14 = <?php echo json_encode($serialNumbers); ?>;
  const data14 = {
    labels: labels14,
    datasets: [
      {
        label: "L Upper Main Temp <Cycle Start>",
        data: <?php echo json_encode($lUpperMainTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels14.length).fill(260), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels14.length).fill(330), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options14 = {
    responsive: true,
    scales: {
      y: {
        min: 250, // Minimum value for y-axis
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
        text: "Upper Main Temp <Cycle Start>",
      },
    },
  };

  const myChart14 = new Chart(ctx14, {
    type: "line",
    data: data14,
    options: options14,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart14.data.labels = data.labels;
          myChart14.data.datasets[0].data = data.lUpperMainTempCycleStart;
          myChart14.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
