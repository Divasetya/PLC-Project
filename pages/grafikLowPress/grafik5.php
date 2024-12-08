<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart5"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx5 = document.getElementById("myChart5").getContext("2d");
  const labels5 = <?php echo json_encode($serialNumbers); ?>;
  const data5 = {
    labels: labels5,
    datasets: [
      {
        label: "R Yuguchi Temp <Cycle Start>",
        data: <?php echo json_encode($rYuguchiTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Yuguchi Temp <Cycle Start>",
        data: <?php echo json_encode($lYuguchiTempCycleStart); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels5.length).fill(320), // Replace 500 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels5.length).fill(380), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options5 = {
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
        text: "Yuguchi (°C)",
      },
    },
  };

  const myChart5 = new Chart(ctx5, {
    type: "line",
    data: data5,
    options: options5,
  });

  function fetchData() {
      fetch("../backend/fetchdataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart5.data.labels = data.labels;
          myChart5.data.datasets[0].data = data.rYuguchiTempCycleStart;
          myChart5.data.datasets[1].data = data.lYuguchiTempCycleStart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
