<?php
include 'db_connect.php'; // Ensure this connects to your database

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $delete = $conn->query("DELETE FROM alumnus_bio WHERE id = $id");
    if($delete) {
        echo json_encode(['success' => true, 'message' => 'Alumni record deleted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete alumni record.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No ID provided.']);
}
?>
