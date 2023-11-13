@extends('layouts.base')

@section('content')
<style>
    .hal-posting {
   margin-top: 10%;
   
}
.hal-posting h1{
    font-family: 'Josefin Sans', sans-serif;
    color: black;
    font-size: clamp(1.75rem, 1.75rem + .25 * (100vw - 23.4375rem) / 66.5625, 2rem);
    font-weight
    : 600;
}
p {
    color: #767676;
    font-family: 'Josefin Sans', sans-serif;
    font-size: 1rem;
    font-weight: 400;
  }
  .horizontal-line {
    border-top: 1px solid #ccc; /* Warna abu-abu untuk garis */
    margin: 20px 0; /* Jarak dari atas dan bawah */
}

.custom-form {
    display: flex;
    flex-direction: column;
    max-width: 400px; /* Maksimum lebar form */
    margin: auto; /* Pusatkan form di tengah halaman */
    font-family: 'Josefin Sans', sans-serif;
  }

  /* Gaya untuk label */
  .custom-form label {
    margin-bottom: 8px; /* Jarak antara label dan input */
  }

  /* Gaya untuk input text, date, time, dan textarea */
  .custom-form input[type="text"],
  .custom-form input[type="date"],
  .custom-form input[type="time"],
  .custom-form textarea {
    width: 100%; /* Penuhkan lebar form */
    padding: 8px; /* Ruang di dalam input box */
    margin-bottom: 16px; /* Jarak antar input box */
    box-sizing: border-box; /* Sesuaikan ukuran box dengan padding dan border */
    border: 1px solid black;
    border-radius: 20px;
    font-family: 'Josefin Sans', sans-serif;
  }

  /* Gaya untuk button */
  .custom-form button {
    background-color: rgb(41, 41, 41); /* Warna latar belakang tombol */
    color: white; /* Warna teks tombol */
    padding: 10px 15px; /* Ruang di dalam tombol */
    border: none; /* Hapus border tombol */
    cursor: pointer; /* Ganti kursor saat dihover ke pointer */
    font-family: 'Josefin Sans', sans-serif;
  }

  /* Gaya untuk tombol saat dihover */
  .custom-form button:hover {
    background-color: #3f3f3f;
  }

  /* Gaya untuk grup yang ingin disembunyikan */
  .hidden-group {
    display: none;
  }
</style>
<section class="hal-posting no-flex">
    <h1>Mulai Melakukan Penggalangan Dana</h1>
    <p>Masukkan informasi yang diperlukan</p>
    <div class="horizontal-line"></div>
    <form action="/posting/store" method="POST" id="galangDanaForm" class="custom-form">
        @csrf
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" required>

      <div class="hidden-group">
            <label for="pemilik">Pemilik: </label>
            <input value=" {{ auth()->user()->name }}"type="text" id="pemilik" name="pemilik" required>
    
            <label for="role_pemilik">Role Pemilik:</label>
            <input value=" {{ auth()->user()->role }}"type="text" id="role_pemilik" name="role_pemilik" required>
    
            <label for="tanggal">Tanggal:</label>
            <input type="text" id="tanggal" name="tanggal" value="" readonly>
    
            <label for="jam">Jam:</label>
            <input type="text" id="jam" name="jam" value="" readonly>
        </div>
       
    
        <label for="link_gambar">Link Gambar:</label>
        <input type="text" id="link_gambar" name="link_gambar" required>
    
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" rows="4" required></textarea>
    
        <label for="wilayah">Wilayah:</label>
        <input type="text" id="wilayah" name="wilayah" required>
        <div style="display: flex; align-items: center;">
          <input type="checkbox" id="confirmationCheckbox" required style="margin-right: 5px;">
          <label for="confirmationCheckbox" style="margin-bottom: 0;">Konfirmasi</label>
      </div>
      
        <button type="submit">Submit</button>
    </form>
    
  </section>
  <script>
    // Fungsi untuk mengisi nilai tanggal dan jam sesuai waktu lokal pengguna
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
