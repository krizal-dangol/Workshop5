<?php

function formatName($name) {
    return ucwords(trim($name));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function cleanSkills($string) {
    return array_map('trim', explode(',', $string));
}

function saveStudent($name, $email, $skillsArray) {
    $skills = implode('|', $skillsArray);
    $data = "$name,$email,$skills\n";
    file_put_contents("students.txt", $data, FILE_APPEND);
}

function uploadPortfolioFile($file) {
    $allowed = ['pdf', 'png', 'jpg', 'jpeg'];
    $maxSize = 2 * 1024 * 1024;

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        throw new Exception("Invalid file type");
    }

    if ($file['size'] > $maxSize) {
        throw new Exception("File too large");
    }

    $newName = uniqid() . "." . $ext;
    $destination = "uploads/" . $newName;

    if (!move_uploaded_file($file['tmp_name'], $destination)) {
        throw new Exception("File upload failed");
    }
}