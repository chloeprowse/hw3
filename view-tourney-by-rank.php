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

      while ($tourneys = $tourney->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $tourneys['rank_id']; ?></td>
          <td><?php echo $tourneys['rank_number']; ?></td>
          <td><?php echo $tourneys['total_points']; ?></td>
          <td><?php echo $tourneys['tourney_name']; ?></td>
          <td><?php echo $tourneys['country']; ?></td>
          <td><?php echo $tourneys['day_time']; ?></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
