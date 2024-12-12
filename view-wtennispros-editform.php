<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" data-bs-toggle="modal" data-bs-target="#editWtennisprosModal<?php echo $womenstennispro['w_tennispro_id']; ?>">
 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg>
</button>

<!-- Modal -->
<div class="modal fade" id="editWtennisprosModal<?php echo $womenstennispro['w_tennispro_id']; ?>" tabindex="-1" aria-labelledby="editWtennisprosModalLabel<?php echo $womenstennispro['w_tennispro_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editWtennisprosModalLabel<?php echo $womenstennispro['w_tennispro_id']; ?>">Edit Womens Tennis Pro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="mb-3">
            <label for="name<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Name</label>
            <input type="text" class="form-control" id="name<?php echo $womenstennispro['w_tennispro_id']; ?>" name="name" value="<?php echo $womenstennispro['w_tennispro_name']; ?>">
          </div>
          <div class="mb-3">
            <label for="country<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Country</label>
            <input type="text" class="form-control" id="country<?php echo $womenstennispro['w_tennispro_id']; ?>" name="country" value="<?php echo $womenstennispro['country']; ?>">
         </div>
            <div class="mb-3">
          <label for="ranknum<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Rank Number</label>
          <input type="text" class="form-control" id="ranknum<?php echo $womenstennispro['w_tennispro_id']; ?>" name="ranknum" value="<?php echo $womenstennispro['rank_number']; ?>">
        </div>
        <div class="mb-3">
          <label for="totalpoints<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Total Points</label>
          <input type="text" class="form-control" id="totalpoints<?php echo $womenstennispro['w_tennispro_id']; ?>" name="totalpoints" value="<?php echo $womenstennispro['total_points']; ?>">
        </div>
        <div class="mb-3">
          <label for="tourneyname<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Tournament Name</label>
          <input type="text" class="form-control" id="tourneyname<?php echo $womenstennispro['w_tennispro_id']; ?>" name="tourneyname" value="<?php echo $womenstennispro['tourney_name']; ?>">
        </div>
        <div class="mb-3">
          <label for="tcountry<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Country for Tournament</label>
          <input type="text" class="form-control" id="tcountry<?php echo $womenstennispro['w_tennispro_id']; ?>" name="tcountry" value="<?php echo $womenstennispro['country']; ?>">
        </div>
       <div class="mb-3">
          <label for="daytime<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Day/Time</label>
          <input type="text" class="form-control" id="daytime<?php echo $womenstennispro['w_tennispro_id']; ?>" name="daytime" value="<?php echo $womenstennispro['day_time']; ?>">
        </div>
        <div class="mb-3">
          <label for="tid<?php echo $womenstennispro['w_tennispro_id']; ?>" class="form-label">Tournament ID</label>
          <input type="text" class="form-control" id="tid<?php echo $womenstennispro['w_tennispro_id']; ?>" name="tid" value="<?php echo $womenstennispro['tourney_id']; ?>">
        </div>
          <input type="hidden" name="wid" value="<?php echo $womenstennispro['w_tennispro_id']; ?>">
          <input type="hidden" name="actionType" value="Edit">
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
