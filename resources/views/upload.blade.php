<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >

    <title>CSV Upload</title>
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h1 class="text-center">Upload CSV Files</h1>

            <div class="card">
                <div class="card-header">Upload Form</div>
                <div class="card-body">

                    @if($errors->all())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                {{ $message }}<br>
                            @endforeach
                        </div>
                    @endif

                    <form method="post" action="/" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="organization">Organization</label>
                            <select name="organization" id="organization" class="form-control" required>
                                <option value="">Select Organization</option>
                                @if(!empty($organizations))
                                    @foreach($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                    @endforeach    
                                @endif    
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Select File</label>
                            <input type="file" name="upload_file" id="upload_file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <hr>

                    <form action="/download" method="get">
                        <input type="hidden" name="organizationID" id="organizationID">
                        <button class="btn btn-success" id="template" type="submit">Get Template</button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function () {

        $('#template').click(function () {

            if ($('#organization').val())
            {
                $('#organizationID').val($('#organization').val());
            }
            else
            {
                alert("Please select organization to get template");
            }

        });
    });
</script>
</body>
</html>