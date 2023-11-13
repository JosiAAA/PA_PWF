<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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

.input-group {
    position: relative;
}

.input-group .btn {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    border: none;
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
    <section >
                            <div>
            <img src="asset/logoBank.png" alt="" style="max-width: 200px; max-height: 200px; margin-left:130px; margin-top:1.5%;">
            
            <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(33, 33, 33); font-size:50px; margin-left:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Selamat Datang ! </h2>

          
            
        </div>
        <div class="form-class">
        <div class="login-container">
            <h2 style="font-family: 'Josefin Sans', sans-serif; color:rgb(32, 32, 32); font-size:50px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
                REGISTER
            </h2>
            <div class="icon-container">
                <div class="fa-3x" style="color: rgb(32, 32, 32); padding-bottom:3px;">
                    <i class="fa-solid fa-gear fa-spin fa-xs"></i>
                </div>
            </div>
        </div>
        
        <p class="text-white-50 mb-5" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">Masukkan Data Diri Anda</p>
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-outline form-white">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" placeholder="Your name" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white ">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" placeholder="name@example.com" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-outline form-white">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" placeholder="Password">
                                            <button type="button" class="btn btn-dark toggle-password" toggle="#password">
                                                <i style="cursor: pointer" class="far fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-outline form-white">
                                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
                                            <button type="button" class="btn btn-dark toggle-password" toggle="#password_confirmation">
                                                <i style="cursor: pointer"class="far fa-eye"></i>
                                            </button>
                                        </div>
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    
                                   
                                        <button class="btn btn-outline-light btn-lg px-5 custom-button" type="submit" value="Register">Register</button>
                                      
                                          
    
                                </form>
                            </div>
                        </div>
                        <div class="belum">
                            <p>Sudah Punya Akun? <a href="/login">Login</a></p>
                        </div>
                        <a href="/welcome">
                            <div class="fa-3x home-button" style="color: rgb(236, 236, 236)">
                                <i class="fa-solid fa-house fa-flip fa-xs" style="padding-top:20px; margin-top:10%; --fa-animation-duration: 3s; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
                            </div>
                            
                        </a>
                        
    </section>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    
    <script>
        // JavaScript to toggle password visibility
        document.querySelectorAll(".toggle-password").forEach(function(button) {
            button.addEventListener('click', function() {
                const passwordField = document.querySelector(this.getAttribute('toggle'));
    
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                } else {
                    passwordField.type = "password";
                }
            });
        });
    </script>
    </body>