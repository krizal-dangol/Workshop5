<?php include 'header.php'; ?>

<h2>Student List</h2>

<?php
if (!file_exists("students.txt")) {
    echo "<p>No students found.</p>";
} else {
    $students = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($students as $student) {
        $parts = explode(',', trim($student));

        if (count($parts) >= 3) {
            $name   = $parts[0];
            $email  = $parts[1];
            $skills = $parts[2];

            $skillsArray = explode('|', $skills);

            echo "<p>";
            echo "<strong>Name:</strong> " . htmlspecialchars($name) . "<br>";
            echo "<strong>Email:</strong> " . htmlspecialchars($email) . "<br>";
            echo "<strong>Skills:</strong> " . htmlspecialchars(implode(', ', $skillsArray));
            echo "</p><hr>";
        }
    }
}
?>

<?php include 'footer.php'; ?>
