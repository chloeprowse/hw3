<!-- Include DataTables CSS and JavaScript -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
  <div class="col">
    <h1>Who's your favorite player? 
      <img src="https://clipartix.com/wp-content/uploads/2016/05/Tennis-ball-clip-art-free-vector-in-open-office-drawing-svg-svg.jpg" alt="A tennis ball" style="width: 100px; height: auto; border: 0px solid black; border-radius: 10px;">
    </h1>
  </div>
  <div class="col-auto">
    <?php include "view/favoriteplayer-newform.php"; ?>
  </div>
</div>

<div class="table-responsive">
  <table id="favoritePlayerTable" class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Favorite Player</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($favoriteplayers = $favoriteplayer->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $favoriteplayers['favoriteplayer_id']; ?></td>
          <td><?php echo $favoriteplayers['name']; ?></td>
          <td><?php echo $favoriteplayers['favoriteplayer']; ?></td>
          <td>
            <?php include "view/favoriteplayer-editform.php"; ?>
          </td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="fid" value="<?php echo $favoriteplayers['favoriteplayer_id']; ?>">
              <input type="hidden" name="actionType" value="Delete">
              <button type="submit" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" onclick="return confirm('Are you sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcolor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
              </button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Doughnut Chart -->
<div>
  <h2>Favorite Players Distribution</h2>
  <canvas id="favoritePlayerChart"></canvas>
</div>

<!-- Initialize DataTables -->
<script>
  $(document).ready(function() {
    $('#favoritePlayerTable').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true
    });
  });
</script>

<!-- Initialize Doughnut Chart -->
<script>
  $(document).ready(function() {
    // Prepare data for the chart
    const labels = [
      <?php
      $favoriteplayer->data_seek(0); // Reset pointer to reuse query result
      while ($row = $favoriteplayer->fetch_assoc()) {
          echo "'" . $row['favoriteplayer'] . "', ";
      }
      ?>
    ];
    const data = [
      <?php
      $favoriteplayer->data_seek(0); // Reset pointer again
      while ($row = $favoriteplayer->fetch_assoc()) {
          echo $row['num_favoriteplayer'] . ", ";
      }
      ?>
    ];

    // Create the chart
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
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          }
        }
      }
    });
  });
</script>


