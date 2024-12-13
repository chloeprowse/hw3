<?php
require_once("util-db.php");
require_once("model/favoriteplayer.php");

$pageTitle = "Add your favorite tennis player!";
include "view/header.php";

if (isset($_POST['actionType'])) {
  switch ($_POST['actionType']) { 
    case "Add":
      if (insertfavoriteplayer($_POST['name'], $_POST['player'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player added.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Edit":
      if (updatefavoriteplayer($_POST['name'], $_POST['player'], $_POST['fid'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player edited.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
    case "Delete":
      if (deletefavoriteplayer($_POST['fid'])) {
        echo '<div class="alert alert-success" role="alert">Favorite Player deleted.</div>';
      } else {
        echo '<div class="alert alert-danger" role="alert">Error.</div>';
      }
      break;
  }
}

// Fetch data for table and chart
$favoriteplayer = selectfavoriteplayer();
$favoriteplayerChart = selectfavoriteplayerChart();

include "view/favoriteplayer.php";
?>

<!-- Add a section for the chart -->
<div>
  <h1>Favorite Player Distribution</h1>
  <style>
    #favoritePlayerChart {
      width: 400px;  /* Set fixed width */
      height: 300px; /* Set fixed height */
      margin: auto;  /* Center the chart */
      display: block; /* Ensures proper centering */
    }
  </style>
  <canvas id="favoritePlayerChart" width="400" height="300"></canvas>
</div>

<?php include "view/footer.php"; ?>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Prepare data for the chart
  const labels = [
    <?php
    while ($row = $favoriteplayerChart->fetch_assoc()) {
        echo "'" . $row['name'] . "', ";
    }
    ?>
  ];

  const data = [
    <?php
    $favoriteplayerChart->data_seek(0); // Reset pointer
    while ($row = $favoriteplayerChart->fetch_assoc()) {
        echo $row['num_favoriteplayer'] . ", ";
    }
    ?>
  ];

  // Initialize the chart
  const ctx = document.getElementById('favoritePlayerChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: labels,
      datasets: [{
        label: 'Favorite Players',
        data: data,
        backgroundColor: [
          '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
        ],
        hoverOffset: 4
      }]
    },
    options: {
      responsive: false, // Disable responsiveness
      maintainAspectRatio: false, // Allow custom aspect ratio
      plugins: {
        legend: {
          position: 'top',
        }
      }
    }
  });
</script>



