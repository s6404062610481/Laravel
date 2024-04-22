<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Company</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <h2>Edit Company</h2>
            </div>
            <div>
                <a href="{{ route('companies.index') }}" class="btn btn-success">Back</a>
            </div>
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('companies.update', $company->id)}}" method="post" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12  mt-2">
                        <div class="form-group">
                            <strong>Company Name</strong>
                            <input type="text" name='name' value={{$company->name}} class="form-control" placeholder="Company Name">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group   mt-2">
                            <strong>Company Email</strong>
                            <input type="email" name='email' value={{$company->email}}  class="form-control" placeholder="Company Email">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Company Address</strong>
                            <input type="text" name='address' value={{$company->address}}  class="form-control" placeholder="Company address">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>