$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    // biến chứa kết nối csdl là biến $pdo
    $pdo = new PDO($dsn, $user, $password);

    if ($pdo) {
        //echo "kết nối thành công !";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}