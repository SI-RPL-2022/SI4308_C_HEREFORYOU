@extends('layouts.app')
@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<header class="w3-display-container w3-wide" id="home">
  <img class="w3-image" src="{{ asset('assets/image/h2.jpg') }}" alt="Fashion Blog" width="1600" height="1060">
  <div class="w3-display-left w3-padding-large">
    <h1 class="w3-text-white">Welcome to</h1>
    <h1 class="w3-jumbo w3-text-white w3-hide-small"><b>Here For You</b></h1>
    <h6><button class="w3-button w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off" >Consul Now</button></h6>
  </div>
</header>

<div class="w3-row-padding w3-padding-64 w3-theme-l1" id="work">

  <div class="w3-quarter">
  <h2>Apa itu Here For You</h2>
  <p style="text-align: justify;
  text-justify: inter-word; ">Aplikasi Here For You merupakan aplikasi konsultasi kejiwaan yang dihadirkan untuk seluruh masyarakat terutama kalangan usia produktif.</p>
  </div>
  
  <div class="w3-quarter">
  <div class="w3-card w3-white " style="height: 600px">
    <img src="{{ asset('assets/image/hfy1.png') }}" alt="Snow" style="height:auto; width:100%">
    <div class="w3-container">
    <p style="text-align: justify; text-justify: inter-word; ">Siapa nih diantara kalian yang suka scrolling sosmed berjam-jam? Atau siapa yang sukanya nontonin
    konten gosip dan hate-speech? Atau bahkan ngerasa insecure tiap liat postingan orang lain?
    <p> Kamu mengalami itu semua, yuk istirahat sejenak dari sosmed.</p>
    <p>Kamu bisa loh menonaktifkan sosmedmu selama beberapa hari.
    Dan cobalah untuk menikati hidup sejenak tanpa sosmed!</p>
    </div>
    </div>
  </div>
  
  <div class="w3-quarter">
  <div class="w3-card w3-white" style="height: 600px">
    <img src="{{ asset('assets/image/hfy4.png') }}" alt="Lights" style="height:auto; width:100%">
    <div class="w3-container">
    <p style="text-align: justify; text-justify: inter-word; ">tahukah kamu bahwa gaslighting juga dapat dilakukan oleh orangtuamu?</p>
    <p style="text-align: justify; text-justify: inter-word; ">Perlu kamu ketahui bahwa kamu berharga, tidak seperti apa yang dikatakan dan dilakukan oleh orangtuamu.</p>
    <p style="text-align: justify; text-justify: inter-word; ">Be strong, Dear!</p>
    </div>
    </div>
  </div>
  
  <div class="w3-quarter">
  <div class="w3-card w3-white" style="height: 600px">
    <img src="{{ asset('assets/image/hfy3.png') }}" alt="Mountains" style="height:auto; width:100%">
    <div class="w3-container">
    <p style="text-align: justify; text-justify: inter-word; ">pernah ngga sih kalian pusing tiap milih makanan di aplikasi ojol? Atau pusing mau nonton film/series apa buat nemenin makan? Atau bahkan bingung mau pake outfit apa tiap berpergian?</p>
    <p style="text-align: justify; text-justify: inter-word; ">Bingung saat mengambil keputusan itu wajar kok, Dear. Tapi kalau sampe ngerasa capek, pusing, bahkan stress harus kamu waspadai ya.
      Karena bisa aja kamu sedang mengalami decision fatigue.</p>
    </div>
    </div>
  </div>
  
  </div>
 
  <div class="w3-container" style="padding:128px 16px" id="team">
    <h3 class="w3-center">TESTIMONI</h3>
    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card text-center" style="height: 500px">
          <img src="{{ asset('assets/image/t1.jpg') }}" alt="John" style="height: 200px; width: auto">
          <div class="w3-container">
            <h3>Tasya Farasya</h3>
            <p class="w3-opacity">Selebgram</p>
            <p>"Psikolog sangat baik, bisa memposisikan dan memahami apa yang dirasa, apa yang menjadi masalah tanpa menyinggung ataupun menjudge".</p>
          </div>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card text-center" style="height: 500px">
          <img src="{{ asset('assets/image/t2.jpg') }}" alt="Jane" style="height: 200px; width: auto">
          <div class="w3-container">
            <h3>Clarissa Putri</h3>
            <p class="w3-opacity">Selebgram</p>
            <p>"Psikolog bisa berhasil menarik aku yang keras kepala ini dari jalan buntu, dan kembali ke jalan utama, jadi lebih bisa melihat masalah dari sisi yang sangat berbeda".</p>
          </div>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card text-center" style="height: 500px">
          <img src="{{ asset('assets/image/t3.jpg') }}" alt="Mike" style="height: 200px; width: auto">
          <div class="w3-container">
            <h3>Rachel Vennya</h3>
            <p class="w3-opacity">Selebgram</p>
            <p>"Berkonsultasi dengan psikolognya begitu nyaman, saat saya bercerita psikolognya mendengarkan saya dengan baik dan psikolognya juga memberikan worksheet yang sangat membantu untuk mengurangi kebiasaan buruk saya".</p>
          </div>
        </div>
      </div>
      <div class="w3-col l3 m6 w3-margin-bottom">
        <div class="w3-card text-center" style="height: 500px">
          <img src="{{ asset('assets/image/t4.jpg') }}" alt="Dan" style="height: 200px; width: auto">
          <div class="w3-container">
            <h3>Keanu Agl</h3>
            <p class="w3-opacity">Selebgram</p>
            <p>"Psikolog sangat baik, karena bisa memposisikan dan memahami apa yang dirasa, apa yang menjadi masalah tanpa menyinggung ataupun menjudge. Pokoknya, nyaman banget sharingnya".</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <div class="w3-container w3-padding-64 w3-center" id="team">
    <h2>OUR TEAM</h2>
    <p>Meet the team who build this web</p>
    
    <div class="w3-row"><br>
    
    <div class="w3-quarter">
      <img src="{{ asset('assets/image/yola.jpeg') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Yolanda Hafitzhah</h3>
      <p>1202190057</p>
    </div>
      
    <div class="w3-quarter">
      <img src="{{ asset('assets/image/salsa.jpeg') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Salsabila Safitri</h3>
      <p>1202194217</p>
    </div>

    <div class="w3-quarter">
      <img src="{{ asset('assets/image/PasFoto.jpeg') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Nisrina Hanifah Salsabila</h3>
      <p>1202194306</p>
    </div>
    
    <div class="w3-quarter">
      <img src="{{ asset('assets/image/ninis.jpg') }}" alt="Boss" style="width:45%" class="w3-circle w3-hover-opacity">
      <h3>Nisrina Riznawati</h3>
      <p>1202194326</p>
    </div>
    
    </div>
    </div>

@endsection