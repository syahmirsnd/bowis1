<?php 
    session_start();

    
    $id = $_GET['id'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    
    if (empty($id)){
        //insert
        $url = 'https://ap-southeast-1.aws.data.mongodb-api.com/app/application-0-rtepfya/endpoint/insertPenggunaBowis';
        $customrequest = 'POST';
    }
    $cUrl = curl_init();

    $options = array(
        CURLOPT_URL => $url,
        CURLOPT_CUSTOMREQUEST => $customrequest,
        CURLOPT_POSTFIELDS => http_build_query(array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
        ))
    );

    curl_setopt_array($cUrl,$options);

    $response = curl_exec($cUrl);

    curl_close($cUrl);

    header('Location: login.php');
?>