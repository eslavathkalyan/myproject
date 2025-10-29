<?php include 'db.php'; ?>
<form method="post">
  <select name="farmer_id">
    <?php
    $res = $conn->query("SELECT id, name FROM farmers");
    while ($row = $res->fetch_assoc()) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
    }
    ?>
  </select><br>
  <input name="scheme_name" placeholder="Scheme Name" required><br>
  <input name="year" placeholder="Year" required><br>
  <input name="amount" placeholder="Amount" required><br>
  <button type="submit">Add Scheme</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO schemes (farmer_id, scheme_name, year, amount) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isid", $_POST['farmer_id'], $_POST['scheme_name'], $_POST['year'], $_POST['amount']);
    $stmt->execute();
    echo "Scheme added!";
}
?>
