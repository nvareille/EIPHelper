function ajax(args, success, error, async)
{
	async = (typeof(async) == "undefined" ? 1 : async);

	$.ajax({
	type: 'POST',
	url: 'ajax.php',
	async: async,
	data: args,
	success: success,
	error: error});
}

function loader(bool)
{
	if (bool)
		return ('<center><img src="assets/images/ajax-loader.gif" /></center>');
	return ('<img src="assets/images/ajax-loader.gif" />');
}

function swift_toggle(element, value)
{
	$(element).fadeToggle(null, null,
	function () {
		$(element).html(value);
		$(element).fadeToggle();
		});
}

function json(json)
{
	obj = JSON.parse(json);
	return (obj);
}