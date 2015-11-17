    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/docs/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS3 -->
    <link href="{{ asset("/docs/dist/css/custom.css")}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme styles -->
    <link href="{{ asset("/docs/dist/css/AdminLTE.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/docs/dist/css/skins/skin-green.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS3 -->
    <link href="{{ asset("/docs/dist/css/custom.css")}}" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/moment/min/moment.min.js"></script>
    <script src="/fullcalendar/dist/fullcalendar.js"></script>
    <script src='/fullcalendar/dist/lang/nl.js'></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script type="text/javascript">
    $('#calendar').fullCalendar({
        dayClick: function(date, jsEvent, view) {

            alert('Clicked on: ' + date.format());

            alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

            alert('Current view: ' + view.name);

            // change the day's background color just for fun
            $(this).css('background-color', 'red');

        }
    });
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
