<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>blog</title>
    <link rel="stylesheet" href="/style.css" type="text/css">
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
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4>{{$desc->EntryTitle}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h6 style="text-align: right">{{$desc->created_at->format('l jS F Y')}}</h6>
                                <h6 style="text-align: right">{{$desc->created_at->format('h:i:s A')}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="mx-auto text-center">
                            <img src="{{asset('uploads/entry/'. $desc->Image)}}" alt="Image" height="300">
                        </div>
                        <br>
                        <p>{{$desc->Description}}</p>
                        @if($desc->created_at != $desc->updated_at)
                        <br>
                        <p style="font-style: italic; text-align: right; color: green;">Updated on
                            {{$desc->updated_at->format('l jS F Y h:i:s A')}}</p>

                        @endif
                    </div>
                </div>
                <br>
                <a href='/entry/delete/{{$desc->id}}' class="btns btn btn-secondary float-right"><i
                        class="fas fa-trash-alt"></i> Delete Entry</a>
                <a href='/entry/edit/{{$desc->id}}' class="btns btn btn-secondary float-right"
                    style="margin-right: 2%"><i class="fas fa-pencil-alt"></i> Edit Entry</a>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>

</html>