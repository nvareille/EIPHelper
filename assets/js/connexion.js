function parse_connexion(text)
{
	if (text == 'ok')
		login();
	else
		swift_toggle('#connexion_status', text);
}

function try_connexion()
{
	pseudo = $('input[name=pseudo]').val();
	pass = $('input[name=pass]').val();

	$('#connexion_status').fadeToggle().queue(function () {
		$(this).html(loader());
		$(this).dequeue();
		$(this).fadeToggle().queue(function () {
			ajax({
				request: 'connexion',
				try_connexion: 1,
				pseudo: pseudo,
				pass: pass,
			}, parse_connexion, 0, 0);
			$(this).dequeue();
		});
	});
}

function login()
{
	$('#menuposition').fadeToggle();
	$('#principale').fadeToggle();
}