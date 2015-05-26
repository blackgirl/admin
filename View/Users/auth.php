<style>
	/*body{
    background-color: #FFFFE0;
   }*/
   body{
	  background: #fff;
	  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fff', endColorstr='#ccc', GradientType=0);
	  background: -webkit-linear-gradient(to bottom, #fff 50%, #ccc) !important;
	  background: -moz-linear-gradient(to bottom, #fff 50%, #ccc) !important;
	  background: -ms-linear-gradient(to bottom, #fff 50%, #ccc) !important;
	  background: -o-linear-gradient(to bottom, #fff 50%, #ccc) !important;
	  background: linear-gradient(to bottom, #fff 50%, #ccc) !important;
	  color: white;
	}
	.container {
		position:absolute;
top:0;
/* left:0; */
/* right:0; */
/* bottom:0; */
z-index:9;
background: #fff;
padding:0;
/* margin:0; */
width:100%;
	}
	div.well{
	  height: 250px;
	} 

	.Absolute-Center {
	  margin: auto;
	  /*position: absolute;*/
	  top: 0; left: 0; bottom: 0; right: 0;
	}

	.Absolute-Center.is-Responsive {
	  width: 50%; 
	  height: 50%;
	  min-width: 200px;
	  max-width: 400px;
	  padding: 40px;
	}

	#logo-container{
	  margin: auto;
	  margin-bottom: 10px;
	  width:70px;
	  height:100px;
	  background-image:url('../img/logo_big.png');
	}
</style>
	
<!-- <center>
	<form style="margin:0 auto; width:350px" action="index.php?route=auth" method="post">
	<input name="login" placeholder="login" type="text">
	<input name="password" placeholder="password" type="password">
	<input name="enter" type="submit" value="Come in"><br>
</form> -->
<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
      <div id="logo-container"></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
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
            <label>
              <!-- <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a> -->
            </label>
          </div>
          <div class="form-group">
            <button type="submit" name="enter" class="btn btn-success btn-block">Login</button>
          </div>
          <div class="form-group text-center">
            <!-- <a href="#">Forgot Password</a>&nbsp;|&nbsp;<a href="#">Support</a> -->
          </div>
        </form>        
      </div>  
    </div>    
  </div>
</div>