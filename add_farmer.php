<?php include 'db.php'; ?>
<form method="post">
  <input name="name" placeholder="Farmer Name" required><br>
  <input name="land" placeholder="Land Area (acres)" required><br>
  <input name="village" placeholder="Village" required><br>
  <input name="aadhaar" placeholder="Aadhaar" required><br>
  <button type="submit">Add Farmer</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO farmers (name, land_area, village, aadhaar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $_POST['name'], $_POST['land'], $_POST['village'], $_POST['aadhaar']);
    $stmt->execute();
    echo "Farmer added successfully!";
}
?>
