function ajax(url, item, fct)
{
	$.ajax({
		url: url,
		type: "POST",
		data: item,
		success: fct
	});
}

function spawnNameChange(id)
{
	$('.name_button').hide();
	$('.name_button').after('<form role="form" class="form_name"><div class="form-group"><div class="col-md-4"><input type="text" maxlength="10" class="form-control name_field" placeholder="Name"/></div><button type="button" class="btn btn-default" onclick="validateName(' + id + ')">Change Name</button></div></form>');
}

function validateName(id)
{
	var name = $('.name_field').prop('value');

	if (name != '')
	{
		$('.dragon_name_text').html(name);
		$('.name_button').show();
		$('.form_name').remove();
		ajax('ajax.php', {request: 'dragon', change_name: name, id: id});
	}
}