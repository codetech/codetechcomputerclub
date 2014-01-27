/**
 * plugin.js
 *
 * Copyright, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*global tinymce:true */

tinymce.PluginManager.add('insertcode', function(editor) {
	var languages = [
		{name: 'none', type: ''},
		{name: 'Apache', type: 'apache'},
		{name: 'Bash', type: 'bash'},
		{name: 'C#', type: 'cs'},
		{name: 'C++', type: 'cpp'},
		{name: 'CSS', type: 'css'},
		{name: 'Diff', type: 'diff'},
		{name: 'DOS .bat', type: 'dos'},
		{name: 'HTML, XML', type: 'xml'},
		{name: 'HTTP', type: 'http'},
		{name: 'Ini', type: 'ini'},
		{name: 'JSON', type: 'json'},
		{name: 'Java', type: 'java'},
		{name: 'JavaScript', type: 'javascript'},
		{name: 'PHP', type: 'php'},
		{name: 'Perl', type: 'perl'},
		{name: 'Python', type: 'python'},
		{name: 'Ruby', type: 'ruby'},
		{name: 'SQL', type: 'sql'}
	];
	var menuItems = [];
	var lastLanguage;

	function insertCode(language) {
		var html;
		
		// Define this someday maybe.
		// if (editor.settings.insertcode_element) {}
		
		if (language.name === 'none') {
			html = '<pre><code>Code goes here.</code></pre>';
		}
		else {
			html = '<pre><code class="' + language.type + '">' + language.name + ' code goes here.</code></pre>';
		}

		editor.insertContent(html);
	}

	editor.addButton('insertcode', {
		type: 'splitbutton',
		title: 'Insert code',
		onclick: function() {
			insertCode(lastLanguage || '');
		},
		menu: menuItems
	});

	tinymce.each(editor.settings.insertcode_formats || languages, function(language) {
		menuItems.push({
			text: language.name,
			onclick: function() {
				lastLanguage = language;
				insertCode(language);
			}
		});
	});

	editor.addMenuItem('insertcode', {
		icon: 'code',
		text: 'Insert code',
		menu: menuItems,
		context: 'insert'
	});
});
