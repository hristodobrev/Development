<!DOCTYPE html>
<html>
<head>
	<title>WebSockets MFS!</title>
</head>
<body>
<ul id="message-list">
</ul>
<input type="text" id="message">
<button id="send">Send</button>
<script type="text/javascript">
	(function(){
		var ws = new WebSocket('ws://localhost:999');
		ws.onmessage = function(e) {
			var li = document.createElement('li');
			li.innerText = e.data;
			document.getElementById("message-list").append(li);
			console.log(e.data)
		}
		
		document.getElementById('message').onkeydown = function(e){
			if (e.keyCode == 13) {
				send();
			}
		};
		
		document.getElementById('send').onclick = function(){
			send();
		};
		
		function send() {
			var msgInput = document.getElementById('message');
			var msg = msgInput.value;
			msgInput.value = '';
			var li = document.createElement('li');
			li.innerText = msg;
			document.getElementById("message-list").append(li);
			ws.send(msg);
		}
	})();
</script>
</body>
</html>