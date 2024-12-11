<?php
function signup($userId, $password) {
    global $users, $g;
    
    if (isset($users[$userId])) {
        return "ユーザーIDが既に存在します。";
    }
    
    $secret = $g->createSecret();
    $users[$userId] = [
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'secret' => $secret,
    ];
    
    $config_path = dirname(__DIR__) . '/config.php';
    file_put_contents($config_path, "<?php\nreturn " . var_export(['users' => $users], true) . ";");
    return "サインアップが完了しました。ログインしてください。";
}

function login($userId, $password) {
    global $users;
    
    if (isset($users[$userId]) && password_verify($password, $users[$userId]['password'])) {
        $_SESSION['user_id'] = $userId;
        return "ログイン成功！";
    }
    return "ユーザーIDまたはパスワードが間違っています。";
}

function verifyTotp($code) {
    global $users, $g;
    $userId = $_SESSION['user_id'] ?? null;

    if (!$userId || !isset($users[$userId])) {
        return "ログインセッションが存在しません。";
    }

    $secret = $users[$userId]['secret'];
    if ($g->verifyCode($secret, $code, 2)) {
        $_SESSION['2fa_verified'] = true;
        return "TOTP認証成功！";
    }
    return "TOTP認証失敗！正しいコードを入力してください。";
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function is2FAVerified() {
    return isset($_SESSION['2fa_verified']) && $_SESSION['2fa_verified'] === true;
}

function logout() {
    session_destroy();
} 