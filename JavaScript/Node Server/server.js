let http = require('http');
let mainHandler = require('./handlers/main-handler');

let serverPort = 8080;

let server = http.createServer(function (req, res) {
	mainHandler(req, res);
});

server.listen(serverPort);

console.log(`listening on port ${serverPort}`);