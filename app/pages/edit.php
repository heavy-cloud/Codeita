
<div id="edit-files">
	<div id="edit-dir">
		<span class="icon icon-dir"></span>
		<div data-path="/" id="select-dir">/</div>
	</div>
	<ul id="path-tree">
		<li data-path="/"><span class="icon icon-dir"></span> /</li>
	</ul>
	<div id="file-tools">
		<a href="#" onclick="newDir(); return false;"><img src="../src/img/dir-add.png" alt="new dir" /></a>
		<a href="#" onclick="newFile(); return false;"><img src="../src/img/document--plus.png" alt="new dir" /></a>
	</div>
	<ul id="file-list"></ul>
</div>
<div id="edit-content">
	<ul>
	</ul>
</div>
<script>
var absoDir = '<?php	echo realpath(CONFIG_PATH.'/../www/'); ?>';
</script>
<script src="pages/edit.js"></script>