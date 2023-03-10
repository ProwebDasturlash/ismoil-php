<?
function pdo(){
    $dbname = 'php1930';
    $dbuser = 'root';
    $dbpass = '';
    $dbhost = 'localhost';
    return new PDO("mysql:host=$dbhost; dbname=$dbname", $dbuser, $dbpass );
}
function userReg($login, $name, $pass, $photo){
    $pdo = pdo();
    session_start();
    if ($name != '') {
        $query = "INSERT INTO users(login, name, pass, photo) VALUES (?,?,?,?)";
        $deliver = $pdo->prepare($query);
        $result = $deliver->execute([$login, $name, $pass, $photo]);
            $_SESSION['login'] = $login;
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass;
            $_SESSION['photo'] = $photo;
     
        return $deliver->errorInfo()[0];
    }
}
function userAuth($login,$pass){
    $pdo = pdo();
    session_start();
    $query = "SELECT login, name, pass, photo FROM users WHERE login=?";
    $deliver = $pdo->prepare($query);
    $result = $deliver->execute([$login]);
    $user = $deliver->fetch(PDO::FETCH_ASSOC);
    if ($user['login'] == $login && password_verify($pass, $user['pass'])) {
        $_SESSION['login'] = $user['login'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['pass'] = $user['pass'];
        $_SESSION['photo'] = $user['photo'];
    }
    return $user;
}
function addComment($login, $name, $text, $photo, $time){
    $pdo = pdo();
    $query = "INSERT INTO comments (login, name, comment, photo, time) VALUES (?,?,?,?,?)";
    $deliver = $pdo->prepare($query);
    $result = $deliver->execute([$login, $name, $text, $photo, $time]);
    return $result;
}

?>