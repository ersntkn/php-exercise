	<script src="./assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="./assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="./assets/vendor/bootstrap/js/popper.js"></script>
	<script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="./assets/vendor/select2/select2.min.js"></script>
	<script src="./assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="./assets/vendor/countdowntime/countdowntime.js"></script>
	<script src="./assets/js/main.js"></script>
	<script src="./assets/alerts/js/iziToast.min.js"></script>

<script type="text/javascript">
	$('.unmask').on('click', function(){
		if($(this).siblings('input').attr('type') == 'password')
			changeType($(this).siblings('input'), 'text');
		else
			changeType($(this).siblings('input'), 'password');
		$(this).toggleClass('unmasked')
		return false;
	});
	function changeType(x, type) {
	if(x.prop('type') == type)
	return x;
	try {
		return x.prop('type', type);
	} catch(e) {
		var html = $("<div>").append(x.clone()).html();
		var regex = /type=(\")?([^\"\s]+)(\")?/;
		var tmp = $(html.match(regex) == null ?
			html.replace(">", ' type="' + type + '">') :
			html.replace(regex, 'type="' + type + '"') );
		tmp.data('type', x.data('type') );
		var events = x.data('events');
		var cb = function(events) {
			return function() {
						for(i in events)
						{
							var y = events[i];
							for(j in y)
								tmp.bind(i, y[j].handler);
						}
					}
				}(events);
				x.replaceWith(tmp);
		setTimeout(cb, 10);
		return tmp;
	}
	}
</script>
