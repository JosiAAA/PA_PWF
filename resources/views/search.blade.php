<?php
$uniqueWilayahs = $search->unique('wilayah')->pluck('wilayah');

?>
@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="style2.css">
<style>
    .hand{
        position: absolute;
        top:0;
        margin-top: 8%;
        left: 0;
        margin-left:48.2%;
        
    }
    .location-dropdown {
            
            display: flex;
            align-items: center;
           
            margin-left: 16%;
            top:0;
            margin-top:17.5%;
            position: absolute;
        }

        .location-dropdown label {
            margin-right: 10px;
            text-transform: capitalize;
            /* Ganti dengan properti font lain yang diinginkan */
        }

        .location-dropdown select {
            /* Add any additional styling for the select element */
            background-color: rgb(255, 255, 255);
        }
        .location-dropdown select option:hover {
            background-color: black;
            color: white; /* Ganti dengan warna teks yang sesuai */
        }
</style>
<section class="hal-search no-flex">
    <i class="fa-solid fa-hand-holding-medical fa-flip fa-2xl hand"></i>
  <h1>Cari Penggalangan Dana di FoodBank</h1>
  <p>Cari Penggalangan Dana Melalui judul, lokasi, atau nama orang</p>

  {{-- <form action="{{ route('search') }}" method="get"> --}}
   <div class='search-box'>
    <i class="fa-solid fa-magnifying-glass"></i>
    <form class="search-form" onsubmit="search(event)">
        <input type="text" name="query" id="searchInput" placeholder="Masukkan kata kunci..." oninput="search()">
        <button type="button" onclick="search()"></button>
    </form>
    <i class="fa-solid fa-delete-left" id="deleteIcon" onclick="clearSearch()"></i>
</div>
    
<div class="location-dropdown">
   
    <select id="location" onchange="filterByLocation()">
        <option value="all">All Locations</option>
        <!-- Add dynamically generated options here using JavaScript -->
    </select>
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
    
    @foreach($search as $p)
    @auth
    <a href="{{ url('donationPage', ['id' => $p->id]) }}" class="donation-link">
        @endauth
    <div class="per-content" data-judul="{{ strtolower($p->judul) }}" data-pemilik="{{ strtolower($p->pemilik) }}" data-wilayah="{{ strtolower($p->wilayah) }}" data-id="{{ $p->id }}">

        <div class="img-container">
            <img src="{{ $p->link_gambar }}" alt="">
        </div>
        <div class="deskripsi">
            <h2 id="judul" style="text-transform: capitalize;">{{ $p->judul }}</h2>
            <p style="text-transform:capitalize;"id="pemilik">By {{ $p->pemilik }}</p>
            <p id="terkumpul">Terkumpul Rp. {{ number_format($p->total_terkumpul, 0, ',', '.') }},00</p>

            <p id="wilayah">{{ $p->wilayah }}, {{ $p->tanggal }}</p>
        </div>
    </div>
    </a>
    <div id="noResultsMessage" style="display: none; text-align: center; margin-top: 20px; font-size: 20px; color: rgb(19, 19, 19);">
        Pencarian tidak ditemukan...
        <br>
        <p>    Silahkan Coba Pencarian Lain</p>
    
    </div>
@endforeach
   
        
</div>

</section>
<script>
     // Extract unique locations from the data
     const locations = [...new Set(Array.from(document.querySelectorAll('.per-content')).map(element => element.getAttribute('data-wilayah')))];

// Create options for the dropdown
const locationDropdown = document.getElementById('location');
locations.forEach(location => {
    const option = document.createElement('option');
    option.value = location.toLowerCase();
    option.textContent = location;
    locationDropdown.appendChild(option);
});

function filterByLocation() {
    const selectedLocation = document.getElementById('location').value;
    const contentElements = document.querySelectorAll('.per-content');

    contentElements.forEach(element => {
        const elementLocation = element.getAttribute('data-wilayah');
        const displayStyle = (selectedLocation === 'all' || elementLocation.toLowerCase() === selectedLocation) ? 'block' : 'none';
        element.style.display = displayStyle;
    });

    // Show or hide the "noResultsMessage" based on the filter result
    const noResultsMessage = document.getElementById('noResultsMessage');
    const showNoResultsMessage = Array.from(contentElements).every(element => element.style.display === 'none');
    noResultsMessage.style.display = showNoResultsMessage ? 'block' : 'none';
}
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


</script>
@endsection
