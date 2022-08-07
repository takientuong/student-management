$('button.delete').click(function (e) { 
	e.preventDefault();
	var dataUrl = $(this).attr('data-url');
	alert(dataUrl);
});