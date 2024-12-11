<h1>Women's Tennis Ranks</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Number</th>
        <th>Points</th>
      </tr>
    </thead>
    <tbody>
      <?php

      while ($ranks = $rank->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $ranks['rank_id']; ?></td>
          <td><?php echo $ranks['rank_number']; ?></td>
          <td><?php echo $ranks['total_points']; ?></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
