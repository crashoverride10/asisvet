var ruta_imagen_subida = "default.jpg";
// Ajax File upload with jQuery and XHR2
// Sean Clark http://square-bracket.com
// xhr2 file upload
// data is optional
$.fn.upload = function(remote,data,successFn,progressFn) {
// if we dont have post data, move it along
if(typeof data != "object") {
progressFn = successFn;
successFn = data;
}
return this.each(function() {
if($(this)[0].files[0]) {
var formData = new FormData();
formData.append($(this).attr("name"), $(this)[0].files[0]);
 
// if we have post data too
if(typeof data == "object") {
for(var i in data) {
formData.append(i,data[i]);
}
}
 
// do the ajax request
$.ajax({
url: remote,
type: 'POST',
xhr: function() {
myXhr = $.ajaxSettings.xhr();
if(myXhr.upload && progressFn){
myXhr.upload.addEventListener('progress',function(prog) {
var value = ~~((prog.loaded / prog.total) * 100);
 
// if we passed a progress function
if(progressFn && typeof progressFn == "function") {
progressFn(prog,value);
 
// if we passed a progress element
} else if (progressFn) {
$(progressFn).val(value);
}
}, false);
}
return myXhr;
},
data: formData,
dataType: "json",
cache: false,
contentType: false,
processData: false,
complete : function(res) {
var json;
try {
json = JSON.parse(res.responseText);
} catch(e) {
json = res.responseText;
}
if(successFn) successFn(json);
}
});
}
});
};

   var client = new XMLHttpRequest();
  
   function subir(id, data) 
   {
      $('#'+id).upload("php/wsRegistrarMascota.php", data, function(respuesta){
			console.log(respuesta);
			if(respuesta.error){
				console.log(respuesta.error);
			}else{
				ruta_imagen_subida = respuesta.filepath;
			}
			
			if(respuesta.codigo == 1){
				$("#titulo_resultado").html("Exito");
				$("#mensaje_resultado").html(respuesta.mensaje);
				$("#codigo_resultado").html("");
				$("#abrirModal2").trigger('click');
				$("#cerrarModal2").click(function(){
		//			location.reload();
				});
			}else{
				$("#titulo_resultado").html("Ha ocurrido un error");
				$("#mensaje_resultado").html(respuesta.mensaje);
				$("#codigo_resultado").html("Codigo del error: " + respuesta.codigo);
				$("#abrirModal2").trigger('click');
			}
			
	  }, function(prog, value){
			console.log(value);
			$('#uploadProgress').val(value);
	  });
    }