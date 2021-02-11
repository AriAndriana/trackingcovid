<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tracking Covid-19</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/landing-page.min.css')}}" rel="stylesheet">

</head>

<body>
  <?php 
    $datapositif = file_get_contents("https://api.kawalcorona.com/positif");
    $positif = json_decode($datapositif, true);
    $datasembuh =file_get_contents("https://api.kawalcorona.com/sembuh");
    $sembuh = json_decode($datasembuh, true);
    $datameninggal = file_get_contents("https://api.kawalcorona.com/meninggal");
    $meninggal = json_decode($datameninggal, true);
    $dataid = file_get_contents("https://api.kawalcorona.com/indonesia");
    $id = json_decode($dataid, true);
    $dataidprovinsi = file_get_contents("https://api.kawalcorona.com/indonesia/provinsi");
    $idprovinsi = json_decode($dataidprovinsi, true);
    $datadunia = file_get_contents("https://api.kawalcorona.com/");
    $dunia = json_decode($datadunia, true);
  ?>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Tracking Covid-19</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 >Corona Virus Disease 2019</h1>
          <h1 class="mb-5" style="align-items: center;">(COVID-19)</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <p class="lead mb-0">Detail mengenai pandemi coronavirus yang mewabah di seluruh dunia</p>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-danger img-card box-primary-shadow">
          <div class="card-body">
            <div class="d-flex">
              <div class="text-white">
                <p class="text-white mb-0">TOTAL POSITIF</p>
                <h2 class="mb-0 number-font"><?php echo $positif['value'] ?></h2>
                <p class="text-white mb-0">ORANG</p>
              </div>
              <div class="ml-auto"> <img src="{{asset('/img/sad-u6e.png')}}" width="50" height="50" alt="Positif"> </div>
            </div>
          </div>
        </div>
      </div><!-- COL END -->
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card bg-success img-card box-secondary-shadow">
          <div class="card-body">
            <div class="d-flex">
              <div class="text-white">
                <p class="text-white mb-0">TOTAL SEMBUH</p>
                <h2 class="mb-0 number-font"><?php echo $sembuh['value'] ?></h2>
                <p class="text-white mb-0">ORANG</p>
              </div>
              <div class="ml-auto"> <img src="{{asset('/img/happy-ipM.p')}}ng" width="50" height="50" alt="Positif"> </div>
            </div>
          </div>
        </div>
      </div><!-- COL END -->
      <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card  bg-secondary img-card box-success-shadow">
          <div class="card-body">
            <div class="d-flex">
              <div class="text-white">
                <p class="text-white mb-0">TOTAL MENINGGAL</p>
                <h2 class="mb-0 number-font"><?php echo $meninggal['value'] ?></h2>
                <p class="text-white mb-0">ORANG</p>
              </div>
              <div class="ml-auto"> <img src="{{asset('/img/emoji-LWx.png')}}" width="50" height="50" alt="Positif"> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="showcase">
        
      </div>
      &nbsp;
      <!-- Image Showcases -->
    <div class="container-fluid" style="padding-top: 20px;">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-sm-12 col-md-6 col-lg-8 col-xl-5">
          <div class="card  bg-warning img-card box-success-shadow" style="padding: 20px;">
            <div class="card-body">
              <div class="d-flex">
                <div class="text-white">
                  <h2 class="mb-0 number-font">INDONESIA</h2>
                  <p class="text-white mb-0">
                    <?php 
                      echo $id[0]['positif']
                    ?>
                    &nbsp; POSITIF, &nbsp;
                    <?php
                     echo $id[0]['sembuh'] 
                    ?>
                    &nbsp;SEMBUH, &nbsp;
                    <?php
                      echo $id[0]['meninggal']
                    ?>
                    &nbsp;MENINGGAL
                  </p>
                </div>
                <div class="mr-auto" style="padding-left: 45px;"> <img src="{{asset('/img/indonesia-PZq.png')}}" width="60" height="60" alt="Positif"> </div>
              </div>
            </div>
          </div>
        </div><!-- COL END -->
      </div>
    </div>
  </div>
  &nbsp;
  <section class="showcase">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1"></div>
      <div class="col-lg-10">
        <div class="card">
          <div class="card-header">Data Kasus Coronavirus Berdasarkan Provinsi</div>
          <div class="card-body">
            <div style="height:600px;overflow:auto;margin-right:15px;">
            <table class="table table-striped">
              <thead>
                <th>No</th>
                <th>Provinsi</th>
                <th>Positif</th>
                <th>Sembuh</th>
                <th>Meninggal</th>
              </thead>
              <tbody>
                @php
                  $no = 1;   
                @endphp
                @foreach ($provinsi as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item->nama_provinsi}}</td>
                      <td>{{$item->Positif}}</td>
                      <td>{{$item->Sembuh}}</td>
                      <td>{{$item->Meninggal}}</td>
                    </tr>
                @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    
  </section>
  &nbsp;  
  <section class="showcase">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
         <div class="card">
               <div class="card-header ">
                 <p class="card-title">Data Kasus Corona virus di Dunia</p>
                </div>
                  <div class="card-body" >
                    <div style="height:600px;overflow:auto;margin-right:15px;">
                      <table class="table table-striped"  fixed-header  >
                      <thead>
                          <tr>
                          <th scope="col">No</th>
                          <th scope="col">Negara</th>
                          <th scope="col">Positif</th>
                          <th scope="col">Sembuh</th>
                          <th scope="col">Meninggal</th>
                          </tr>
                      </thead>
                      <tbody>
  
                      @php
                          $no = 1;    
                      @endphp
                      <?php
                          for ($i = 0; $i <= 191; $i++){
  
                          
                          ?>
                      <tr>
                          <td> <?php echo $i+1 ?></td>
                          <td> <?php echo $dunia[$i]['attributes']['Country_Region'] ?></td>
                          <td> <?php echo $dunia[$i]['attributes']['Confirmed'] ?></td>
                          <td><?php echo $dunia[$i]['attributes']['Recovered']?></td>
                          <td><?php echo $dunia[$i]['attributes']['Deaths']?></td>
                      </tr>
                          <?php 
                      
                      } ?>
                      </tbody>
                    </table>
                  </div>    
                </div>
              </div>     
            </div>
          </div>
    </div>
  </section>
&nbsp;
  <!-- Testimonials -->
  

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ini adalah rekapan data ter update dari situs</h2>
          <h2 class="mb-4"><a class="text-white" href="kawalcorona.com">kawalcorona.com</a></h2>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
         <center> <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2020. All Rights Reserved.</p></center> 
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
