<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.html");
  exit();
}

$conn = new mysqli("localhost", "root", "", "kv_lokra");
$username = $_SESSION['username'];

$sql = "SELECT * FROM records WHERE username='$username'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Academic Records</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #e0f7fa, #ffffff);
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #00796b;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #00796b;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .logout {
      display: block;
      text-align: center;
      margin-top: 20px;
    }

    .logout a {
      text-decoration: none;
      color: #00796b;
      font-weight: bold;
    }

    .logout a:hover {
      color: #004d40;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Academic Records for <?php echo htmlspecialchars($username); ?></h2>
    <table>
      <tr>
        <th>Subject</th>
        <th>Marks</th>
        <th>Grade</th>
      </tr>
      <?php
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".htmlspecialchars($row['subject'])."</td>
                <td>".$row['marks']."</td>
                <td>".htmlspecialchars($row['grade'])."</td>
              </tr>";
      }
      ?>
    </table>
    <div class="logout">
      <a href="logout.php">Logout</a>
    </div>
  </div>
</body>
</html>