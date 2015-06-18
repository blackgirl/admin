<div class="container" id="LoginPage">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="form-wrapper">
        <form  id="loginForm" action="index.php?route=auth" method="post">
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input class="form-control" name="login" placeholder="login" type="text"/>          
          </div>
          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input class="form-control" name="password" placeholder="password" type="password"/>     
          </div>
          <div class="checkbox">
          </div>
          <div class="form-group">
            <button type="submit" name="enter" class="btn btn-block btn-login pull-right">Login <span class="fa fa-long-arrow-right"></span></button>
          </div>
          <div class="form-group text-center">
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>