@extends('admin.main')

@section('title')
<title>Test</title>
@endsection

@section('style')
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{asset('admin/soccer-field/soccer-field-players-positions/demo/css/soccerfield.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="asset('admin/soccer-field/soccer-field-players-positions/demo/css/soccerfield.default.min.css')" />
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="asset('admin/soccer-field/soccer-field-players-positions/demo/js/jquery.soccerfield.min.js')"></script>
@endsection

@section('content')

        <script type="text/javascript">
            //Soccer players data. Could be set as a variable or loaded from server
            var data = [
                {name: 'KEYLOR NAVAS', position: 'C_GK'},
                {name: 'MARCELO', position: 'LC_B'},
                {name: 'SERGIO RAMOS', position: 'C_B'},
                {name: 'CARVAJAL', position: 'RC_B'},
                {name: 'CASEMIRO', position: 'C_DM'},
                {name: 'KROOS', position: 'L_M'},
                {name: 'ISCO', position: 'LC_M'},
                {name: 'ASENSIO', position: 'RC_M'},
                {name: 'MODRIC', position: 'R_M'},
                {name: 'RONALDO', position: 'LC_F'},
                {name: 'BENZEMA', position: 'RC_F'},
            ];
            $(document).ready(function () {
                var options =  {
            field: {
                width: "960px",
                height: "600px",
                img: 'img/soccerfield_green.png',
                startHidden: true,
                animate: true,
                fadeTime: 1000,
                autoReveal:true,
                onReveal: function () {

                }
            },
            players: {
                font_size: 12,
                reveal: true,
                sim: false,
                timeout: 1000,
                fadeTime: 2000,
                img: 'img/soccer-player.png',
                onReveal: function () {
                    alert("players revealed!");
                }
            }
        };
        $("#soccerfield").soccerfield(data,options);
            });
        </script>
        <style>
        h1 { margin: 150px auto 30px auto; }
        body { font-family: 'Roboto'; }
    </style>
    </head>

<body>
<!-- <div id="jquery-script-menu">
    <div class="jquery-script-center">
        <ul>
            <li><a href="https://www.jqueryscript.net/chart-graph/Soccer-Field-Players-Positions.html">Download This Plugin</a></li>
            <li><a href="https://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
        </ul>
        <div class="jquery-script-ads">
            <script type="text/javascript">
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                
            </script>
            <script type="text/javascript"
            src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script>
        </div>
        <div class="jquery-script-clear"></div>
    </div>
</div> -->
        <h1>Soccer Field Diagram Demo</h1>
        <div id="soccerfield">

        </div>
    </body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
@endsection
