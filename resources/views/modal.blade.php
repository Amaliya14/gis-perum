 <!--*********************************************************************************************************-->
    <!--************ Modal *************************************************************************************-->
  <!-- Modal -->
  <!-- Modal HTML -->
  <div id="modalLoginForm" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="adminlte/dist/img/animasi-rumah.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Login</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
			    <form method="POST" action="{{route('users.login')}}">
         @csrf    
                <div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				Belum memiliki akun ? Register<a href="#" data-toggle="modal" data-target="#modalRegisterForm" data-dismiss="modal">di sini</a>
			</div>
		</div>
	</div>
</div> 
    
<div id="modalRegisterForm" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="adminlte/dist/img/animasi-rumah.png" alt="Avatar">
				</div>				
				<h4 class="modal-title">Register</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="{{route('users.register')}}" method="post">
                    @csrf
					<div class="form-group">
						<input type="text" class="form-control" name="nama" placeholder="Nama" required="required">		
                    </div>
                    <div class="form-group">
						<input type="text" class="form-control" name="email" placeholder="Email" required="required">		
                    </div>
                    <div class="form-group">
						<input type="text" class="form-control" name="alamat" placeholder="Alamat" required="required">		
                    </div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Register</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
            sudah memiliki akun ? login<a href="#" data-toggle="modal" data-target="#modalLoginForm" data-dismiss="modal">di sini</a>
			</div>
		</div>
	</div>
</div> 
    
    <!--*********************************************************************************************************-->
    