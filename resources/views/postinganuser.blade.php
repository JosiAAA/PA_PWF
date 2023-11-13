@extends('layouts.base')
@section('content')
<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('style2.css') }}">
<style>
    .hand{
        position: absolute;
        top:0;
        margin-top: 8%;
        left: 0;
        margin-left:48.2%;

    }
    .centered-button {
        margin-top: 20%;
        display: inline-block;
        padding: 10px 20px; /* Atur padding sesuai kebutuhan Anda */
        background-color: rgb(25, 25, 25); /* Warna latar belakang tombol */
        color: #fff; /* Warna teks tombol */
        text-decoration: none;
        border-radius: 5px; /* Atur sudut border sesuai kebutuhan Anda */
        font-size: 16px; /* Atur ukuran teks sesuai kebutuhan Anda */
        font-family: 'Josefin Sans', sans-serif;
    }
    .centered-button:hover {
        transition: transform 0.3s;
  transform: scale(1.1);
    }
</style>
<section class="hal-search no-flex">
    <i class="fa-solid fa-hand-holding-medical fa-flip fa-2xl hand"></i>
  <h1>Penggalangan Dana Anda</h1>
  <p>Dibawah ini menampilkan penggalangan Dana yang pernah anda buka</p>

  {{-- <form action="{{ route('search') }}" method="get"> --}}
   <div class='search-box'>
    <i class="fa-solid fa-magnifying-glass"></i>
    <form class="search-form" onsubmit="search(event)">
        <input type="text" name="query" id="searchInput" placeholder="Masukkan kata kunci..." oninput="search()">
        <button type="button" onclick="search()"></button>
    </form>
    <i class="fa-solid fa-delete-left" id="deleteIcon" onclick="clearSearch()"></i>
</div>
    
    
    <div class="filter-container">
        <div class="dropdown">
            <button class="dropbtn" onclick="toggleDropdown()">By Date <i id="arrow-icon" class="fa-solid fa-caret-down"></i></button>
            <div class="dropdown-content" id="dateDropdown">
                <a  onclick="filterByDate('latest')">Terbaru</a>
                <a  onclick="filterByDate('oldest')">Terlama</a>
            </div>
        </div>
    </div>
{{-- </section>
<section class="hal-konten"> --}}
<div class='container1'>
    
    @foreach($postingan as $p)
    @auth
    <a href="{{ url('donationPage', ['id' => $p->id]) }}" class="donation-link">
        @endauth
    <div class="per-content" data-judul="{{ strtolower($p->judul) }}" data-pemilik="{{ strtolower($p->pemilik) }}" data-wilayah="{{ strtolower($p->wilayah) }}" data-id="{{ $p->id }}">

        <div class="img-container">
            <img src="{{ $p->link_gambar }}" alt="">
        </div>
        <div class="deskripsi">
            <h2 id="judul" style="text-transform: capitalize;">{{ $p->judul }}</h2>
            <p id="pemilik">Oleh Anda</p>
            <p id="terkumpul">Terkumpul Rp. {{ number_format($p->total_terkumpul, 0, ',', '.') }},00</p>

            <p id="wilayah">{{ $p->wilayah }}, {{ $p->tanggal }}</p>
            <a href="/delete/{{ $p->id }}" class="centered-button delete-btn" onclick="return konfirmasiHapus()">
                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                Hapus Postingan
            </a>
        </div>
    </div>
    </a>
    <div id="noResultsMessage" style="display: none; text-align: center; margin-top: 20px; font-size: 20px; color: rgb(19, 19, 19);">
        Pencarian tidak ditemukan...
        <br>
        <p>    Silahkan Coba Pencarian Lain</p>
    
    </div>
@endforeach
    <div class="per-content">
        <a href="/posting" class="centered-button">
            <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
            Buat Postingan Baru</a>

    </div>
   
        
</div>

</section>
<script>
      function search(event) {
        if (event) {
            event.preventDefault();
        }

        var searchTerm = document.getElementById('searchInput').value.toLowerCase();
        var perContents = document.querySelectorAll('.per-content');
        var isVisible = false;

        perContents.forEach(function (perContent) {
            var judul = perContent.getAttribute('data-judul');
            var pemilik = perContent.getAttribute('data-pemilik');
            var wilayah = perContent.getAttribute('data-wilayah');

            if (judul.includes(searchTerm) || pemilik.includes(searchTerm) || wilayah.includes(searchTerm)) {
                perContent.style.display = 'block';
                isVisible = true;
            } else {
                perContent.style.display = 'none';
            }
        });

        var noResultsMessage = document.getElementById('noResultsMessage');
        if (!isVisible) {
            noResultsMessage.style.display = 'block';
        } else {
            noResultsMessage.style.display = 'none';
        }
    }

    function clearSearch() {
        document.getElementById('searchInput').value = '';
        var perContents = document.querySelectorAll('.per-content');

        perContents.forEach(function (perContent) {
            perContent.style.display = 'block';
        });

        document.getElementById('noResultsMessage').style.display = 'none';
    }
    let isLatest = true; // Default filter is Terbaru

    function toggleDropdown() {
    const dateDropdown = document.getElementById('dateDropdown');
    dateDropdown.style.display = (dateDropdown.style.display === 'none' || dateDropdown.style.display === '') ? 'block' : 'none';
}

function filterByDate(type) {
    const isLatest = type === 'latest';
    const dropdown = document.getElementById('dateDropdown');
    const arrowIcon = document.getElementById('arrow-icon');

    dropdown.style.display = 'none';
    arrowIcon.className = isLatest ? 'fa-solid fa-caret-down' : 'fa-solid fa-caret-up';

    const perContents = document.querySelectorAll('.per-content');
    const sortedContents = Array.from(perContents).sort((a, b) => {
        const dateA = parseInt(a.getAttribute('data-id'));
        const dateB = parseInt(b.getAttribute('data-id'));

        return isLatest ? dateB - dateA : dateA - dateB;
    });

    const container1 = document.querySelector('.container1');
    sortedContents.forEach(content => {
        container1.appendChild(content);
    });

}
function konfirmasiHapus() {
        return confirm('Apakah Anda yakin ingin menghapus postingan ini?');
    }


</script>
@endsection
