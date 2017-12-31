<main class="container">
	<ul class="side-nav">
		<?php foreach ($viewData['fileNames'] as $fileName): ?>
			<li>
				<span class="btn btn-link" onclick="getFile('<?= $fileName; ?>')">
					<?= $fileName; ?>
				</span>
				<span class="fa fa-times btn btn-link" onclick="deleteFile(this, '<?= $fileName; ?>')"></span>
			</li>
		<?php endforeach ?>
	</ul>
	<pre id="field" class="hide">
		
	</pre>
	<div id="img-field" class="hide">
		<img id="img" src="">
	</div>

	<script type="text/javascript">
		
	function getFile(fileName) {
		$('#field').addClass('hide');
		$('#img-field').addClass('hide');

		$.ajax({
			url: '/api-test/files/read',
			method: 'POST',
			data: {
				fileName: fileName
			}
		}).then(function(response){
			response = JSON.parse(response);

			if (response && response.image) {
				$('#img-field').removeClass('hide');
				$('#img').attr('src', '/api-test/' + response.url);
			} else {
				$('#field').removeClass('hide');
				$('#field').text(response);
			}
		});
	}
		
	function deleteFile(link, fileName) {
		$.ajax({
			url: '/api-test/files/delete',
			method: 'POST',
			data: {
				fileName: fileName
			}
		}).then(function(response){
			$(link).parent().remove();
		});
	}

	</script>
</main>