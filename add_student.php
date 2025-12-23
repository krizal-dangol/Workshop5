<?php 
include 'header.php'; 
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = formatName($_POST['name']);
        $email = $_POST['email'];
        $skills = cleanSkills($_POST['skills']);

        if (empty($name) || empty($email)) {
            throw new Exception("All fields are required");
        }

        if (!validateEmail($email)) {
            throw new Exception("Invalid email format");
        }

        saveStudent($name, $email, $skills);
        echo "<p>Student added successfully!</p>";

    } catch (Exception $e) {
        echo "<p style='color:red'>" . $e->getMessage() . "</p>";
    }
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Enter your name">
    <input type="email" name="email" placeholder="Enter your email">
    <input type="text" name="skills" placeholder="Add comma separated skills">
    <button type="submit">Add Student</button>
</form>

<?php include 'footer.php'; ?>