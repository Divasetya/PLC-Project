<?php include "../backend/fetchDataSensor.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart4"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx4 = document.getElementById("myChart4").getContext("2d");
  const labels4 = <?php echo json_encode($serialNumbers); ?>;
  const data4 = {
    labels: labels4,
    datasets: [
      {
        label: "Cycle Time 1",
        data: <?php echo json_encode($cycleTime1); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "Cycle Time 2",
        data: <?php echo json_encode($cycleTime2); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      {
        label: "Cycle Time 3",
        data: <?php echo json_encode($cycleTime3); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      //sebagai control line (garis hitam putus-putus)
      {
        label: "Upper Limit",
        data: Array(labels4.length).fill(310), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options4 = {
    responsive: true,
    scales: {
      y: {
        min: 0, // Minimum value for y-axis
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
        text: "Cycle Time (sec)",
      },
    },
  };

  const myChart4 = new Chart(ctx4, {
    type: "line",
    data: data4,
    options: options4,
  });

  function fetchData() {
      fetch("../backend/fetchDataSensor.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart4.data.labels = data.labels;
          myChart4.data.datasets[0].data = data.cycleTime1;
          myChart4.data.datasets[1].data = data.cycleTime2;
          myChart4.data.datasets[2].data = data.cycleTime3;
          myChart4.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
