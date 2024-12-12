<h1>Womens Tennis Pros Tournaments</h1>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Player Name</th>
        <th>Country</th>
        <th>Tournaments</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($womenstennispro = $womenstennispros->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $womenstennispro['w_tennispro_name']; ?></td>
          <td><?php echo $womenstennispro['country']; ?></td>
          <td>
            <ul class="list-group">
              <?php 
              $tourneys = selecttourneybywtennispro($womenstennispro['w_tennispro_id']);
              while ($tourney = $tourneys->fetch_assoc()) { ?>
                <li class="list-group-item">
                  <?php echo $tourney['rank_number'] . ' - ' . 
                             $tourney['total_points'] . ' - ' . 
                             $tourney['tourney_name'] . ' - ' . 
                             $tourney['country'] . ' - ' . 
                             $tourney['day_time']; ?>
                  <!-- Update Form -->
                  <form method="post" action="" style="display:inline;">
                    <input type="hidden" name="tourney_id" value="<?php echo $tourney['rank_id']; ?>">
                    <input type="hidden" name="action" value="update">
                    <input type="text" name="tourney_name" placeholder="New Tournament Name">
                    <input type="text" name="country" placeholder="New Country">
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                  </form>
                  <!-- Delete Button -->
                  <form method="post" action="" style="display:inline;">
                    <input type="hidden" name="tourney_id" value="<?php echo $tourney['rank_id']; ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                  </form>
                </li>
              <?php } ?>
            </ul>
          </td>
          <td>
            <!-- Insert Form -->
            <form method="post" action="">
              <input type="hidden" name="w_tennispro_id" value="<?php echo $womenstennispro['w_tennispro_id']; ?>">
              <input type="hidden" name="action" value="insert">
              <input type="text" name="tourney_name" placeholder="Tournament Name">
              <input type="text" name="country" placeholder="Country">
              <input type="text" name="rank_number" placeholder="Rank Number">
              <input type="text" name="total_points" placeholder="Total Points">
              <input type="text" name="day_time" placeholder="Date/Time">
              <button type="submit" class="btn btn-sm btn-primary">Add Tournament</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>


    
