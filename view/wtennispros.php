<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Tennis Pros</title>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffff;
            margin: 0;
            padding: 0;
        }

        .content {
            margin: 20px;
        }

        #tennisProChart {
            max-width: 800px;
            margin: 40px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #FF69B4;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="row">
        <div class="col">
            <h1>Women's Tennis Pros
                <img src="https://www.creativefabrica.com/wp-content/uploads/2022/01/20/Tennis-Player-Vector-Young-And-Healthy-Graphics-23800328-1.jpg" 
                     alt="A tennis ball" style="width: 200px; height: auto; border: 0px solid black; border-radius: 10px;">
            </h1>
        </div>
        <div class="col-auto">
            <?php include "view/wtennispros-newform.php"; ?>
        </div>
    </div>

    <!-- Table Data -->
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Rank Number</th>   
                    <th>Total Points</th>
                    <th>Tournament Name</th>
                    <th>Tournament Country</th>
                    <th>Day/Time</th>
                    <th></th>   
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($womenstennispro = $womenstennispros->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $womenstennispro['w_tennispro_id']; ?></td>
                        <td><?php echo $womenstennispro['w_tennispro_name']; ?></td>
                        <td><?php echo $womenstennispro['country']; ?></td>
                        <td><?php echo $womenstennispro['rank_number']; ?></td>
                        <td><?php echo $womenstennispro['total_points']; ?></td>
                        <td><?php echo $womenstennispro['tourney_name']; ?></td>
                        <td><?php echo $womenstennispro['tcountry']; ?></td>
                        <td><?php echo $womenstennispro['day_time']; ?></td>
                        <td><a href="tourney-by-wtennispro.php?id=<?php echo $womenstennispro['w_tennispro_id']; ?>">Tournaments</a></td>
                        <td><?php include "view/wtennispros-editform.php"; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="wid" value="<?php echo $womenstennispro['w_tennispro_id']; ?>">
                                <input type="hidden" name="actionType" value="Delete">
                                <button type="submit" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" onclick="return confirm('Are you sure?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Highcharts Container -->
    <div id="tennisProChart"></div>
</div>

<!-- Highcharts Script -->
<script>
    
    const proNames = [
        <?php
        $womenstennispros->data_seek(0); // Reset pointer
        while ($pro = $womenstennispros->fetch_assoc()) {
            echo "'" . $pro['w_tennispro_name'] . "', ";
        }
        ?>
    ];

    const totalPoints = [
        <?php
        $womenstennispros->data_seek(0); 
        while ($pro = $womenstennispros->fetch_assoc()) {
            echo $pro['total_points'] . ", ";
        }
        ?>
    ];


    Highcharts.chart('tennisProChart', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Total Points by Tennis Pro'
        },
        xAxis: {
            categories: proNames,
            title: {
                text: 'Tennis Pros'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Points'
            }
        },
        series: [{
            name: 'Total Points',
            data: totalPoints,
            color: '#FF69B4' // Hot pink
        }],
        tooltip: {
            formatter: function () {
                return `<strong>${this.x}</strong><br>Total Points: <strong>${this.y}</strong>`;
            }
        }
    });
</script>
</body>
</html>
