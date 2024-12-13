<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fetch data once
$favoriteplayerData = [];
$favoriteplayer = selectfavoriteplayer();
while ($row = $favoriteplayer->fetch_assoc()) {
    $favoriteplayerData[] = $row;
}
?>

<h1>Favorite Player Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo implode(", ", array_map(fn($row) => $row['num_favoriteplayer'], $favoriteplayerData)); ?>
        ]
      }],
      labels: [
        <?php echo implode(", ", array_map(fn($row) => "'" . $row['name'] . "'", $favoriteplayerData)); ?>
      ]
    },
  });
</script>
   
    
       
