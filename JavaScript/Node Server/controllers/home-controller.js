let fs = require('fs');
let TemplateParser = require('../utilities/template-parser');

let HomeController = {
	index: () => {
		let html = fs.readFileSync('./views/home/index.html').toString();

		return TemplateParser.parseView({
			test: {
				id: 35252,
				description: 'This is some test message to see whether the template parser works correctly.',
				status: 'info'
			}
		}, html);
	}
};

module.exports = HomeController;