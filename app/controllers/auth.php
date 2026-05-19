<?php  
class auth {
    protected $user = [
        'nectar' => '123456',
        'htran' => '123456'
    ];

    public function login() {
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'];

    if(isset($this->user[$username]) && $this->user[$username] === $password) {
        $_SESSION['username'] = $username;
        if(isset($_POST['remember'])) {
            setcookie('username', $username, time() + 3600); // Lưu cookie 3600s
        }
        header('Location: /home/index');
        exit();
    } else {
        header('Location: /home/login');
        exit();
    }
  }
}
    public function logout(){
        session_unset();
        session_destroy();
        header("Location: /home/login/");
        exit();
        }
}


