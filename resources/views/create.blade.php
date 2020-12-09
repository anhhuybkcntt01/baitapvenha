<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .require {
            color: #666;
        }

        label small {
            color: #999;
            font-weight: normal;
        }
    </style>
    <title>Create Post</title>
</head>
<body>
<div class="container">
    @if(session('message'))
        <div class="alert alert-danger">
                {{session('message')}}
        </div>
    @endif
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <h1>Create post</h1>

            <form action="{{route('post.store')}}" method="POST">
                @csrf
                <div class="form-group has-error">
                    <label for="slug">Slug <span class="require">*</span> <small>(This field use in url
                            path.)</small></label>
                    <input type="text" class="form-control" name="slug"/>
                    <span class="help-block">Field not entered!</span>
                </div>

                <div class="form-group">
                    <label for="title">Title <span class="require">*</span></label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="description"></textarea>
                </div>

                <div class="form-group">
                    <p><span class="require">*</span> - required fields</p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                    <button class="btn btn-default">
                        Cancel
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>
