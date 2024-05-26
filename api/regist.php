<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .logo {
            max-width: 100px; 
            margin: 5px 0; 
        }
        nav {
            background-color: rgba(0, 123, 255, 0.8);
            padding: 10px 0;
        }
        nav .navbar-nav .nav-item .nav-link {
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
        }
        nav .navbar-nav .nav-item .nav-link:hover {
            color: #ffcc00;
        }
        .poppins{
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-style: bold;
            color:#5E5DA6;
        }
    </style>
    <title>Bowis - Registrasi</title>
</head>
<body>
<img style="display:flex" class="mx-auto" src="../foto/bowis.png" alt="">
    <div class="container">
        <div class="card mt-5">
            <div class="card-header poppins">
                Registrasi
            </div>
            <div class="card-body poppins">
                <form id="form_regist" action="back_regist.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="username" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </form>
            </div>
            <div class="card-footer mx-auto">
                <button type="submit" class="btn btn-warning mx-auto poppins" style="display:flex;color:black" form="form_regist">Registrasi</button>
                <br>
                <div class="poppins"> Sudah punya akun? <a href="login.php" class="btn poppins" style="background-color: #9290F5;color:white">Log In</a></div>
            </div>
            
        </div>
    </div>
</body>
</html>