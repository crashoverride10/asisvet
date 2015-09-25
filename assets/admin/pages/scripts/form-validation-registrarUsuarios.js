var FormValidation = function () {

    // basic validation
    var handleValidation = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#usuario-form');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
				messages: {
					primer_nombre: 'El nombre es necesario.',
					primer_apellido: 'El primer apellido es necesario.',
					segundo_apellido: 'El segundo apellido es necesario.',
					numeroDeDocumento: 'El numero de documento es necesario.',
					nombre_usuario: 'El nombre de usuario es necesario.',
					password: 'Establezca una contraseña.',
					confirm_password: 'Repita la contraseña.',
					txt_info_contacto: 'Hace falta la información de contacto.'
				},
                rules: {
                    primer_nombre: {
                        required: true
                    },
                    primer_apellido: {
                        required: true
                    },
                    segundo_apellido: {
                        required: true
                    },
					numeroDeDocumento: {
                        required: true,
						number: true
                    },
                    nombre_usuario: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    confirm_password: {
                        required: true
                    },
                    txt_info_contacto: {
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    Metronic.scrollTo(error1, -200);
                },
				
				 errorPlacement: function (error, element) { // render error placement for each input type
                    var icon = $(element).parent('.input-icon').children('i');
                    icon.removeClass('fa-check').addClass("fa-warning");  
                    icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    success1.show();
                    error1.hide();
                }
            });
	
			$('#btnRegistrarUsuario').click(function(){
				if ($('#usuario-form').validate().form()) {
						ajaxRegistrarUsuario();
	                }
	                return false;
			});	

    }


    return {
        //main function to initiate the module
        init: function () {
            handleValidation();

        }

    };

}();