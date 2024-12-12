<div class="row"
  <div class="col">
<h1>Womens Tennis Pros</h1>
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
          <td><a href="tourney-by-wtennispro.php?id=<?php echo $womenstennispro['w_tennispro_id']; ?>">Tournamnets</a></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
