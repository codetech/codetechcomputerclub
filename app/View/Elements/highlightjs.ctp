<?php $this->Html->css('github', array('inline' => false)); ?>
<?php $this->Html->script('http://yandex.st/highlightjs/8.0/highlight.min.js', array('inline' => false)); ?>
<?php $this->start('script'); ?>
	<script>
		(window.hljs || document.write('<script src="/js/highlight.min.js"><\/script>'));
		hljs.tabReplace = '  ';
		hljs.initHighlightingOnLoad();
	</script>
<?php $this->end(); ?>
