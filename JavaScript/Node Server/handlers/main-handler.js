let fs = require('fs');
let HomeController = require('../controllers/home-controller');
let UsersController = require('../controllers/users-controller');
let PostsController = require('../controllers/posts-controller');
let TemplatesController = require('../controllers/templates-controller');
let qs = require('querystring');

module.exports = function (req, res) {
	try {
		let path = req.url;

		let pathTokens = path.split('/').filter(function(token){
			return token != '';
		});

		let controllerName = pathTokens[0];

		if (controllerName == 'favicon.ico') {
			res.writeHead(200, 'Content-Type', 'fav/icon');
			res.write('');
			res.end();
			return;
		}

		let actionName = pathTokens[1];
		let controller;

		switch (controllerName) {
			case 'home':
				controller = HomeController;
				break;
			case 'posts':
				controller = PostsController;
				break;
			case 'users':
				controller = UsersController;
				break;
			case 'templates':
				controller = TemplatesController;
				break;
			default:
				throw new Error(`Controller ${controllerName} does not exist.`);
				break;
		}

		controller.request = req;
		controller.response = res;

		let html = '';
		if (req.method == 'POST') {
			var body = '';

			req.on('data', function(data) {
				body += data;
			});

			req.on('end', function() {
				let post = qs.parse(body);
				html = controller[actionName](post);
				if (!html) {
				 	throw new Error('Controller action wasn\'t found.');
				 }

				res.writeHead(200, 'Content-Type', 'text/html');
				res.write(html);
				res.end();
				return;
			});
		} else {
			html = controller[actionName]();
			if (!html) {
			 	throw new Error('Controller action wasn\'t found.');
			 }

			res.writeHead(200, 'Content-Type', 'text/html');
			res.write(html);
			res.end();
			return;
		}
		
		// for(let action in controller) {
		// 	if (actionName == action) {
		// 		html = controller[action]();
		// 	}
		// }

		 
	} catch (e) {
		res.writeHead(500, 'Content-Type', 'text/html');
		res.write(e.message);
		res.end();
		return;
	}
};