<div class="row">
  <div class="col">
<h1>Womens Tennis Pros <img src="https://www.creativefabrica.com/wp-content/uploads/2022/01/20/Tennis-Player-Vector-Young-And-Healthy-Graphics-23800328-1.jpg" alt="A tennis ball" style="width: 200px; height: auto; border: 0px solid black; border-radius: 10px;"></h1>
  </div>
  <div class="col-auto">
    <?php
include "view-wtennispros-newform.php"
?>
</div>
</div>
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
      <?php

      while ($womenstennispro = $womenstennispros->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $womenstennispro['w_tennispro_id']; ?></td>
          <td><?php echo $womenstennispro['w_tennispro_name']; ?></td>
          <td><?php echo $womenstennispro['country']; ?></td>
          <td><?php echo $womenstennispro['rank_number']; ?></td>
          <td><?php echo $womenstennispro['total_points']; ?></td>
          <td><?php echo $womenstennispro['tourney_name']; ?></td>
          <td><?php echo $womenstennispro['tcountry']; ?></td>
          <td><?php echo $womenstennispro['day_time']; ?></td>
        
          
          <td><a href="tourney-by-wtennispro.php?id=<?php echo $womenstennispro['w_tennispro_id']; ?>">Tournamnets</a></td>
          <td> 
          <?php
          include "view-wtennispros-editform.php"
          ?>
          </td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="wid" value="<?php echo $womenstennispro['w_tennispro_id']; ?>">
              <input type="hidden" name="actionType" value="Delete">
              <button type="submit" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" onclick="return confirm('Are you sure?');">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
              </button>
            </form>
          </td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>