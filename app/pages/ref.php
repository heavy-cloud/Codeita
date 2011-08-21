<div id="ref-list">
	<ul>
		<li><a target="ref-iframe" href="http://php.net">PHP.net</a></li>
		<li><a target="ref-iframe" href="http://dev.w3.org/html5/spec/Overview.html">HTML5 Spec</a></li>
		<li><a target="ref-iframe" href="http://w3schools.com/">W3 Schools</a></li>
		<li><a target="ref-iframe" href="http://stackoverflow.com">Stack Overflow</a></li>
	</ul>
</div>
<div id="ref-frame-wrap">
	<iframe id="ref-iframe"></iframe>
</div>
<script>
$(function(){
	resizeFrame();
	$("#ref-list ul li").click(function(e){
		$(this).siblings().removeClass('ref-sel');
		$(this).addClass('ref-sel');
		var href = $(this).children('a').attr('href');
		$("#ref-iframe")[0].src = href;
	});
});
$(window).resize(function(){
	resizeFrame();
});
function resizeFrame(){
	var hh = $(window).height() - ($("#main-nav").height() + $("#ref-list").height());
	$("#ref-iframe").css('height',hh+'px');
}
</script>