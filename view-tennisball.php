<h1>Tennis Balls Used</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Color</th>
        <th>Womens Pro ID</th>   
      </tr>
    </thead>
    <tbody>
      <?php

      while ($tennisballs = $tennisball->fetch_assoc()) { 
      ?>
        <tr>
          <td><?php echo $tennisballs['tennisball_id']; ?></td>
          <td><?php echo $tennisballs['tb_brand']; ?></td>
          <td><?php echo $tennisballs['tb_color']; ?></td>
          <td><?php echo $tennisballs['w_tennispro_id']; ?></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
