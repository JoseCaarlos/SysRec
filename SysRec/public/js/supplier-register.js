$(document).ready(function($){
	/* Money mask R$ */
    $('.money').mask('#.##0,00', {reverse: true});
    
	/* Only number on Dimensions Mask*/
    $('.number').mask('0000000');
    
    /*  CEP Mask*/
    $(".cep").mask("99.999-999");


 

    /*  CNPJ Mask*/

    $(".cnpj").on("keyup", function(e)
    {
        $(this).val(
            $(this).val()
            .replace(/\D/g, '')
			.replace(/^(\d{2})(\d{3})?(\d{3})?(\d{4})?(\d{2})?/, "$1 $2 $3/$4-$5"));
			
    });
  

  
  
	/* New sp state phones Mask */
	var SPMaskBehavior = function (val) {
	return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	onKeyPress: function(val, e, field, options) {
		field.mask(SPMaskBehavior.apply({}, arguments), options);
	}
	};
	$('.sp_celphones').mask(SPMaskBehavior, spOptions);
});
	
/* Load JavaScript only after document */
$(window).bind("load", function() {

	$("#submitBtn").click(function() {
		/* this function load all data from form to an modal table called before submit */ 
		$("#mName").text($("#name").val());
		$("#mCNPJ").text($("#cnpj").val());
		$("#mPhoneNumber").text($("#phone_number").val());
		$("#mTelephone").text($("#telephone").val());
		$("#mEmail").text($("#email").val());
		$("#mCEP").text($('#postal_code').val());
		$("#mRua").text($("#street").val());
		$("#mNumero").text($("#street_number").val());
		$("#mBairro").text($("#neighborhood" ).val());
		$("#mCidade").text($("#city").val());
        $("#mEstado").text($("#state option:selected").text());
        $("#mComplemento").text($("#complement").val());									
	});

	$('#submit').click(function(){
		/* when the submit button in the modal is clicked, submit the form */
		$('#formfield').submit();
	});


});
