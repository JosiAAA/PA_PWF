@extends('layouts.base')
@section('content')   
<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('style3.css') }}">
<style>
   
 .garis2{
    position: absolute;
    width: 590px;
             border-top: 2px solid #212121; /* Warna dan ketebalan garis */
             margin-top: 1%; /* Jarak dari elemen sekitarnya */
             left: 0;
             top: 0;
             margin-top: 55%;
             margin-left: 10.4%;
 }

 .comment {
            background-color: #f0f0f0;
            padding: 20px;
            min-height: 100vh; /* Menetapkan tinggi minimum untuk halaman */
        }

        .commsec {
            max-width: 600px; /* Menetapkan lebar maksimum untuk bagian komentar */
            left: 5%;
            position: absolute;
            margin-left: 5.4%;
           
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* Tambahkan gaya untuk komentar persegi panjang */
        
         .comment h1{
         font-family: 'Josefin Sans', sans-serif;
     color: black;
     font-size: clamp(1.75rem, 1.75rem + .25 * (100vw - 23.4375rem) / 66.5625, 2rem);
     font-weight : 600;
            position: relative;
     
     }   
     .commsec p{
     margin-top: 15px;
         color:rgb(51, 51, 51);
     font-family: 'Josefin Sans', sans-serif;
     font-size: 1rem;
     font-weight: 400;
 }
 .commsec h3{
     margin-top: 15px;
         color:rgb(51, 51, 51);
     font-family: 'Josefin Sans', sans-serif;
     font-size: 1rem;
     font-weight: 400;
    
 }
 .form-group {
    display: flex;
    align-items: center;
}

.form-group .fa-user {
    margin-right: 10px;
}

.form-group input,
.form-group textarea {
    flex: 1;
}
.form-group textarea {
    padding: 10px;
}

.form-group textarea {
    margin-top: 50px;
    
}
.form-group textarea {
    resize: none;
}

.comment-rectangle {
    width: auto;
    height: auto;
    margin-top: 10%;
    background-color: #fff;
    border: 1px solid #b7b7b7;
    padding: 10px;
    border-radius: 20px;
    box-shadow: 6px 4px 6px rgba(0, 0, 0, 0.3);
}

.comment-rectangle p {
    word-wrap: break-word; /* Menyebabkan kata-kata memotong di dalam kotak komentar */
    text-align: left;      /* Rata kiri teks */
}

       .hidden-group {
    display: none;
  }
</style>
<section class="hal-donasi no-flex">
    @foreach($result as $p)
    
<div class="page">
    <h1 class="judul" style="position: absolute; top:0;margin-top:8%; margin-left:10%;">{{$p->judul}}</h1>
    <div class="container-gmbr">
        <img src="{{$p->link_gambar}}" alt="">
    </div>
    <div class="donate-nav">
    <div class="desc">  
       <h1>Rp. {{ number_format($p->total_terkumpul, 0, ',', '.') }},00</h1>

    <p>Telah terkumpul</p>
    </div>
  
<div class="donate-btn" id="donateBtn" onclick="showDonationForm()">
    <button style="color: #1e1e1e; font-family: 'Josefin Sans', sans-serif; margin-left: 30%; font-size: 25px; font-weight: bold;">Donasi</button>
</div>
    <div class="total">
    <i class="fa-solid fa-user-group jumlah"></i>
    <p class="orang">{{$p->jumlah_pendonasi}} Orang telah berdonasi</p>
</div>


</div>
    </div>
    <div class="penggalangan-dana-info">
        <i class="fa-solid fa-user fa-xl"></i>
        <p>Penggalangan Dana Oleh {{ $p->pemilik }} </p>
    </div>
    <div class="garis"></div>
    <div class="penggalangan-dana-date">
        
        <p>Dibuat pada {{ $p->tanggal }},  </p>
        <br>
        <p>{{ $p->jam }} </p>
    </div>
    <div class="garis"></div>
    <div class="penggalangan-dana-date"> 
        <p style="word-wrap: break-word;text-align: left; ">{{ $p->deskripsi }},  </p>
    </div>
    </section>
    <div id="donationFormContainer" style="display: none;">
        <button onclick="closeDonationForm()" style="float: right;">X</button>
        <form action="{{ url('/donate') }}" id="paymentForm" method="POST">
            @csrf
            <input type="hidden" name="donation_id" value="{{ $p->id }}">
            <label for="nominal">Nominal:</label>
            <input style="padding-left:4px;width: 100%; border: 1px solid #000;" type="number" id="topup" name="nominal" min="1" max="1000000000" placeholder="Masukkan Angka" required>
            <br>
            <input type="checkbox" id="confirmationCheckbox" required>
            <label for="confirmationCheckbox">Saya yakin ingin berdonasi</label>
            <br>
            <button type="submit" class="black-button">Kirim Donasi</button>
        </form>
    </div>
    <div class="garis2"></div>
    <section class="comment">
        <div class="commsec">
            <h1>Comment Section ({{ $jumlahKomentar }})</h1>
            <p>Tinggalkan Komentar </p>
            <form action="testing/store" method="post">
                @csrf
                <div class="form-group">
                    <i class="fa-regular fa-user fa-lg"></i>
                    <span style=" text-transform: capitalize;">{{ auth()->user()->name }}</span>
                    <textarea style="margin-left:5%;" class="form-control" id="komentar" name="komen" rows="3" placeholder="Tulis komentar Anda di sini..."required></textarea>
                    <div class="hidden-group">
                        <label for="pemilik">Pemilik: </label>
                        <input value=" {{ auth()->user()->name }}"type="text" id="pemilik" name="pemilik" required>
                
                        <label for="role_pemilik">Role Pemilik:</label>
                        <input value=" {{ auth()->user()->role }}"type="text" id="role_pemilik" name="role_pemilik" required>
                
                        <label for="tanggal">Tanggal:</label>
                        <input type="text" id="tanggal" name="tanggal" value="" readonly>
                
                        <label for="jam">Jam:</label>
                        <input type="text" id="jam" name="jam" value="" readonly>

                        <label for="target">Role Pemilik:</label>
                        <input value=" {{ $p->id }}"type="text" id="target" name="target" required>
                    </div>
                </div>
                <button type="submit" class="black-button">Kirim</button>
            </form>
            @endforeach
            @foreach($komentar as $k)
            <div class="comment-rectangle">
                <div style="display: flex; justify-content: space-between; align-items: center; text-transform: capitalize;" class="profile-info">
                    <div style="display: flex; align-items: center; ">
                        <i style="text-align: left;" class="fa-regular fa-user fa-lg"></i>
                        <h3 style="text-align: left; margin-left: 10px;">{{ $k->pemilik }}</h3>
                    </div>
                    <div style="text-align: right;">
                        <p style="font-size:13px;">{{ $k->tanggal }}</p>
                        <p style="font-size:10px;">{{ $k->jam }}</p>
                    </div>
                </div>
                <hr style="border: 1px solid #000; margin: 10px 0;"> <!-- Garis Pemisah -->
                <p style="color:#6e6e6e">{{ $k->komen }}</p>
            </div>
        @endforeach
        
          
    
        </div>
    </section>

    <script>
        function showDonationForm() {
    var donationFormContainer = document.getElementById('donationFormContainer');
    donationFormContainer.style.display = 'block';
    var halDonasiSection = document.querySelector('.hal-donasi');
    halDonasiSection.classList.add('blur');
    var judulElement = document.querySelector('.judul');
    judulElement.style.position = 'absolute';
    judulElement.style.top = '0';   
    judulElement.style.marginTop = '0';
    judulElement.style.marginLeft = '10%';
}

function closeDonationForm() {
    var donationFormContainer = document.getElementById('donationFormContainer');
    donationFormContainer.style.display = 'none';
    var halDonasiSection = document.querySelector('.hal-donasi');
    halDonasiSection.classList.remove('blur');
    var judulElement = document.querySelector('.judul');
    judulElement.style.position = 'absolute';
    judulElement.style.top = '0';   
    judulElement.style.marginTop = '8%';
    judulElement.style.marginLeft = '10%';
}
window.onload = function() {
      var tanggalInput = document.getElementById('tanggal');
      var jamInput = document.getElementById('jam');
      
      // Dapatkan tanggal sekarang
      var date = new Date();
      
      // Format tanggal menjadi "11 November 2023"
      var options = { day: 'numeric', month: 'long', year: 'numeric' };
      var tanggalFormatted = date.toLocaleDateString('id-ID', options);
      
      // Dapatkan jam sekarang
      var jamSekarang = date.toLocaleTimeString('en-ID', { hour: '2-digit', minute: '2-digit' });
  
      // Isi nilai pada input
      tanggalInput.value = tanggalFormatted;
      jamInput.value = jamSekarang;
    };
    </script>
    
@endsection
