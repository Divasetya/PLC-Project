<?php
  include "fetch_data.php";
?>

<div style="width: 700px; background-color: white; border-radius: 30px; padding: 1rem; margin-top: 1rem"><canvas id="myChart"></canvas></div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById("myChart").getContext("2d");
  const labels = <?php echo json_encode($serialNumbers); ?>;
  const data = {
    labels: labels,
    datasets: [
      {
        label: "Temp_Atmosp_Cy_On",
        data: <?php echo json_encode($tempAtmospCyOn); ?>,
        fill: false,
        borderColor: "rgb(100, 50, 200)",
        tension: 0.1,
      },
      {
        label: "Humidity_Cy_On",
        data: <?php echo json_encode($humidityCyOn); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
      {
        label: "R_UP_Main_Temp_Cy_On",
        data: <?php echo json_encode($rUpMainTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(500, 0, 0)",
        tension: 0.1,
      },
      {
        label: "R_UP_SP_Temp_Cy_On",
        data: <?php echo json_encode($rUpSpTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 100, 0)",
        tension: 0.1,
      },
      {
        label: "No_Use_Cy_On1",
        data: <?php echo json_encode($noUseCyOn1); ?>,
        fill: false,
        borderColor: "rgb(200, 100, 0)",
        tension: 0.1,
      },
      {
        label: "R_Low_Gat1_Temp_Cy_On",
        data: <?php echo json_encode($rLowGat1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 0, 200)",
        tension: 0.1,
      },
      {
        label: "No_Use_Cy_On2",
        data: <?php echo json_encode($noUseCyOn2); ?>,
        fill: false,
        borderColor: "rgb(150, 150, 0)",
        tension: 0.1,
      },
      {
        label: "R_Low_Main1_Temp_Cy_On",
        data: <?php echo json_encode($rLowMain1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(150, 0, 150)",
        tension: 0.1,
      },
      {
        label: "R_Low_Main2_Temp_Cy_On",
        data: <?php echo json_encode($rLowMain2TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 150, 150)",
        tension: 0.1,
      },
      {
        label: "R_YUGUCHI_Temp_Cy_On",
        data: <?php echo json_encode($rYuguchiTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(200, 0, 150)",
        tension: 0.1,
      },
      {
        label: "L_UP_Main_Temp_Cy_On",
        data: <?php echo json_encode($lUpMainTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 100, 100)",
        tension: 0.1,
      },
      {
        label: "L_UP_SP_Temp_Cy_On",
        data: <?php echo json_encode($lUpSpTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(100, 0, 100)",
        tension: 0.1,
      },
      {
        label: "No_Use_Cy_On3",
        data: <?php echo json_encode($noUseCyOn3); ?>,
        fill: false,
        borderColor: "rgb(100, 100, 0)",
        tension: 0.1,
      },
      {
        label: "L_LOW_Gate1_Temp_Cy_On",
        data: <?php echo json_encode($lLowGate1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(50, 50, 200)",
        tension: 0.1,
      },
      {
        label: "No_Use_Cy_On4",
        data: <?php echo json_encode($noUseCyOn4); ?>,
        fill: false,
        borderColor: "rgb(200, 100, 100)",
        tension: 0.1,
      },
      {
        label: "L_LOW_Main1_Temp_Cy_On",
        data: <?php echo json_encode($lLowMain1TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 150, 150)",
        tension: 0.1,
      },
      {
        label: "L_LOW_Main2_Temp_Cy_On",
        data: <?php echo json_encode($lLowMain2TempCyOn); ?>,
        fill: false,
        borderColor: "rgb(0, 200, 200)",
        tension: 0.1,
      },
      {
        label: "L_YUGUCHI_Temp_Cy_On",
        data: <?php echo json_encode($lYuguchiTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(250, 100, 0)",
        tension: 0.1,
      },
      {
        label: "PRS_C_Temp_Cy_On",
        data: <?php echo json_encode($prsCTempCyOn); ?>,
        fill: false,
        borderColor: "rgb(250, 50, 150)",
        tension: 0.1,
      },
      
    ],
  };

  const options = {
    responsive: true,
    plugins: {
      legend: {
        display: false,
        // position: "top",
      },
      title: {
        display: true,
        text: "Monitoring System Data",
      },
    },
  };

  const myChart = new Chart(ctx, {
    type: "line",
    data: data,
    options: options,
  });

  setInterval(() => {
    fetch("get_data.php")
      .then((response) => response.json())
      .then((data) => {
        myChart.data.labels = data.labels;
        myChart.data.datasets.forEach((dataset, index) => {
          dataset.data = data.datasets[index].data;
        });
        myChart.update();
      });
  }, 1000);
</script>
