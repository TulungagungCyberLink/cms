(function(){
	'use strict';

	$(document).ready(function(){
		$('.sidenav').sidenav();
		$('select').formSelect();

		$('.flashdata > .close').click(function(){
			$(this).parent().fadeOut('fast', function(){
				$(this).remove();
			});
		});
	});

}());