<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>blog</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <?php include("navbar.php"); ?>

    <div class="container extra">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10" id="pname">
                <br>
                @foreach ($completeBlog as $entry)
                <div class="card">
                    <div class="card-header" style="text-align: right">
                        {{$entry->created_at->format('l jS F Y\, h:i:s A')}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3 mx-auto text-center">
                                <img src="{{asset('uploads/entry/'. $entry->Image)}}" alt="Image" width="100%">
                            </div>
                            <div class="col-9">
                                <h5 class="card-title">{{$entry->EntryTitle}}</h5>
                                <p class="card-text multi-line-truncate">{{$entry->Description}}</p>
                                <a href="/entry/{{$entry->id}}" class="btn btn-secondary float-right">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>

            <div class="col-1"></div>
        </div>
    </div>
</body>

</html>