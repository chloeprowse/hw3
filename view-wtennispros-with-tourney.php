<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Womens Tennis Pros Tournamnets</title> 
    <style>
        body {
            background-image: url(https://images.squarespace-cdn.com/content/v1/56200fcee4b02025054662d7/1462218374871-WK15KGQ07AYFJJ0AKADK/the-welcome-blog-US-Open');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            margin: 0;
            padding: 0;
            color: #fff;
        }

         .content {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 1200px;
            color: black; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
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


    
