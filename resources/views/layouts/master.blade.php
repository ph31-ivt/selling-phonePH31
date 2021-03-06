<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CellPhone</title>

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('front_end/dist/css/bootstrap.min.css')}}">
{{--    <script src="{{asset('front_end/dist/js/bootstrap.min.js')}}"></script>--}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front_end/fontawesome/css/all.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset('front_end/css/header.css')}}">
</head>
<body>
<div class="containers">
    @include('layouts.header')

    @yield('sidebar')

    <div id="main" class="">

        @yield('content')

    </div>

    @include('layouts.footer')
</div>
</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<script>


    $(function () {
        var path = "{{ route('autocomplete') }}";
        var searchByName = new Bloodhound({
            remote: {
                url: path+'?query=%QUERY%',
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('query'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });

        $(".search-input").typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, [
            {
                source: searchByName.ttAdapter(),
                name: 'key',
                display: function(data) {
                    return data.name;
                },
                templates: {
                    header: [
                        '<div class="list-group search-results-dropdown smsearch"></div>'
                    ],
                    suggestion: function (data) {
                        return '<div class="list-group-item resultsearch"><a href="/product/' + data.id +'">' +
                            '<img id="imgsearch" src="/storage/'+data.images[0].url+'" alt="">' +
                            '<div class="titlesearch"> <h3 id="tlsearch">' + data.name + '</h3>' +
                            '<p class="prsearch">' + data.price + '</p></div>' +
                             +'</a></div>';
                    }
                }
            }
        ]);
    });
    // $(document).ready(function () {
    //
    //     $('.form-control > .search-input > .tt-hint').addClass('custom-width');
    //     $('.form-control > .search-input > .tt-input').addClass('custom-width');
    //
    // })
</script>
