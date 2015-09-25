var Login = function () {

	var handleLogin = function() {
		$('.login-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                txtUsername: {
	                    required: true
	                },
	                txtPassword: {
	                    required: true
	                },
	                ckRecuerdame: {
	                    required: false
	                }
	            },

	            messages: {
	                txtUsername: {
	                    required: "El usuario es requerido."
	                },
	                txtPassword: {
	                    required: "La contraseña es requerida."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit
					$('#lblError').html('Escriba un usuario y contraseña.');
	                $('.alert-danger', $('.login-form')).show();
	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
						authenticate();
	                }
	                return false;
	            }
	        });
			
			$('#btnLogin').click(function(){
				if ($('.login-form').validate().form()) {
						authenticate();
	                }
	                return false;
			});
	}
	
			function authenticate(){

				$.ajax({
				type: 'POST',
				dataType: 'json',
				url: 'php/login.php',
				data: { 
					usuario: $('#txtUsername').val(), 
					password: $('#txtPassword').val(),
					recuerdame: $('#ckRecuerdame').is(':checked')
				},
				success: function(respuesta){
					if(respuesta.codigo == '1'){
							window.location.href = "index.php";
						}else if(respuesta.codigo == "98"){//Usuario o contraseña invalidos
							$('#lblError').html(respuesta.mensaje);
							$('.alert-danger', $('.login-form')).show();
						}else{//Error desconocido
							$('#lblError').html(respuesta.mensaje);
							$('.alert-danger', $('.login-form')).show();
						}
					}
				});
			}
	
	var handleForgetPassword = function () {
		$('.forget-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            ignore: "",
	            rules: {
	                email: {
	                    required: true,
	                    email: true
	                }
	            },

	            messages: {
	                email: {
	                    required: "Email is required."
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit   

	            },

	            highlight: function (element) { // hightlight error inputs
	                $(element)
	                    .closest('.form-group').addClass('has-error'); // set error class to the control group
	            },

	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },

	            errorPlacement: function (error, element) {
	                error.insertAfter(element.closest('.input-icon'));
	            },

	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $('.forget-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.forget-form').validate().form()) {
	                    $('.forget-form').submit();
	                }
	                return false;
	            }
	        });

	        jQuery('#forget-password').click(function () {
	            jQuery('.login-form').hide();
	            jQuery('.forget-form').show();
	        });

	        jQuery('#back-btn').click(function () {
	            jQuery('.login-form').show();
	            jQuery('.forget-form').hide();
	        });

	}

	   
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();
            handleForgetPassword(); 
        }

    };

}();