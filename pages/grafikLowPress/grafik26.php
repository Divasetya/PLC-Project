<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart26"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx26 = document.getElementById("myChart26").getContext("2d");
  const labels26 = <?php echo json_encode($serialNumbers); ?>;
  const data26 = {
    labels: labels26,
    datasets: [
      {
        label: "R Yuguchi Temp <Process>",
        data: <?php echo json_encode($rYuguchiTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Yuguchi Temp <Process>",
        data: <?php echo json_encode($lYuguchiTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels26.length).fill(320), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels26.length).fill(380), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options26 = {
    responsive: true,
    scales: {
      y: {
        min: 300, // Minimum value for y-axis
        max: 400, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Yuguchi <Process>",
      },
    },
  };

  const myChart26 = new Chart(ctx26, {
    type: "line",
    data: data26,
    options: options26,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart26.data.labels = data.labels;
          myChart26.data.datasets[0].data = data.rYuguchiTempHldCompTemp;
          myChart26.data.datasets[1].data = data.lYuguchiTempHldCompTemp;
          myChart26.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
