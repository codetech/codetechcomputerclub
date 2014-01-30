<?php
	//$this->Html->script('//tinymce.cachefly.net/4.0/tinymce.min.js', array('inline' => false));
	$this->Html->script('tinymce/tinymce.min.js', array('inline' => false));
?>
<?php $this->start('script'); ?>
	<script>
		(window.tinymce || document.write('<script src="/js/tinymce/tinymce.min.js"><\/script>'));
		tinymce.init({
			selector: "textarea.tinymce",
			theme: "modern",
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons paste textcolor insertcode"
			],
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor emoticons",
			image_advtab: true,
			
			// Use correct urls for Cake.
			relative_urls: false,
			remove_script_host: <?php if (isset($remove_script_host) && $remove_script_host === false): ?> false <?php else: ?> true <?php endif; ?>,
			document_base_url: "/"
		});
	</script>
<?php $this->end(); ?>
