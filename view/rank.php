<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Tennis Ranks</title>
    <style>
        body {
            background-image: url('https://www.cityam.com/wp-content/uploads/2021/07/Previews-The-Championships---Wimbledon-2021-1325744741.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            margin: 0;
            padding: 0;
            color: #000;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 1200px;
            color: black; 
        }

        h1 {
            text-align: left;
            margin-bottom: 20px;
        }

        table {
            background-color: #fff;
            color: #000;
            border-radius: 8px;
            overflow: hidden;
        }

        .btn-primary {
            background-color: #FF69B4;
            border-color: #FF69B4;
        }

        .btn-primary:hover {
            background-color: #FF1493;
            border-color: #FF1493;
        }

        #rankChart {
            margin-top: 30px;
            max-width: 800px;
            height: 400px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="row">
        <div class="col">  
            <h1>Women's Tennis Ranks</h1>
        </div>
        <div class="col-auto">
            <?php include "view/rank-newform.php"; ?>
        </div>
    </div>
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Number</th>
                    <th>Points</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Tournaments</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($ranks = $rank->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $ranks['rank_id']; ?></td>                   
                        <td><?php echo $ranks['rank_number']; ?></td>
                        <td><?php echo $ranks['total_points']; ?></td>
                        <td><?php include "view/rank-editform.php"; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="rid" value="<?php echo $ranks['rank_id']; ?>">
                                <input type="hidden" name="actionType" value="Delete">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">Delete</button>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="tourney-by-rank.php">
                                <input type="hidden" name="rid" value="<?php echo $ranks['rank_id']; ?>">
                                <button type="submit" class="btn btn-primary">Tournaments</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Chart Container -->
    <canvas id="rankChart"></canvas>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Prepare the data for the chart
  const rankNumbers = [
    <?php
    $rank->data_seek(0); // Reset pointer to loop again
    while ($r = $rank->fetch_assoc()) {
        echo $r['rank_number'] . ", ";
    }
    ?>
  ];

  const totalPoints = [
    <?php
    $rank->data_seek(0); // Reset pointer
    while ($r = $rank->fetch_assoc()) {
        echo $r['total_points'] . ", ";
    }
    ?>
  ];

  const ctx = document.getElementById('rankChart').getContext('2d');
  const rankChart = new Chart(ctx, {
    type: 'bar', // You can change this to 'line', 'pie', etc.
    data: {
      labels: rankNumbers,
      datasets: [{
        label: 'Total Points',
        data: totalPoints,
        backgroundColor: 'rgba(255, 105, 180, 0.5)', // Light pink
        borderColor: 'rgba(255, 105, 180, 1)', // Dark pink
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        x: {
          title: {
            display: true,
            text: 'Rank Numbers'
          }
        },
        y: {
          beginAtZero: true,
          title: {
            display: true,
            text: 'Total Points'
          }
        }
      },
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'top'
        }
      }
    }
  });
</script>
</body>
</html>
