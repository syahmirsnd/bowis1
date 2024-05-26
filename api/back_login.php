<?php
session_start();

$cUrl = curl_init();

$username = urlencode($_GET['username']);
$password = urlencode($_GET['password']);

$options = array(
    CURLOPT_URL => 'https://ap-southeast-1.aws.data.mongodb-api.com/app/application-0-rtepfya/endpoint/getUnamePwBowis?username=' . $username . '&password=' . $password,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_RETURNTRANSFER => true,
);

curl_setopt_array($cUrl, $options);

$response = curl_exec($cUrl);

if (curl_errno($cUrl)) {
    echo 'cURL error: ' . curl_error($cUrl);
    exit();
}

$data = json_decode($response, true);

curl_close($cUrl);

echo '<pre>';
print_r($data);
echo '</pre>';

if ($data && is_array($data) && count($data)) {
    // Teregistrasi
    $_SESSION['username'] = $_GET['username'];
    header("Location: index.php");
    exit();
} else {
    // Tidak Teregistrasi
    echo '<script>alert("Login failed"); window.history.back();</script>';
}
?>
