$(window).bind("load", function() {

	$('#password, #confirm_password').on('keyup', function (){
		
		if ($('#password').val() == $('#confirm_password').val()) 
		{
			$('#message').html('Senhas OK!').css('color', 'green');
		} 
		else 
			$('#message').html('As senhas não conferem').css('color', 'red');
	});
	
});

