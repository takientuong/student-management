$('button.delete').click(function (e) {
	var dataHref = $(this).attr('data-href');
	$('#exampleModal a').attr('href', dataHref);
});