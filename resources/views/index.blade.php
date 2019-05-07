<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <title>List of User</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">User Database CRUD App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/phones')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/phones/create')}}">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://sitinabila.atwebpages.com">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>
    </div>
        
    <main role="main" class="flex-shrink-0">
        <div class="container">
        @if(session('message'))
          {{(session('message'))}}
          @endif
            <h1>List of User</h1>
            @if(count($users)>0)
            <table class="table table-striped table-hover">
            </table>
            @else
            <p>No Record.Please add one</p>
            @endif
               <!--  <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead> -->
                <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{ $user -> name}}</td>
                    <td>{{ $user -> phone}}</td>
                    <td>
                        <a href="{{url('/')}}/phones/{{$user->id}}"><button class="btn btn-primary btn-sm">View</button></a>
                        <a href="{{url('/')}}/phones/{{$user->id}}/edit"><button class="btn btn-primary btn-sm">Edit</button></a>
                        <form action="{{url('/phones')}}/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-primary btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
      
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2019 | <a href="http://sitinabila.atwebpages.com">Bella.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>