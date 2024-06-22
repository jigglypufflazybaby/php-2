<?php
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "P17";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display records where the student is absent
function displayAbsentRecords($conn) {
    $sql = "SELECT * FROM Student_Mentor WHERE issuesDiscussed = 'Absent'";
    $result = $conn->query($sql);

    echo "<div class='container'>";
    echo "<h1>Student Mentor Meetings</h1>";

    echo "<h2>Absent Students:</h2>";
    if ($result->num_rows > 0) {
        echo "<table class='records-table'>
                <tr>
                    <th>Roll No</th>
                    <th>Class</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Mentor Name</th>
                    <th>Issues Discussed</th>
                    <th>Meeting Date</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['studRollNo']}</td>
                    <td>{$row['studClass']}</td>
                    <td>{$row['studName']}</td>
                    <td>{$row['studContact']}</td>
                    <td>{$row['MentorName']}</td>
                    <td>{$row['issuesDiscussed']}</td>
                    <td>{$row['meetingDate']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No absent students.</p>";
    }
    echo "</div>";
}

// Display absent records
displayAbsentRecords($conn);

// Close connection
$conn->close();
?>
