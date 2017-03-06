<?php

function findUser($username)
{
    $connectString = "mysql:dbname=" . DATABASE_NAME . ";host=localhost";

    $pdo = new PDO($connectString, DATABASE_USERNAME, DATABASE_PASSWORD);

    $sql = "SELECT * FROM users WHERE username = :username";

    $statement = $pdo->prepare($sql);

    $executed = $statement->execute([
        ":username" => $username
    ]);

    if (!$executed) {
        print_r($statement->errorInfo());
        exit("an error occured executing statement");
    }

    $result = $statement->fetchAll();

    return $result;
}

function loginUser($user)
{
    startSession();

    $_SESSION["id"] = $user["id"];
    $_SESSION["username"] = $user["username"];

    return $_SESSION["username"] && $_SESSION["id"];
}

function startSession()
{
    if (session_status() == PHP_SESSION_NONE) ;
    session_start();
}

function validateLogin($details)
{
    $toValidate = ["username", "password"];
    $errors = [];

    foreach ($toValidate as $input) {
        if (!isset($details[$input]) || strlen(trim($details[$input])) === 0) {
            $errors[$input] = "$input cannot be empty";
        }
    }

    if (count($errors) !== 0) {
        return [false, $errors];
    }

    return [true, $errors];
}

function returnLoginError()
{
    $errorStr = "";
    if (isset($_GET["error"])) {
        if (is_array($_GET["error"])) {
            foreach ($_GET["error"] as $error) {
                $errorStr = $errorStr . "<p>($error)</p>";
            }
        } else {
            $error = $_GET["error"];
            $errorStr = "<p>($error)</p>";
        }
    }
    return $errorStr;
}