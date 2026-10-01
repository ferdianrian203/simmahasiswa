<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once __DIR__ . '/csrf.php';

function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
function redirect_to(string $url): never {
    header('Location: ' . $url); exit;
}
function flash(string $type, string $message): void {
    $_SESSION[$type] = $message;
}
function flash_html(): void {
    foreach (['success'=>'alert-success','error'=>'alert-danger'] as $key=>$class) {
        if (!empty($_SESSION[$key])) {
            echo '<div class="alert '. $class .' flash-auto">'. e($_SESSION[$key]) .'</div>';
            unset($_SESSION[$key]);
        }
    }
}
function audit_log(mysqli $db, ?int $userId, string $table, ?string $recordId, string $aksi, ?array $old=null, ?array $new=null): void {
    $stmt=mysqli_prepare($db,"INSERT INTO audit_log (id_pengguna,tabel_nama,record_id,aksi,data_lama,data_baru,ip_address,user_agent) VALUES (?,?,?,?,?,?,?,?)");
    if(!$stmt) return;
    $oldJson=$old?json_encode($old,JSON_UNESCAPED_UNICODE):null;
    $newJson=$new?json_encode($new,JSON_UNESCAPED_UNICODE):null;
    $ip=$_SERVER['REMOTE_ADDR']??null; $ua=$_SERVER['HTTP_USER_AGENT']??null;
    mysqli_stmt_bind_param($stmt,'isssssss',$userId,$table,$recordId,$aksi,$oldJson,$newJson,$ip,$ua);
    mysqli_stmt_execute($stmt); mysqli_stmt_close($stmt);
}
function get_id($name='id'): int {
    $id=filter_input(INPUT_GET,$name,FILTER_VALIDATE_INT);
    return $id ? (int)$id : 0;
}
