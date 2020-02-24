
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Giriş</h5>
            <form class="form-signin" action="" method="POST">
              @csrf
              <div class="form-label-group">
                <input type="text" name="name" id="inputName" class="form-control" placeholder="Username" required autofocus>
                <label for="inputName">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Şifre" required>
                <label for="inputPassword">Şifre</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase"  name="login" type="submit">Giriş</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
