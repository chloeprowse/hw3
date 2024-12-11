<h1>Rank by Tournament</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Number</th>
        <th>Points</th>
        <th>Tournamnet Name</th>
        <th>Country</th>
        <th>Day/Time</th> 
      </tr>
    </thead>
    <tbody>
      <?php

      while ($tourney = $tourney->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $tourney['rank_id']; ?></td>
          <td><?php echo $tourney['rank_number']; ?></td>
          <td><?php echo $tourney['total_points']; ?></td>
          <td><?php echo $tourney['tourney_name']; ?></td>
          <td><?php echo $tourney['country']; ?></td>
          <td><?php echo $tourney['day_time']; ?></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
