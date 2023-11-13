@extends('layouts.base')
@section('content')
<style>
  
  .container {
            text-align: center;
        }

        .section-title {
            margin-bottom: 20px;
        }

        .activities {
            display: flex;
            justify-content: space-around;
        }

        .activity {
            flex: 1;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            color: black;
        }
        p{
          color: black;
        }
        h3{
          color: black;
          text-align: left; 
          font-size: 30px;
        }
        .activity ul {
            text-align: left; /* Posisi teks pada bullet points */
            margin-left: 5%;
        }

        .activity li {
            list-style-type: disc; /* Bullet points berbentuk bulatan */
            margin-bottom: 10px; /* Jarak antar bullet points */
        }

</style>
<body>

        <section id="main" class="no-flex">
          <div class="fa-3x" style="color: rgb(157, 16, 16); z-index: 0;">
          <i class="fa-solid fa-heart fa-beat hati" style="--fa-animation-duration: 2s;text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);"></i>
          </div>
        <h1 class="mari" style="font-family: 'Josefin Sans', sans-serif; font-size:50px;">Mari Saling Membantu</h1>
        <a class="button" href="/search">
            <span class="button-text" style="font-family: 'Josefin Sans', sans-serif;">Mulai berdonasi</span>
        </a>
        </section>
    <section id="second">
      <div class="container">
        <div class="section-title">
            <h2>Cara Kerja FoodBank</h2>
        </div>

        <div class="activities">
            <div class="activity">
                <h3>1. Buka Donasi</h3>
                <ul>
                  <li>Buka Penggalangan Dana</li>
                  <li>Ceritakan kisah Anda</li>
                  <li>Tambahkan Gambar</li>
                  
              </ul>
            </div>

            <div class="activity">
                <h3>2. Mulai Berdonasi</h3>
                <ul>
                  <li>Cari Penggalangan Dana</li>
                  <li>Melakukan Donasi</li>
                
                  
              </ul>
            </div>

            <div class="activity">
                <h3>3. Sharing Donasi</h3>
                <ul>
                  <li>Cari Penggalangan Dana</li>
                  <li>Sharing Dengan Teman</li>
                
                  
              </ul>
            </div>
        </div>
    </div>
    </section>

  


    <script src="https://kit.fontawesome.com/7ca9478353.js" crossorigin="anonymous"></script>
    
    @endsection
