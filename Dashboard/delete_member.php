<?php
try {
    $conn = new PDO("mysql:host=localhost;dbname=hcfd_database", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['id'])) {
        $delete_member_id = $_POST['id'];

        $sql = "DELETE FROM MEMBER WHERE memberID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $delete_member_id);

        if ($stmt->execute()) {
            echo "Member with ID $delete_member_id has been deleted.";
            header("Location: ./admin-dashboard.php?action=show_member");
        } else {
            echo "Delete operation failed.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
