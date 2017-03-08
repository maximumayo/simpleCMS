<?php

/**
 * Class DB - streamline connecting to the database
 */
class DB
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            $connectString = "mysql:dbname=" . DATABASE_NAME . ";host=localhost";
            self::$connection = new PDO($connectString, DATABASE_USERNAME, DATABASE_PASSWORD);
        }
        return self::$connection;
    }
}

function findUser($username)
{
    $pdo = DB::getConnection();

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

function returnPageError()
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

function getPosts()
{
    $pdo = DB::getConnection();

    $sql = "SELECT id, title, body FROM posts";

    $result = $pdo->query($sql);

    return $result;
}

function createPost($data)
{
    $pdo = DB::getConnection();

    $sql = "INSERT INTO posts (title, body, published) VALUES (:title, :body, :published)";

    $statement = $pdo->prepare($sql);

    $inserted = $statement->execute([
        ":title" => $data["title"],
        ":body" => $data["body"],
        ":published" => $data["published"]
    ]);

    return $inserted;
}


function editPost($id, $data)
{
    $pdo = DB::getConnection();

    $sql = "UPDATE posts SET title = :title, body = :body, published = :published WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $edited = $statement->execute([
        ":id" => $id,
        ":title" => $data["title"],
        ":body" => $data["body"],
        ":published" => $data["published"]
    ]);

    return $edited;
}

function getPost($id)
{
    $pdo = DB::getConnection();

    $sql = "SELECT * FROM posts WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":id" => $id
    ]);

    $row = $statement->fetch();

    return $row;
}

function deletePost($id)
{

    $pdo = DB::getConnection();

    $sql = "DELETE FROM posts WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $deleted = $statement->execute([
        ":id" => $id
    ]);

    return $deleted;
}

?>