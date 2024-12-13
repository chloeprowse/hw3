<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url('https://th.bing.com/th/id/R.4cb0ce32dbf9de2ec79c3ea0e8aa8847?rik=NPxHFR%2fZLQpAew&riu=http%3a%2f%2fwww.shopdoubletake.com%2fcdn%2fshop%2farticles%2fAdobeStock_118003591_16x9_5f1f9d0b-3c18-4944-ada0-1fdcf3955251.jpg%3fv%3d1691132396&ehk=TTh%2buLr7XyazlFFWBmd1afYCUh%2fBrTG1cc5BENXTFo0%3d&risl=&pid=ImgRaw&r=0');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            margin: 0;
            padding: 0;
            color: #000;
        }

        .content {
            background-color: rgba(255, 255, 255, 0.0);
            padding: 20px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 1200px;
            color: black; 
        }

        h1 {
            text-align: left; /* Aligns the title to the left */
            margin-bottom: 20px;
            padding-left: 20px; /* Optional padding for spacing */
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
    </style>
</head>
<body>
<h1>Womens Tennis Pros Tournaments</h1>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <!-- Add headers if needed -->
      </tr>
    </thead>
    <tbody>
      <?php while ($womenstennispro = $womenstennispros->fetch_assoc()) { ?>
        <div class="card-group">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title"><?php echo $womenstennispro['w_tennispro_name']; ?></h5>
              <p class="card-text">
                <ul class="list-group">
                  <?php 
                  $tourneys = selecttourneybywtennispro($womenstennispro['w_tennispro_id']);
                  while ($tourney = $tourneys->fetch_assoc()) { ?>
                    <li class="list-group-item">
                      <?php echo $tourney['rank_number'] . ' - ' . 
                                 $tourney['total_points'] . ' - ' . 
                                 $tourney['tourney_name'] . ' - ' . 
                                 $tourney['tcountry'] . ' - ' . 
                                 $tourney['day_time']; ?>
                      
                    </li>
                  <?php } ?>
                </ul>
              </p>
              <p class="card-text"><small class="text-body-secondary">Country Origin: <?php echo $womenstennispro['country']; ?></small></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </tbody>
  </table>
</div>


    