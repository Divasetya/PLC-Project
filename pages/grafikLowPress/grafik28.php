<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart28"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx28 = document.getElementById("myChart28").getContext("2d");
  const labels28 = <?php echo json_encode($serialNumbers); ?>;
  const data28 = {
    labels: labels28,
    datasets: [
      {
        label: "PRS C Temp <Process>",
        data: <?php echo json_encode($prsCTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels28.length).fill(650), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels28.length).fill(730), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options28 = {
    responsive: true,
    scales: {
      y: {
        min: 600, // Minimum value for y-axis
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
        text: "PRS.C Temp <Process>",
      },
    },
  };

  const myChart28 = new Chart(ctx28, {
    type: "line",
    data: data28,
    options: options28,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart28.data.labels = data.labels;
          myChart28.data.datasets[0].data = data.prsCTempHldCompTemp;
          myChart28.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
