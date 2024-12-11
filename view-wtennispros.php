<h1>womenstennispros</h1>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Country</th>
      </tr>
    </thead>
    <tbody>
      <?php

      while ($w_tennispro = $w_tennispro->fetch_assoc()) { // Fix missing closing parenthesis
      ?>
        <tr>
          <td><?php echo $w_tennispro['w_tennispro_id']; ?></td>
          <td><?php echo $w_tennispro['w_tennispro_name']; ?></td>
          <td><?php echo $w_tennispro['country']; ?></td>
        </tr>
      <?php
      } 
      ?>
    </tbody>
  </table>
</div>
