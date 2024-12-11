<h1>Womens Tennis Pros Tournamnets</h1>
  
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
       <div class="card-group">
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title"><?php echo $womenstennispro['w_tennispro_name']; ?></h5>
      <p class="card-text">
        <?php 
        $tourneys = selectwtennisprosbytourney($womenstennispro['w_tennispro_id']);
        while ($tourney = $tourneys->fetch_assoc()) {
        ?>
        
        <?php
        }
        ?>
      </p>
      <p class="card-text"><small class="text-body-secondary">Country Origin: <?php echo $womenstennispro['country']; ?></small></p>
    </div>
  </div>
       
  <?php
  } 
  ?>
  </div>
    
