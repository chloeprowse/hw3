<h1>Women's Tennis Ranks</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Number</th>
        <th>Points</th>
        <th></th>
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
          <td> 
          <form method="post" action="tourney-by-rank.php">
              <input type="hidden" name="rid" value="<?php echo $ranks['rank_id']; ?>">
              <button type="submit" class="btn btn-primary">Tournaments</button>
            </form>
          </td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
