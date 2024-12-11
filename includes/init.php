<?php
// 現在のスクリプトからの相対パスを絶対パスに変換
$base_path = dirname(__DIR__);

require $base_path . '/vendor/autoload.php';
require $base_path . '/config.php';

session_start();

$config = include($base_path . '/config.php');
$users = $config['users'] ?? [];
$g = new PHPGangsta_GoogleAuthenticator(); 