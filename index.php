<!doctype html>
<html>

<head>
    <title>Radar Chart</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Radar Chart</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <link href="https://fonts.googleapis.com/css?family=Dosis&amp;subset=latin-ext" rel="stylesheet">
    
    <style>
        *{
            font-family: 'Dosis', sans-serif;
        }
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        margin-left: 10%;
    }
    
    .modal-body-chart{
        background-color: rgba(229,229,229,0.15);
        background: url(assets/img/modal-body-bg.png) repeat left top;
    }
    @media (max-width: 767px) {
        canvas{
            margin-left: 0;
        }
        #canvascontainer{
            width: 100% !important;
        }
        .modal-body-chart h3{
            padding-top: 20px;
        }
        .modal-body-chart p{
            padding-bottom: 20px;
        }
    }
    </style>
</head>

<body>
    
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Radar Chart
    </button>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">
                <select id="slctIlce" name="slctIlce" class="form-control">
                </select>
            </h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-md-8 ">
                      <div id="canvascontainer" style="width:80%">
                        <canvas id="canvas"></canvas>
                    </div>
                  </div>
                  <div class="col-md-4 modal-body-chart">
                        <h3 id="baslik" style="font-size: 28px;"></h3>
                        <p id="aciklama" style="font-size: 20px;"></p>
                  </div>
              </div>
              <div class="row">
                  
              </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <script>
        $(document).ready(function(){
            $.ajax({
                dataType: 'json',
                url: 'http://localhost/mahallemistanbul/radarchart/api/',
                success: function(json){
                    for(var i=0; i<json.length; i++){
                        $('#slctIlce').append('<option value="'+json[i].id+'">'+json[i].ilce+'</option>');
                    }
                    
                    $.ajax({
                        dataType: 'json',
                        url: 'http://localhost/mahallemistanbul/radarchart/api/?id=' + json[0].id, //+ $('#slctIlce').val(),
                        success: function(jsonvalue){
                            var color = Chart.helpers.color;
                            var config = {
                                type: 'radar',
                                data: {
                                    labels: ["Rekabet", "Demografik Yapı", "Eğitim Altyapısı", "Sosyal Yaşam", "Sağlık", "Ekonomik Kapasite", "Ticari Hayat/Girişimcilik", "Finansal Yapı", "Turizm", "Altyapı", "Ulaşım"],
                                    datasets: [ {
                                        label: jsonvalue[0].ilce,
                                        backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                                        borderColor: window.chartColors.blue,
                                        pointBackgroundColor: window.chartColors.blue,
                                        data: [
                                            jsonvalue[0].rekabet,
                                            jsonvalue[0].demografikyapi,
                                            jsonvalue[0].egitimaltyapisi,
                                            jsonvalue[0].sosyalyasam,
                                            jsonvalue[0].saglik,
                                            jsonvalue[0].ekonomikkapasite,
                                            jsonvalue[0].ticarihayatgirisimcilik,
                                            jsonvalue[0].finansalyapi,
                                            jsonvalue[0].turizm,
                                            jsonvalue[0].altyapi,
                                            jsonvalue[0].ulasim

                                        ]
                                    },{
                                        label: "Average",
                                        backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                                        borderColor: window.chartColors.red,
                                        pointBackgroundColor: window.chartColors.red,
                                        data: [
                                            40.99,
                                            44.49,
                                            50.33,
                                            24.67,
                                            62.38,
                                            37.38,
                                            29.83,
                                            40.06,
                                            22.85,
                                            64.08,
                                            50.64

                                        ]
                                    },{
                                        label: "Maximum",
                                        backgroundColor: color(window.chartColors.yellow).alpha(0.2).rgbString(),
                                        borderColor: window.chartColors.yellow,
                                        pointBackgroundColor: window.chartColors.yellow,
                                        data: [
                                            65.63,
                                            75.73,
                                            72.73,
                                            69.35,
                                            88.79,
                                            73.42,
                                            71.50,
                                            85.13,
                                            71.46,
                                            83.24,
                                            98.38

                                        ]
                                    }]
                                },
                                options: {
                                    legend: {
                                        position: 'bottom',
                                    },
                                    title: {
                                        display: false,
                                        text: ''
                                    },
                                    scale: {
                                        xAxes: [{
                                            display: false
                                          }],
                                          yAxes: [{
                                            display: false
                                          }],
                                        ticks: {
                                          beginAtZero: true
                                        }
                                    },
                                }
                            };
                            
                            window.myRadar = new Chart(document.getElementById("canvas"), config);
                            $('#baslik').html(jsonvalue[0].ilce + ' at a Glance');
                            $('#aciklama').html(jsonvalue[0].aciklama)
                        }
                    });
                }
            });
        });
        
        $('#slctIlce').on('change', function(){
            $.ajax({
                dataType: 'json',
                url: 'http://localhost/mahallemistanbul/radarchart/api/?id=' + $('#slctIlce').val(),
                success: function(json){
                    var color = Chart.helpers.color;
                    var config = {
                        type: 'radar',
                        data: {
                            labels: ["Rekabet", "Demografik Yapı", "Eğitim Altyapısı", "Sosyal Yaşam", "Sağlık", "Ekonomik Kapasite", "Ticari Hayat/Girişimcilik", "Finansal Yapı", "Turizm", "Altyapı", "Ulaşım"],
                            datasets: [ {
                                label: json[0].ilce,
                                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                                borderColor: window.chartColors.blue,
                                pointBackgroundColor: window.chartColors.blue,
                                data: [
                                    json[0].rekabet,
                                    json[0].demografikyapi,
                                    json[0].egitimaltyapisi,
                                    json[0].sosyalyasam,
                                    json[0].saglik,
                                    json[0].ekonomikkapasite,
                                    json[0].ticarihayatgirisimcilik,
                                    json[0].finansalyapi,
                                    json[0].turizm,
                                    json[0].altyapi,
                                    json[0].ulasim

                                ]
                            },{
                                label: "Average",
                                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                                borderColor: window.chartColors.red,
                                pointBackgroundColor: window.chartColors.red,
                                data: [
                                    40.99,
                                    44.49,
                                    50.33,
                                    24.67,
                                    62.38,
                                    37.38,
                                    29.83,
                                    40.06,
                                    22.85,
                                    64.08,
                                    50.64

                                ]
                            },{
                                label: "Maximum",
                                backgroundColor: color(window.chartColors.yellow).alpha(0.2).rgbString(),
                                borderColor: window.chartColors.yellow,
                                pointBackgroundColor: window.chartColors.yellow,
                                data: [
                                    65.63,
                                    75.73,
                                    72.73,
                                    69.35,
                                    88.79,
                                    73.42,
                                    71.50,
                                    85.13,
                                    71.46,
                                    83.24,
                                    98.38

                                ]
                            }]
                        },
                        options: {
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: false,
                                text: ''
                            },
                            scale: {
                                xAxes: [{
                                    display: false
                                  }],
                                  yAxes: [{
                                    display: false
                                  }],
                                ticks: {
                                  beginAtZero: true
                                }
                            },
                        }
                    };
                    window.myRadar.destroy();
                    window.myRadar = new Chart(document.getElementById("canvas"), config);
                    $('#baslik').html(json[0].ilce + ' at a Glance');
                    $('#aciklama').html(json[0].aciklama)
                }
            });
            
        });
        
    </script>
</body>

</html>
