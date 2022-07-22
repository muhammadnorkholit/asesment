<title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Poppins:wght@300&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;
        }
    </style>

  <div class="container-fluid vh-100 overflow-hidden" >
            <div class="" style="margin-top: 100px">
                <div class="rounded d-flex justify-content-center">
                    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                        <div class="text-center">
                            <h3 class="text-primary">Sign In</h3>
                        </div>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="p-4">
                                <div class="input-group flex-wrap mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="fa fa-user text-white"></i></span>
                                    <input  type="text" class="form-control" value="{{old("username")}}" name="username" placeholder="Username">
                                    @error('username') <small class=" w-100 text-danger">{{$message}}</small>  @enderror
                                </div>
                                  {{-- @error('username')
                                    <small class=" d-block text-danger">{{$message}}</small>   
                                @enderror --}}
                                <div class="input-group flex-wrap mb-3">
                                    <span class="input-group-text bg-primary"><i
                                            class="fa fa-key text-white"></i></span>
                                    <input  type="password" class="form-control" value="" name="password" placeholder="password">
                                    @error('password') <small class=" w-100 text-danger">{{$message}}</small>  @enderror
                                </div>
                                {{-- @error('password')
                                    <small class=" d-block text-danger">{{$message}}</small>   
                                @enderror --}}
                                <button class="  btn btn-primary text-center mt-2" type="submit">
                                    Login
                                </button>
                              
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
