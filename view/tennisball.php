<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tennis Balls Used</title>
    <style>
        body {
            background-image: url('https://images2.minutemediacdn.com/image/upload/images/voltaxMediaLibrary/mmsport/mentalfloss/01g8eb89gkdfskwka63y');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            margin: 0;
            padding: 0;
            color: #fff;
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
    <div class="content">
        <div class="row">
            <div class="col">
                <h1>Tennis Balls Used</h1>
            </div>
            <div class="col-auto">
                <?php include "view-tennisball-newform.php"; ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Brand</th>
                        <th>Color</th>
                        <th>Womens Pro ID</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($tennisballs = $tennisball->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $tennisballs['tennisball_id']; ?></td>
                            <td><?php echo $tennisballs['tb_brand']; ?></td>
                            <td><?php echo $tennisballs['tb_color']; ?></td>
                            <td><?php echo $tennisballs['w_tennispro_id']; ?></td>
                            <td>
                                <?php include "view-tennisball-editform.php"; ?>
                            </td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="tid" value="<?php echo $tennisballs['tennisball_id']; ?>">
                                    <input type="hidden" name="actionType" value="Delete">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?');">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
    </div>
</body>
</html>

