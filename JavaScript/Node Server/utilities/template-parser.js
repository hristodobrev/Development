let fs = require('fs');

function parseView(variables, html) {
	html = html.replace(/\s+/g, ' ');
	html = replaceHeader(html);
	html = replaceGlobalVariables(variables, html);
	html = replaceForCycles(variables, html);

	return html;
}

function replaceHeader(html) {
	let headerHtml = fs.readFileSync('./views/_layout/header.html').toString();
	let headerRegex = new RegExp('{{\\s*header\\s*}}');
	let match;
	while (match = headerRegex.exec(html)) {
		html = html.replace(match[0], headerHtml);
	}

	return html;
}

function replaceForCycles(variables, html) {
	let forRegex = new RegExp('{%\\s*?for\\s*?\\((.+?)in(.+?)\\)\\s*%}(.+?){%\\s*?endfor\\s*?%}');
	let match;
	while (match = forRegex.exec(html)) {
		let itemName = match[1].trim();
		let collectionName = match[2].trim();
		let template = match[3];
		let finalTemplate = '';
		let collection = variables[collectionName];
		for (let index in collection) {
			let itemValue = collection[index];
			finalTemplate += replaceLocalVariable(itemName, itemValue, template);
		}

		html = html.replace(match[0], finalTemplate);
	}

	return html;
}

function replaceLocalVariable(itemName, itemValue, template) {
	eval('var ' + itemName + ' = itemValue');

	let match;
	while (match = /{%\s*(.+?)\s*%}/g.exec(template)) {
		let itemExpression = match[1];

		template = template.replace(match[0], eval(itemExpression));
	}

	return template;
}

function replaceGlobalVariables(variables, template) {
	let regex = new RegExp('{{\\s*(.+?)\\s*}}', 'g');

	for (let variableName in variables) {
		eval('var ' + variableName + ' = variables[variableName];');
	}

	let match;
	while (match = /{{\s*(.+?)\s*}}/g.exec(template)) {

		let itemExpression = match[1];
		template = template.replace(match[0], eval(itemExpression));
	}

	return template;
}

let TemplateParser = {
	parseView: parseView
};

module.exports = TemplateParser;