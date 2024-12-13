<h1>Favorite Player Chart</h1>
<div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data:  {
    datasets: [{
        data: 
<?php
      while ($favoriteplayers = $favoriteplayer->fetch_assoc()) { 
         echo $favoriteplayers['num_favoriteplayer'] . ", ";
      }
      ?>
            
    }],

    labels: [
        <?php
      $favoriteplayer = selectfavoriteplayer();
      while ($favoriteplayers = $favoriteplayer->fetch_assoc()) { 
         echo "'" . $favoriteplayers['name'] . "', ";
      }
      ?>
    ]
},
    
  });
</script>        
    
       
