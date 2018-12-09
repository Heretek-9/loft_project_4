$('body').on('click','#closeModal', function() {
	$('#orderModal').hide();
	$('#screenBlock').hide();
});
$('body').on('click','.buyBtn', function() {
	$('#orderModal').show();
	$('#screenBlock').show();
});
$('#orderModal form').on('submit', function(e) {
	e.preventDefault();

	var form = $(this);
	form.ajaxSubmit({
		type: 'POST',
		url: form.attr('action'),
		dataType: 'json',
		cache: false,
		success: function(response) {
			if (response && response != 'ok') {
				alert(response);
				$('#orderModal').hide();
				$('#screenBlock').hide();
			}
		}
	});
});