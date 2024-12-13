  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" style="background-color: #FF69B4; border-color: #FF69B4;" data-bs-toggle="modal" data-bs-target="#newTennisballModal">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
    </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="newTennisballModal" tabindex="-1" aria-labelledby="newTennisballModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="newTennisballModalLabel">New Tennis Ball</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form method="post" action="">
  <div class="mb-3">
    <label for="tbbrand" class="form-label">Tennis Ball Brand</label>
    <?php
$tbbrandList = selecttennisballForInput();
$selectedtbbrand = 0;
include "view-tbbrand-input-list.php";
?>
  </div>
  <div class="mb-3">
    <label for="tbcolor" class="form-label">Tennis Ball Color</label>
    <input type="text" class="form-control" id="tbcolor" name="tbcolor">
  </div>
  <div class="mb-3">
    <label for="wid" class="form-label">Womens Pro ID</label>
    <input type="text" class="form-control" id="wid" name="wid">
  </div>
  <input type="hidden" name="actionType" value="Add">
  <button type="submit" class="btn btn-primary">Save</button>
</form>
      </div>
    </div>
  </div>
</div>
