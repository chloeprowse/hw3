<?php
$pageTitle = "Home";
include "view-header.php";
require_once("includes/model-persons.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    try {
        if ($action === 'insert_person') {
            insertPerson($_POST['person_name'], $_POST['favorite_player']);
        } elseif ($action === 'update_person') {
            updatePerson($_POST['person_id'], $_POST['person_name'], $_POST['favorite_player']);
        } elseif ($action === 'delete_person') {
            deletePerson($_POST['person_id']);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
$persons = selectAllPersons();
?>
<h1>Who doesn't love tennis?</h1>

<!-- Insert Form -->
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-header">Add a New Person</div>
        <div class="card-body">
            <form method="post" action="">
                <div class="mb-3">
                    <label for="person_name" class="form-label">Your Name</label>
                    <input type="text" id="person_name" name="person_name" class="form-control" placeholder="Enter your name" required>
                </div>
                <div class="mb-3">
                    <label for="favorite_player" class="form-label">Favorite Tennis Player</label>
                    <input type="text" id="favorite_player" name="favorite_player" class="form-control" placeholder="Enter your favorite tennis player" required>
                </div>
                <button type="submit" name="action" value="insert_person" class="btn btn-primary">Add Person</button>
            </form>
        </div>
    </div>
</div>

<!-- Display, Update, and Delete -->
<div class="container">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Your Name</th>
                    <th>Favorite Tennis Player</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($person = $persons->fetch_assoc()) { ?>
                <tr>
                    <!-- Display Person's Name -->
                    <td class="align-middle"><?php echo $person['person_name']; ?></td>

                    <!-- Display Favorite Player -->
                    <td class="align-middle"><?php echo $person['favorite_player']; ?></td>

                    <!-- Actions -->
                    <td>
                        <!-- Update Form -->
                        <form method="post" action="" class="d-inline">
                            <input type="hidden" name="person_id" value="<?php echo $person['person_id']; ?>">
                            <input type="text" name="person_name" placeholder="Update Name" class="form-control form-control-sm mb-1" required>
                            <input type="text" name="favorite_player" placeholder="Update Favorite Player" class="form-control form-control-sm mb-1" required>
                            <button type="submit" name="action" value="update_person" class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <!-- Delete Button -->
                        <form method="post" action="" class="d-inline">
                            <input type="hidden" name="person_id" value="<?php echo $person['person_id']; ?>">
                            <button type="submit" name="action" value="delete_person" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?');">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include "view-footer.php";
?>
