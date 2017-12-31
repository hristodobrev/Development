let IO = require('../io/io');

class UserDB {
	constructor () {
		this.userFile = 'db-files/users.txt';
	}

	getAllUsers() {
		return JSON.parse(IO.read(this.userFile));
	}

	insertUser(user) {
		if (!this.userExists(user)) {
			var users = this.getAllUsers();
			users.push(user);
			IO.write(JSON.stringify(users), this.userFile);
		}
	}

	userExists(user) {
		var users = this.getAllUsers();

		if (users.filter(function(u){
			return u.name == user.name;
		}).length > 0) {
			return true;
		}

		return false;
	}
}

module.exports = UserDB;