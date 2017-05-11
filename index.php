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
                <select class="form-control">
                    <option>Adalar</option>
                    <option>Üsküdar</option>
                    <option>Ataşehir</option>
                    <option>Kadıköy</option>
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
                      <h3>Comment</h3>
                      <p>Adalar is the 33th place in Istanbul in the competition index. In terms of sub-indices, it is above average in education and infrastructure areas. Demographic structure, social life, health, economic commercial life, financial markets, tourism and transportation are areas where Adalar has below average values. In terms of sub-indices, Adalar is the first place in Istanbul in the education index. But the main reason is that Adalar has the lowest population of Istanbul.</p>
              
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
    
    
    
    <script>

    var color = Chart.helpers.color;
    var config = {
        type: 'radar',
        data: {
            labels: ["Demografik Yapı", "Eğitim Altyapısı", "Sosyal Yaşam", "Sağlık", "Ekonomik Kapasite", "Ticari Hayat/Girişimcilik", "Finansal Yapı", "Turizm", "Altyapı", "Ulaşım"],
            datasets: [ {
                label: "Adalar",
                backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
                borderColor: window.chartColors.blue,
                pointBackgroundColor: window.chartColors.blue,
                data: [
                    34.46,
                    72.73,
                    8.53,
                    29.27,
                    24.42,
                    2.77,
                    23.39,
                    13.17,
                    79.08,
                    21.67

                ]
            },{
                label: "Average",
                backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                borderColor: window.chartColors.red,
                pointBackgroundColor: window.chartColors.red,
                data: [
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

    window.onload = function() {
        window.myRadar = new Chart(document.getElementById("canvas"), config);
    };

    
    </script>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>
