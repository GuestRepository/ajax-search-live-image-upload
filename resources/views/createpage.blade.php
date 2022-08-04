<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <!-- card open -->
                <div class="card shadow p-3">
                    <div class="card-body">
                        <!-- form open -->
                        <form action="{{ route('createpage.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label>Image Title</label>
                                <input type="text" class="form-control" name="image_title">
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <!-- form close -->
                    </div>
                </div>
                <!-- card close -->
            </div>
            <div class="col-md-6 shadow">
                <input type="text" name="manual_filter_table" id="manual_filter_table" class="form-control" placeholder="search keyword..">
                <!-- value open -->
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>image title</th>
                            <th>image</th>
                        </tr>
                    </thead>
                    <tbody>
                       @include('paginated')
                    </tbody>
                </table>
                
                {{$pages->links('pagination::bootstrap-4')}}

            </div>
        </div>
    </div>


</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function image_filter(){
        manual_filter = $('#manual_filter_table').val();
        $.ajax({
            url:"{{url ('createfilter_image')}}?manual_filter_table="+manual_filter,
            success:function(data){
                $('#myTable tbody').html();
                $('#myTable tbody').html(data);
                $("#myTable tbody tr").css("color", "green");
            }
        })
    }

    $(document).on('keyup','#manual_filter_table',function(){
        image_filter();
        
    });
</script>
