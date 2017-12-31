let fs = require('fs');
let TemplateParser = require('../utilities/template-parser');
let UserDB = require('../db/user-db');
let userDb = new UserDB();

let UsersController = {
	all: () => {
		let html = fs.readFileSync('./views/users/all.html').toString();
		var allUsers = userDb.getAllUsers();

		return TemplateParser.parseView({
			users: allUsers
		}, html);
	},
	add: (user) => {
		if (user) {
			userDb.insertUser(user);
			UsersController.response.writeHead(301, {'Location' : '/users/all'});
			UsersController.response.end();
		}

		let html = fs.readFileSync('./views/users/add.html').toString();

		return TemplateParser.parseView({}, html);
	}
};

module.exports = UsersController;