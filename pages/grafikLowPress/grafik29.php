<?php include "../backend/fetchDataSensor.php"; ?>
 
<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart29"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script> 
  const ctx29 = document.getElementById("myChart29").getContext("2d");
  const labels29 = <?php echo json_encode($serialNumbers); ?>;
  const data29 = {
    labels: labels29,
    datasets: [
      {
        label: "R Upper S/P Temp <Process>",
        data: <?php echo json_encode($rUpperSPTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Upper S/P Temp <Process>",
        data: <?php echo json_encode($lUpperSPTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels29.length).fill(250), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels29.length).fill(330), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options29 = {
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
        text: "Upper S/P Temp <Process>",
      },
    },
  };
 
  const myChart29 = new Chart(ctx29, {
    type: "line",
    data: data29,
    options: options29,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update  chart labels and data dynamically
          myChart29 .data.labels = data.labels;
          myChart29 .data.datasets[0].data = data.prsCTempHldCompTemp;
          myChart29.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
