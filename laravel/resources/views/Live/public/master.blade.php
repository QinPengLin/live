<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{URL::asset('favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Live</title>


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link href="{{URL::asset('/live/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('/live/css/hipster_cards.css')}}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{URL::asset('/live/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display|Raleway:700,100,400|Roboto:400,700|Playfair+Display+SC:400,700' rel='stylesheet' type='text/css'>
    @yield('after-styles-end')
</head>
<body>
@yield('content')
</body>

<script src="{{URL::asset('/live/js/jquery-1.10.2.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/live/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('/live/js/hipster-cards.js')}}"></script>

<!--  Just for demo	 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.1/masonry.pkgd.min.js"></script>

<script>

    $().ready(function(){

        var $container = $('.masonry-container');

        doc_width = $(document).width();

        if (doc_width >= 768){
            $container.masonry({
                itemSelector        : '.card-box',
                columnWidth         : '.card-box',
                transitionDuration  : 0
            });
        } else {
            $('.mas-container').removeClass('mas-container').addClass('row');
        }
    });
</script>
@yield('after-scripts-end')

</html>