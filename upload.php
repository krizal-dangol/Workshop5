<?php include 'header.php'; ?>
<?php include 'functions.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['uploadbtn'])) {
    try {
        uploadPortfolioFile($_FILES['portfoliofile']);
        echo "<h3>File upload successful!</h3>";
        echo "<p>Allowed: PDF, JPG, PNG | Max size: 2MB</p>";
    } catch (Exception $e) {
        echo "<p style='color:red'>" . $e->getMessage() . "</p>";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="portfoliofile" accept=".pdf,.jpg,.png">
    <button type="submit" name="uploadbtn">Upload File</button>
</form>

<p>Allowed: PDF, JPG, PNG | Max size: 2MB</p>

<?php include 'footer.php'; ?>