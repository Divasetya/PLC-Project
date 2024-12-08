<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart25"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx25 = document.getElementById("myChart25").getContext("2d");
  const labels25 = <?php echo json_encode($serialNumbers); ?>;
  const data25 = {
    labels: labels25,
    datasets: [
      {
        label: "R Upper Main Temp <Process>",
        data: <?php echo json_encode($rUpperMainTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Upper Main Temp <Process>",
        data: <?php echo json_encode($lUpperMainTempHldCompTemp); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels25.length).fill(260), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels25.length).fill(330), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options25 = {
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
        text: "Upper Main Temp <Process>",
      },
    },
  };

  const myChart25 = new Chart(ctx25, {
    type: "line",
    data: data25,
    options: options25,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart25.data.labels = data.labels;
          myChart25.data.datasets[0].data = data.rUpperMainTempHldCompTemp;
          myChart25.data.datasets[1].data = data.lUpperMainTempHldCompTemp;
          myChart25.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
