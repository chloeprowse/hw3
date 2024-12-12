
function insertPerson($personName, $favoritePlayer) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("INSERT INTO persons (person_name, favorite_player) VALUES (?, ?)");
    $stmt->bind_param("ss", $personName, $favoritePlayer);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function updatePerson($personId, $personName, $favoritePlayer) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("UPDATE persons SET person_name = ?, favorite_player = ? WHERE person_id = ?");
    $stmt->bind_param("ssi", $personName, $favoritePlayer, $personId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deletePerson($personId) {
    $conn = get_db_connection();
    $stmt = $conn->prepare("DELETE FROM persons WHERE person_id = ?");
    $stmt->bind_param("i", $personId);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function selectAllPersons() {
    $conn = get_db_connection();
    $stmt = $conn->prepare("SELECT person_id, person_name, favorite_player FROM persons");
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}
