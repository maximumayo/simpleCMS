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
        exit("an error occurred executing statement");
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
    if (!isset($_SESSION)) {
        session_start();
    }
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

    $sql = "SELECT posts.*, u1.username AS creator, u2.username AS updater FROM posts
            INNER JOIN users u1 ON u1.id = posts.user_id
            INNER JOIN users u2 ON u2.id = posts.last_updated_by
            WHERE published = 1";

    $result = $pdo->query($sql);

    return $result;
}

function createPost($data)
{
    $pdo = DB::getConnection();

    $sql = "INSERT INTO posts (title, body, published, user_id, last_updated_by) 
            VALUES (:title, :body, :published, :user_id, :last_updated_by)";

    $statement = $pdo->prepare($sql);

    $inserted = $statement->execute([
        ":title" => $data["title"],
        ":body" => $data["body"],
        ":published" => $data["published"],
        ":user_id" => $data["user_id"],
        ":last_updated_by" => $data["last_updated_by"]
    ]);

    return $inserted;
}


function editPost($id, $data)
{
    $pdo = DB::getConnection();

    $sql = "UPDATE posts SET title = :title, body = :body, published = :published, last_updated_by = :last_updated_by
            WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $edited = $statement->execute([
        ":id" => $id,
        ":title" => $data["title"],
        ":body" => $data["body"],
        ":published" => $data["published"],
        ":last_updated_by" => $data["last_updated_by"]
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

function blocker()
{
    startSession();

    if (!isset($_SESSION["id"])) {
        header("Location: ../index.php?message=you must log in to access that page");
    }
}

function displayPageMessage()
{
    $info = "";

    if (isset($_GET["message"])) {
        if (is_array($_GET["message"])) {
            foreach ($_GET["message"] as $message) {
                $info .= "<p>{$message}</p>";
            }
        } else {
            $message = $_GET['message'];
            $info .= "<p>{$message}</p>";
        }
    }
    return $info;
}

function getUnpublishedPosts()
{
    $pdo = DB::getConnection();

    $sql = "SELECT posts.*, u1.username AS creator, u2.username AS updater FROM posts
            INNER JOIN users u1 ON u1.id = posts.user_id
            INNER JOIN users u2 ON u2.id = posts.last_updated_by
            WHERE published = 0";

    $result = $pdo->query($sql);

    return $result;
}

function publishPost($id)
{
    $pdo = DB::getConnection();

    $sql = "UPDATE posts SET published = 1 WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $edited = $statement->execute([
        ":id" => $id
    ]);

    return $edited;
}

function createUser($data)
{
    $pdo = DB::getConnection();

    $sql = "INSERT INTO users(username, password, first_name, last_name)
            VALUES(:username, :password, :first_name, :last_name)";

    $statement = $pdo->prepare($sql);

    $inserted = $statement->execute([
        ":username" => $data["username"],
        ":password" => $data["password"],
        ":first_name" => $data["first_name"],
        ":last_name" => $data["last_name"]
    ]);
    return $inserted;
}

function getUsers()
{
    $pdo = DB::getConnection();

    $sql = "SELECT id, username, first_name, last_name FROM users";

    $result = $pdo->query($sql);

    return $result;
}

function getUser($id)
{
    $pdo = DB::getConnection();

    $sql = "SELECT * FROM users WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        ":id" => $id
    ]);

    $row = $statement->fetch();

    return $row;
}

function editUser($id, $data)
{
    $pdo = DB::getConnection();

    $sql = "UPDATE users SET username = :username, first_name = :first_name, last_name = :last_name WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $edited = $statement->execute([
        ":id" => $id,
        ":username" => $data["username"],
        ":first_name" => $data["first_name"],
        ":last_name" => $data["last_name"]
    ]);

    return $edited;
}

function editUserPass($id, $data)
{
    $pdo = DB::getConnection();

    $sql = "UPDATE users SET password = :password WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $edited = $statement->execute([
        ":password" => $data["password"],
        ":id" => $id
    ]);

    return $edited;
}

function deleteUser($id)
{
    $pdo = DB::getConnection();

    $sql = "DELETE FROM users WHERE id = :id";

    $statement = $pdo->prepare($sql);

    $deleted = $statement->execute([
        ":id" => $id
    ]);
    return $deleted;
}

function doValidation($details, $toBeValidated)
{
    $errors = [];

    foreach ($toBeValidated as $input) {
        if (!isset($details[$input]) || strlen($details[$input]) === 0) {
            $errors[$input] = "$input cannot be empty";
        }
    }
    if (count($errors) !== 0) {
        return [false, $errors];
    }
    return [true, []];
}

?>