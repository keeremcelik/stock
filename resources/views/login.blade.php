<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">


    <title>@yield('baslik')</title>

</head>
<body>
    @isset($message)
    {{$message}}
    @endisset
    <div class="wrapper" id="wrapper">      
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="loginBox col-lg-4 col-sm-6 col-xs-12">
                        <div class="login-header">
                            <div class="logo">
                                <h1 class="title">STOK <span>v1.0</span></h1>
                                
                            </div>
                        </div>
                        <div class="login-body">                            
                            <div class="form">
                                 <form class="form-signin" action="" method="POST">
                                @csrf
                                <div class="form-label-group">
                                    <label for="inputName">Kullanıcı Adı</label>
                                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Kullanıcı adı" required autofocus>
                                </div>

                                <div class="form-label-group">
                                    <label for="inputPassword">Şifre</label>
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
                                </div>
                                <button class="btn btn-login btn-block"  name="login" type="submit">Giriş</button>
                            </form>
                            </div>
                        </div>
                        <div class="login-footer">
                                              
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>

</body>
</html>