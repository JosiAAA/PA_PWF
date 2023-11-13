

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    
</head>
<style>
    .form-class{
        margin-left: 51%;
        position: absolute;
        top: 0;
        margin-top: 10%;
    }
    body{
        width: 100%;
        height: 100%;
        font-family: 'Josefin Sans', sans-serif;
        font-size: 20px;
        background: linear-gradient(rgba(54, 64, 99, 0.4), rgba(185, 185, 185, 0.477)), url('asset/fixbg.jpeg');
        background-size: cover;
        overflow-x: hidden;
        
    }
    /* Tambahkan pada bagian CSS Anda */
.form-outline {
    display: flex;
    flex-direction: column;
}

.form-outline label {
    margin-bottom: 8px;
}

/* Tambahkan pada bagian CSS Anda */
.form-outline input,
.form-outline select {
    width: 100%;
    height: 40px;
    border-radius: 50px;
    padding: 7px; /* Tambahkan padding sesuai kebutuhan */
    /* Hindari penambahan padding mengubah lebar input */
    border: none;
}
.custom-font {
    font-family: 'Josefin Sans', sans-serif;
 }
 .custom-button {
    border-radius: 30px;
    transition: background-color 0.3s, color 0.3s; /* Animasi hover */
    border:none;S
    font-size: 15px;
    padding: 10px;
}

.custom-button:hover {
    background-color: rgb(30, 30, 30);
    color: white;
    cursor: pointer;
}

.form-outline {
    margin-bottom: 20px; /* Jarak antara form elements */
}
.custom-input {
    height:35px ;
    padding: 20px; /* Sesuaikan padding sesuai kebutuhan */
    font-family: 'Josefin Sans', sans-serif;
}

.belum{
    position: absolute;
    top: 0;
    right:0;
    margin-right: 1%;
}
.belum a {
    text-decoration: none; /* Menghilangkan garis bawah */
    color: rgb(14, 14, 14); /* Warna teks awal */
   /* Efek shadow */
    transition: color 0.3s ease; /* Transisi warna saat dihover */
}

.belum a:hover {
    color: rgb(255, 255, 255); /* Warna teks saat dihover */
}

.login-container {
    display: flex;
    align-items: center;
}

.icon-container {
    margin-left: 10px; /* Sesuaikan jarak antara teks dan ikon */
}

.home-button{
    position: absolute;
    left: 0;
    margin-left: 2%;
    top: 0;
    margin-top: 10px;

}

</style>
<body>
    <section>
        <div>
            <img src="asset/logoBank.png" alt="" style="max-width: 200px; max-height: 200px; margin-left:130px; margin-top:1.5%;">
            
            <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(33, 33, 33); font-size:50px; margin-left:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Selamat Datang ! </h2>

           
            
        </div>
        <div class="form-class">
            <div class="login-container">
                <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(32, 32, 32); font-size:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                    LOGIN
                </h2>
                <div class="icon-container">
                    <div class="fa-3x" style="color: rgb(32, 32, 32); padding-bottom:3px;">
                        <i class="fa-solid fa-gear fa-spin fa-xs"></i>
                    </div>
                </div>
            </div>
            
            <p class="text-white-50 mb-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Masukkan Email and Password yang telah terdaftar</p>
            <form action="{{ route('login') }}" method="post" style="">
                @csrf
        
                <div class="form-outline form-white mb-4">
                    <label style="color: rgba(32, 32, 32, 0.849)" for="email">Email</label>
                    <input type="email" id="typeEmailX" class="form-control form-control-lg custom-input" name="email"
                        placeholder="contoh@gmail.com" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-outline form-white mb-4">
                    <label style="color: rgba(32, 32, 32, 0.849); padding-top:4px;" for="password">Password</label>
                    <input type="password" id="typePasswordX" class="form-control form-control-lg custom-input" name="password"
                        placeholder="password" required>
                </div>
                
        
                <!-- Tambahkan checkbox untuk menampilkan password -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword">
                    <label  style="color: rgba(32, 32, 32, 0.849);font-size:15px;" class="form-check-label text-white" for="showPassword">Show Password</label>
                </div>
        
                <!-- Tambahkan select box untuk memilih peran -->
                <div class="form-outline form-white mb-4" style="display: none;">
                    <label style="color: rgba(32, 32, 32, 0.849); padding-top:9px;"  for="role">Role</label>
                    <select class="form-control form-control-lg" name="role" required>
                        <option style="color: rgba(32, 32, 32, 0.849); font-size: 14px;" value="user">User</option>
                        <option style="color: rgba(32, 32, 32, 0.849); font-size: 14px;"  value="admin">Admin</option>
                    </select>
                </div>
        
                <!-- Tambahkan checkbox untuk menampilkan password -->
                <button class="btn btn-outline-light btn-lg px-5 custom-button" style="margin-top:5%;"type="submit" value="Login">Login</button>
            </form>
        </div>
        <div class="belum">
            <p>Belum Punya Akun? <a href="/register">Register</a></p>
        </div>
        <a href="/welcome">
            <div class="fa-3x home-button" style="color: rgb(236, 236, 236)">
                <i class="fa-solid fa-house fa-flip fa-xs" style="padding-top:20px; margin-top:10%; --fa-animation-duration: 3s; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
            </div>
            
        </a>
        
    </section>

    <script>
        document.getElementById('showPassword').addEventListener('change', function () {
            var passwordInput = document.getElementById('typePasswordX');
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    

</body>


