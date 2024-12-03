<?php include "../backend/fetchData.php"; ?>

<div style="width: 570px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart9"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx9 = document.getElementById("myChart9").getContext("2d");
  const labels9 = <?php echo json_encode($serialNumbers); ?>;
  const data9 = {
    labels: labels9,
    datasets: [
      {
        label: "R_UP_SP_Wtr_Flow",
        data: <?php echo json_encode($rUpSpWtrFlow); ?>,
        fill: false,
        borderColor: "rgb(255, 99, 132)",
        tension: 0.1,
      },
      {
        label: "R_UP_Wtr_Flow",
        data: <?php echo json_encode($rUpWtrFlow); ?>,
        fill: false,
        borderColor: "rgb(54, 162, 235)",
        tension: 0.1,
      },
      // Lower limit line
      {
        label: "Lower Limit",
        data: Array(labels9.length).fill(20), // Replace 400 with your actual lower limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      },
      // Upper limit line
      {
        label: "Upper Limit",
        data: Array(labels9.length).fill(90), // Replace 300 with your actual upper limit
        fill: false,
        borderColor: "black", 
        borderDash: [5, 5], // Dashed line
        pointRadius: 0,
      }
    ],
  };

  const options9 = {
    responsive: true,
    scales: {
      y: {
        min: 0, // Minimum value for y-axis
        max: 120, // Maximum value for y-axis
      }
    },
    plugins: {
      legend: {
        display: true,
        position: "top",
      },
      title: {
        display: true,
        text: "Water Flow",
      },
    },
  };

  const myChart9 = new Chart(ctx9, {
    type: "line",
    data: data9,
    options: options9,
  });

  function fetchData() {
      fetch("../backend/fetchdata.php")
        .then((response) => response.json())
        .then((data) => {
          // Update chart labels and data dynamically
          myChart9.data.labels = data.labels;
          myChart9.data.datasets[0].data = data.rLowMain1TempCyOn;
          myChart9.data.datasets[1].data = data.lLowMain1TempCyOn;
          myChart9.update(); // Refresh chart
        })
        .catch((error) => console.error("Error fetching data:", error));
    }

    // Refresh data every 5 minutes
    setInterval(fetchData, 300000); // 300000 ms = 5 minutes
</script>
