<?php

include("DbConnect.php");



if (isset($_POST['product_id'])) {

    $product_id = $_POST['product_id'];

    $query = "SELECT id, name FROM category WHERE product_id = ?";

    $stmt = $conn->prepare($query);

    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        echo '<option value="">Select Category</option>';

        while ($row = $result->fetch_assoc()) {

            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }
    } else {

        echo '<option value="">Category not available</option>';
    }

    $stmt->close();
}
