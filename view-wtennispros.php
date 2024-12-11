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
while ($womenstennispro = $womenstennispros ->fetch_assoc()
?>
  <tr>
    <td><?php echo $womenstennispro['w_tennispro_id']; ?></td>
    <td><?php echo $womenstennispro['w_tennispro_name']; ?></td>
    <td><?php echo $womenstennispro['country']; ?></td>
  </tr>
<?php 
   </tbody>
  </table>
</div>
