<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart2"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx2 = document.getElementById("myChart2").getContext("2d");
  const labels2 = <?php echo json_encode($serialNumbers); ?>;
  const data2 = {
    labels: labels2,
    datasets: [
      {
        label: "R Lower Air 1 Flow",
        data: <?php echo json_encode($rLowerAir1Flow); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "L Lower Air 2 Flow",
        data: <?php echo json_encode($rLowerAir2Flow); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      // sebagai control line (garis hitam putus-putus)
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels2.length).fill(200), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black",
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels2.length).fill(300), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options2 = {
    responsive: true,
    scales: {
      y: {
        min: 0, // Minimum value for y-axis
        max: 300, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Lower Air Cooling Flow (ltr/min)",
      },
    },
  };

  const myChart2 = new Chart(ctx2, {
    type: "line",
    data: data2,
    options: options2,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart2.data.labels = data.labels;
          myChart2.data.datasets[0].data = data.rLowerAir1Flow;
          myChart2.data.datasets[1].data = data.rLowerAir2Flow;
          myChart2.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
