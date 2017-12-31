<main class="container">
	<ul id="errors">
		
	</ul>
	<button id="get-users">Get Users</button>
	<ul id="users">
		
	</ul>
	<p>Add User</p>
	<p><input type="text" id="username" /></p>
	<p><input type="password" id="password" /></p>
	<p><button type="submit" id="add">Add User</button></p>
	<script type="text/javascript">
	$(function() {
		$('#add').click(function(){
			$.ajax({
				url: '/api-test/users/add',
				method: 'POST',
				data: {
					username: $('#username').val(),
					password: $('#password').val()
				}
			}).then(function(){
				getUsers();
			});
		});

		$('#get-users').click(getUsers);

		function getUsers() {
			$.ajax({
				url: '/api-test/users/all',
				method: 'POST'
			}).then(function(response){
				$('#users').empty();
				var users = JSON.parse(response);
				for (var i = 0; i < users.length; i++) {
					var user = users[i];
					$('#users').append($(`<li>${user.id} ${user.username}</li>`));
				}
			}, function(error){
				$('#errors').append($('<li>' + error.statusText + '</li>'));
				$('#errors').show();

				setTimeout(function(){
					$('#errors').hide();
					$('#errors').empty();
				}, 2000);
			});
		}
	});
	</script>
</main>