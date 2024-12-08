<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart13"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx13 = document.getElementById("myChart13").getContext("2d");
  const labels13 = <?php echo json_encode($serialNumbers); ?>;
  const data13 = {
    labels: labels13,
    datasets: [
      {
        label: "R Lower Main2 Temp <Cycle Start>",
        data: <?php echo json_encode($rLowerMain2TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Main2 Temp <Cycle Start>",
        data: <?php echo json_encode($lLowerMain2TempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // {
      //   label: "R Lower Main2 Temp <Process>",
      //   data:  echo json_encode($rLowerMain2TempHldCompTemp); ?>,
      //   fill: false,
      //   borderColor: "rgb(100, 50, 200)",
      //   tension: 0.1,
      // },
      // {
      //   label: "L Lower Main2 Temp <Process>",
      //   data:  echo json_encode($lLowerMain2TempHldCompTemp); ?>,
      //   fill: false,
      //   borderColor: "rgb(75, 192, 192)",
      //   tension: 0.1,
      // },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels13.length).fill(470), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels13.length).fill(580), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options13 = {
    responsive: true,
    scales: {
      y: {
        min: 450, // Minimum value for y-axis
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
        text: "Lower Main 2 <Cycle Start>",
      },
    },
  };

  const myChart13 = new Chart(ctx13, {
    type: "line",
    data: data13,
    options: options13,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart13.data.labels = data.labels;
          myChart13.data.datasets[0].data = data.rLowerMain2TempCycleStart;
          myChart13.data.datasets[1].data = data.lLowerMain2TempCycleStart;
          myChart13.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
