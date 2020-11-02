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
            <div class="col-10">
                <br>
                <h4>Edit Post</h4>
                <br>
                <form method="post" enctype="multipart/form-data" action="{{ route('updateEntry')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$desc->id}}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="{{$desc->EntryTitle}}" name="entryTitle">
                        <br>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="5" id="description"
                            name="description">{{$desc->Description}}</textarea>
                        <br>
                    </div>

                    <div class="form-group col-md-6" style="padding: 0">
                        <label>Upload Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-secondary btn-file">
                                    Browse… <input type="file" name="image" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <br>
                        <img id='img-upload' src="/uploads/entry/{{$desc->Image}}"/>
                    </div>

                    <button type="submit" class="btn btn-secondary float-right">Update Entry</button><br><br>
                </form>
            </div>
            <div class="col-1"></div>

        </div>
    </div>

</body>

</html>