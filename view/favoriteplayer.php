<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<div class="row">
  <div class="col">
    <h1>Who's your favorite player? 
      <img src="https://clipartix.com/wp-content/uploads/2016/05/Tennis-ball-clip-art-free-vector-in-open-office-drawing-svg-svg.jpg" 
           alt="A tennis ball" 
           style="width: 100px; height: auto; border: 0px solid black; border-radius: 10px;">
    </h1>
  </div>
  <div class="col-auto">
    <?php include "view/favoriteplayer-newform.php"; ?>
  </div>
</div>

<div class="table-responsive">
  <table id="favoritePlayerTable" class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Favorite Player</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($favoriteplayers = $favoriteplayer->fetch_assoc()) { ?>
        <tr>
          <td><?php echo $favoriteplayers['favoriteplayer_id']; ?></td>
          <td><?php echo $favoriteplayers['name']; ?></td>
          <td><?php echo $favoriteplayers['favoriteplayer']; ?></td>
          <td>
            <?php include "view/favoriteplayer-editform.php"; ?>
          </td>
          <td>
            <form method="post" action="">
              <input type="hidden" name="fid" value="<?php echo $favoriteplayers['favoriteplayer_id']; ?>">
              <input type="hidden" name="actionType" value="Delete">
              <button type="submit" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" onclick="return confirm('Are you sure?');">
                Delete
              </button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Initialize DataTables -->
<script>
  $(document).ready(function() {
    $('#favoritePlayerTable').DataTable({
      paging: true,
      searching: true,
      ordering: true,
      info: true,
      columnDefs: [
        { orderable: false, targets: [3, 4] } // Disable sorting on Edit and Delete columns
      ]
    });
  });
</script>

