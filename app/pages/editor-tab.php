<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <script src="../../src/js/jquery.js" type="text/javascript"></script>
  <title>Editor</title>
  <style type="text/css" media="screen">
    body {
        overflow: hidden;
    }
    #editor { 
        margin: 0;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
  </style>

<?php
	include('../../src/inc/globals.inc');
	$dataPath = realpath(CONFIG_PATH.'/../www/');
	
	$data = file_get_contents($_GET['file']);
	$info = pathinfo($_GET['file']);
	$relativePath = '../../data/www/'.substr($_GET['file'],strlen($dataPath)+1);
	$ext = $info['extension'];
	switch($ext){
		case 'htm':
		case 'html':
		case 'shtml':
			$js = "../ace/mode-html.js";
			$mode = "ace/mode/html";		
			break;			
		case 'js':
			$js = "../ace/mode-javascript.js";
			$mode = "ace/mode/javascript";		
			break;			
		case 'css':
			$js = "../ace/mode-css.js";
			$mode = "ace/mode/css";		
			break;			
		case 'php':
			$js = "../ace/mode-php.js";
			$mode = "ace/mode/php";		
			break;			
		case 'pl':
		case 'pm':
			$js = "../ace/mode-pearl.js";
			$mode = "ace/mode/php";		
			break;			
		default:
			$js = "../ace/mode-html.js";
			$mode = "ace/mode/html";
			break;
	}
?>
<pre id="editor"><?php echo htmlentities($data); ?></pre>
<script src="../ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="../ace/theme-monokai.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $js; ?>" type="text/javascript" charset="utf-8"></script>
<script>
window.onload = function() {
	var editor = ace.edit("editor");
	editor.setTheme("ace/theme/monokai");
/*
	editor.getSession().on('change', function(e){
		alert('hi');
	});
*/
var openfile = '<?php echo $_GET['file']; ?>';
var canon = require('pilot/canon')
	
	canon.addCommand({
	    name: 'myCommand',
	    bindKey: {
	        win: 'Ctrl-S',
	        mac: 'Command-S',
	        sender: 'editor'
	    },
	    exec: function(env, args, request) {
	    	var data = editor.getSession().getValue();
	    	saveFile(openfile,data);
	    }
	});
	
	canon.addCommand({
	    name: 'myCommand',
	    bindKey: {
	        win: 'Ctrl-Shift-S',
	        mac: 'Command-Shift-S',
	        sender: 'editor'
	    },
	    exec: function(env, args, request) {
			var data = editor.getSession().getValue();
	    	saveFile(openfile,data);
	    	window.open('<?php echo $relativePath; ?>','previewWin');
	    }
	});
	
	var JavaScriptMode = require("<?php echo $mode; ?>").Mode;
	editor.getSession().setMode(new JavaScriptMode());
	editor.setShowPrintMargin(false);
};

function saveFile(path,data){	
	$.post('../ajax/save-data.php',{filename: path, data:data},function(d){
		if(d == '1'){
			//alert('saved');
		}
	});
}

</script>

</body>
</html>
