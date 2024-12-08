<?php include "../backend/fetchDataSensor.php"; ?>
 
<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart30"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> 
  const ctx30 = document.getElementById("myChart30").getContext("2d");
  const labels30 = <?php echo json_encode($serialNumbers); ?>;
  const data30 = {
    labels: labels30,
    datasets: [
      {
        label: "HLD.C Temp <Process>",
        data: <?php echo json_encode($hldCTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels30.length).fill(680), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels30.length).fill(730), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options30 = {
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
        text: "HLD.C Temp <Process>",
      },
    },
  };
 
  const myChart30 = new Chart(ctx30, {
    type: "line",
    data: data30,
    options: options30,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update  chart labels and data dynamically
          myChart30 .data.labels = data.labels;
          myChart30 .data.datasets[0].data = data.prsCTempHldCompTemp;
          myChart30.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
