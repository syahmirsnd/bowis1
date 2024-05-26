<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
</html>
<?php 
    session_start();

    if (!isset($_SESSION['username'])) {
        // Jika pengguna belum login, tampilkan alert dan arahkan ke halaman login
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Anda harus login terlebih dahulu!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'login.php';
                    }
                });
            });
        </script>";
        exit();
    }
    
    $id = $_GET['id'];
    $username = $_SESSION['username'];
    $saran = $_GET['saran'];
    
    if (empty($id)){
        //insert
        $url = 'https://ap-southeast-1.aws.data.mongodb-api.com/app/application-0-rtepfya/endpoint/insertSaran';
        $customrequest = 'POST';
    }
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $id,
            'username' => $username,
            'saran' => $saran,
        ))
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: tentang.php');
?>