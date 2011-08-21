	<h1>User Access <small> Create user accounts for access to Codeita.</small></h1>

	<div id="error" style="display:none;" class="alert-message error"></div>
	<form id="user-new-form" action="">	
	<h4>Add User</h4>
	<div class="row" style="background:#f0f0f0;padding: 15px;">
		<div class="span6 columns">
			Username<br /><br />
			<input type="text" id="username" />
		</div>
		<div class="span6 columns">
			Password<br /><br />
			<input type="password" id="userpass" />
		</div>
		<div class="span2 columns">
			<br /><br />
			<input type="submit" class="btn small" value="Add User" />
		</div>
	</div>
	</form>

	<table>
		<thead>
			<tr>
				<th>Username</th>
				<th>Password</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody id="curusers">
			
		</tbody>
	</table>
	<br />

	<a href="setup" class="btn large">&laquo; Back</a>
	<a href="#" id="saveBtn" onclick="createConfig(this); return false;" class="disabled btn primary large">Continue</a>
	
	<script>
		var users = new Object();
		$("#user-new-form").submit(function(){
			var user = $("#username").val();
			var pass = $("#userpass").val();
			if(user.length == 0){
				$("#username").focus();
				return false;
			}
			if(pass.length == 0){
				$("#userpass").focus();
				return false;
			}
			var passmask = '';
			for(var i=0;i<pass.length;i++){
				passmask += '&#149;'; 
			}
			if(users[user]){
				$("#error").html("<p>That username has already been added.</p>");
				$("#error").fadeIn();
				return false;
			}
			users[user] = pass;
			var html = '<tr id="user-row-'+user+'"><td>'+user+'</td><td>'+passmask+'</td><td><a href="#" onclick="removeUser(\''+user+'\');">Remove</a></tr>';
			$("#curusers").append(html);
			$("#username").val('').focus();
			$("#userpass").val('');
			
			$("#saveBtn").removeClass('disabled');

			return false;
		});
		function removeUser(key){
			$("#user-row-"+key).fadeOut(function(){
				$("#user-row-"+key).remove();
			});			
			delete users[key];
			var objCount=0;
			for(_obj in users) objCount++;
			if(objCount == 0){
				$("#saveBtn").addClass('disabled');
			}
			return false;
		}
		function createConfig(btn){
			if($(btn).hasClass('disabled')){
				//alert(Object.size(length));
				return false;
			}else{
				//alert(JSON.stringify(users));
				$.post('src/setup/create-config.php',{users:users},function(d){
					if(d == '0'){
						$("#error").html("<p>Unable to write to <code>data/</code> directory!</p>");
						$("#error").fadeIn();
					}else{
						window.location = 'index';
					}
				});
			}
		}
	</script>