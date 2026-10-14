<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "student_db";

// Connect PHP to MySQL
$conn = new mysqli($host, $user, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

echo "Connected to student_db successfully!";

// Fetch students from the students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Student Records</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr>
            <th>ID</th>
            <th>Admission Number</th>
            <th>Full Name</th>
            <th>Course</th>
            <th>Email</th>
            <th>Created At</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["admission_no"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["course"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No student records found yet.</p>";
}

$conn->close();
?>
