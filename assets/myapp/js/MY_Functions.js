/* START - CONTROLLER: Session */
function verifyenterkeypressed(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode == 13){
        validateuserlogin();
    }
}

function validateuserlogin(){
    var url = myBase_url+"index.php/Session/validatelogin";
    var user = $('#user').val();
    var pass = $('#password').val();
    $('#fountainTextG').show();
    $.post(url,
            {
                user:user,
                pass: pass
            }, function(data){
                sendresponsetouser(data);
    });
}

function ResetUserLogin(){

    var userreset = $("#userreset").val();
    var passreset = $("#passwordreset").val();

    if (userreset != ""  && passreset != "") {

        $.ajax({
            url:myBase_url+"index.php/Session/ResetLogin",
            type:'POST',
            data:{userreset:userreset,passreset:passreset},
            async: true,
            success:function(datos){
                var response = JSON.parse(datos);

                if (response == "UWOA") {

                    swal("Error","Usuario sin acceso a esta aplicación","error");

                }else if(response == "IUOP"){

                    swal("Error","Usuario o contraseña incorecta","error");
                }else{

                    swal({
                        title: "Exito",
                        text: "Se ha reseteado la sesion con exito",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        cancelButtonText: "No, Cancelar",
                        closeOnConfirm: true,
                        closeOnCancel: false
                    }, function(isConfirm){

                         location.href = "";
                    });
                 }

            },
            error:function(){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });

    }else{

        swal("Cuidado", "Aun quedan campos vacios", "warning")
    }

}

function sendresponsetouser(data){
    var dato = data.trim();
    if(dato.substring(0,3) === "OK-"){
        openurl(dato);
    }else if(dato.substring(0,4)==="UWOA"){
        displaymessage("Usuario sin acceso a esta aplicación" );
    }else if(dato.substring(0,4)==="IUOP"){
        displaymessage("Usuario y/o contraseña incorrectos");
    } else if(dato.substring(0,4)==="UWAS"){
        displaymessage("Usuario ya cuenta con una sesion activa");
    } else{
        displaymessage(data);
    }
}

function openurl(str){
    $('#fountainTextG').hide();
    var sp = str.split("-");
    var url = myBase_url+"index.php/"+sp[1];
    window.location.href = url;
}

function displaymessage(message){
    $('#fountainTextG').hide();
    var msg = '<div class="alert alert-danger alert-dismissable fade in">\n\
                    <button type="button" class="close close-sm" data-dismiss="alert" >\n\
                    <i class="md md-close"></i>\n\
                    </button>\n\
                    <strong>¡Error!</strong>&nbsp;'+message+'&nbsp;\n\
               </div>';
    $('#displayUserErrors').html(msg);
    setTimeout(closeresponsetouser, 10000);
}

function closeresponsetouser(){
    $('#displayUserErrors').children().fadeToggle(500,function(){
        $('#displayUserErrors').empty();
    });

}

function LogOut(){

    $.ajax({
        url:myBase_url+"index.php/Session/logout",
        type:'GET',
        async: true,
        success:function(datos){
            swal({
                title: "Error",
                text: "La sesion ha caducado, porfavor inicia sesion de nuevo",
                type: "error",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                    location.href = myBase_url+"index.php/Session";
            });
        }
    });
}


function CheckUActivo(){

    $.ajax({
        url:myBase_url+"index.php/Session/EstadoU",
        type:'GET',
        async: true,
        success:function(datos){
            var obj = JSON.parse(datos);

            if(obj != ""){
                console.log("OK");
            }else{
                $.ajax({
                    url:myBase_url+"index.php/Session/logout",
                    type:'GET',
                    async: true,
                    success:function(datos){
                        swal({
                            title: "Error",
                            text: "Tu cuenta ha sido eliminada, para mayor informacion acude con el administrador",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK",
                            cancelButtonText: "Cancelar",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        }, function(isConfirm){
                                location.href = myBase_url+"index.php/Session";
                        });
                    }
                });
            }
        }
    });

}


/* END - CONTROLLER: Session */

/* =============================================================================================================================================================================================================================== */

/* START - CONTROLLER: Usuarios */

function VerificaUsuario(){

  var usuario = $('#username').val();

  if (usuario!=""){
    $.ajax({
        url:myBase_url+"index.php/Usuarios/CheckUsuarioExistente",
        type:'POST',
        data:{usuario:usuario},
        async: true,
        success:function(datos){

          var obj = JSON.parse(datos);

          if (obj!=""){
            swal("Alerta","El usuario ya existe. Ingrese uno nuevo","warning");
          }
        },

        error:function(){
          swal("Error","Ha ocurrido un error. Inténtelo de nuevo","error");
        }
    });
  }else {
    swal("Alerta","El campo de usuario esta vacio","warning");
  }

}

function GuardarUsuario(){

    var nombre = $('#nombre').val();
    var apaterno = $('#apaterno').val();
    var amaterno = $('#amaterno').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var ocupacion = $('#ocupacion').val();
    var rol = $('#rol').val();

    if(nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email != "" && username != "" && password != "" && rol != ""){
        $.ajax({
            url:myBase_url+"index.php/Dashboard/SaveUser",
            type:'POST',
            data:{nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,rol:rol},
            async: true,
            success:function(datos){
                swal({
                    title: "Exito",
                    text: "Se ha guardado el usuario con exito",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function(isConfirm){
                    location.href = "";
                });
            },
        });
    }else{
        swal("Cuidado","Aun existen campos vacios","warning");
    }
}

function EditarUsuario($id){


    var id = $id;
    $.ajax({
        url:myBase_url+"index.php/Usuarios/UsuarioPorID",
        type:'POST',
        data:{id:id},
        async: true,
        success:function(datos){

            var obj = JSON.parse(datos);
            console.log(obj);

           var id = obj [0].id_usuario;
           var nombre = obj [0].nombre;
           var apaterno = obj [0].apaterno;
           var amaterno = obj [0].amaterno;
           var telefono = obj [0].telefono;
           var email = obj [0].email;
           var username = obj [0].username;
           var password = obj [0].password;
           var ocupacion = obj [0].ocupacion;
           var rol = obj [0].rol;
           var estado = obj [0].estado;

           $('#username').attr('disabled',true);
           $('#password').attr('disabled',true);
           $('#botonGuardar').hide();
           $('#botonActualizar').show();
           $('#divestado').show();
           $('#id_user').val(id);
           $('#nombre').val(nombre);
           $('#apaterno').val(apaterno);
           $('#amaterno').val(amaterno);
           $('#telefono').val(telefono);
           $('#email').val(email);
           $('#username').val(username);
           $('#password').val(password);
           $('#rol').val(rol);
           $('#ocupacion').val(ocupacion);
           $('#estado').val(estado);


         }, error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
});


}

function UpdateUsuario(){


    var id = $('#id_user').val();
    var nombre = $('#nombre').val();
    var apaterno = $('#apaterno').val();
    var amaterno = $('#amaterno').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var username = $('#username').val();
    var password = $('#password').val();
    var rol = $('#rol').val();
    var ocupacion = $('#ocupacion').val();
    var estado = $('#estado').val();


    if(id != "" && nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email !="" && username != "" && password != "" && rol !="" && ocupacion !="" && estado !=""){

        $.ajax({
            url:myBase_url+"index.php/Usuarios/UpdateUser",
            type:'POST',
            data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,ocupacion:ocupacion,rol:rol,estado:estado},
            async: true,
            success:function(datos){

                swal({
                    title: "Exito",
                    text: "Se ha actualizado el usuario con exito ",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "OK",
                    cancelButtonText: "No, Cancelar",
                    closeOnConfirm: true,
                    closeOnCancel: false
                }, function(isConfirm){
                        location.href = "";
                });


            },error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });



    }

}

function BorrarUsuario($id){

   var id = $id;

   $.ajax({
       url:myBase_url+"index.php/Usuarios/UsuarioPorID",
       type:'POST',
       data:{id:id},
       async: true,
       success:function(datos){

         var obj = JSON.parse(datos);
         console.log(obj);

         var id = obj [0].id_usuario;
         var nombre = obj [0].nombre;
         var apaterno = obj [0].apaterno;
         var amaterno = obj [0].amaterno;
         var telefono = obj [0].telefono;
         var email = obj [0].email;
         var username = obj [0].username;
         var password = obj [0].password;
         var ocupacion = obj [0].ocupacion;
         var rol = obj [0].rol;
         var estado = obj [0].estado;

         $('#id_user').val(id);
         $('#nombre').val(nombre);
         $('#apaterno').val(apaterno);
         $('#amaterno').val(amaterno);
         $('#telefono').val(telefono);
         $('#email').val(email);
         $('#username').val(username);
         $('#password').val(password);
         $('#rol').val(rol);
         $('#ocupacion').val(ocupacion);
         $('#estado').val(estado);

       },error:function(){
         swal("Error","Ha ocurrido un error intentelo de nuevo","error");
       }
   });

   swal({
     title: "ADVERTENCIA",
     text: "¿Seguro que desea borrar?",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "OK",
     cancelButtonText: "Cancelar",
     closeOnConfirm: false,
     closeOnCancel: true
   },function(isConfirm){
     if(isConfirm){

       var id = $('#id_user').val();
       var nombre = $('#nombre').val();
       var apaterno = $('#apaterno').val();
       var amaterno = $('#amaterno').val();
       var telefono = $('#telefono').val();
       var email = $('#email').val();
       var username = $('#username').val();
       var password = $('#password').val();
       var rol = $('#rol').val();
       var ocupacion = $('#ocupacion').val();
       var estado = $('#estado').val();

       $.ajax({
           url:myBase_url+"index.php/Usuarios/DeleteUser",
           type:'POST',
           data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,username:username,password:password,ocupacion:ocupacion,rol:rol,estado:estado},
           async: true,
           success:function(datos){

               swal({
                   title: "Exito",
                   text: "Se ha eliminado el usuario con exito ",
                   type: "success",
                   showCancelButton: false,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "OK",
                   cancelButtonText: "No, Cancelar",
                   closeOnConfirm: true,
                   closeOnCancel: false
               }, function(isConfirm){
                       location.href = "";
               });
           },error:function (){
               swal("Error","Ha ocurrido un error intentelo de nuevo","error");
           }
       });
     }
   });
}

/* END - CONTROLLER: Usuarios */

/* =============================================================================================================================================================================================================================== */

 /*START CONTROLLER Calendario*/

     function RellenaHorarioFunciones(){

         var cliente = $('#cliente').val();
         var fecha1 = $('#fecha1').val();
         var fecha2 = $('#fecha2').val();
         // var anio = $('#anio').val();

         if(cliente != "" && fecha1 != "" && fecha2 != "" /*&& anio != ""*/){

           $.ajax({
               url:myBase_url+"index.php/Clientes/ClientePorID",
               type:'POST',
               data:{id:cliente},
               async: true,
               success:function(datos){

                   var obj = JSON.parse(datos);

                   if(obj != ""){

                     var id = obj[0].id_cliente;
                     var nombre = obj[0].nombre;
                     var apaterno = obj[0].apaterno;
                     var amaterno = obj[0].amaterno;

                     var nombrecompleto = nombre + ' ' + apaterno + ' ' + amaterno;

                     $("#t1").val(nombrecompleto);
                     $("#id_c").val(id);

                   }
               },
               error:function() {
                   swal("Error", "Ha ocurrido un error intentelo de nuevo","error");
               },
           });

             $.ajax({
                 url:myBase_url+"index.php/Calendario/HorariosClientes",
                 type:'POST',
                 data:{cliente:cliente,fecha1:fecha1,fecha2:fecha2/*,anio:anio*/},
                 async: true,
                 success:function(datos){

                     var obj = JSON.parse(datos);

                     if(obj != ""){

                         $('#calendario').show();

                         $("#l2").empty();
                         $("#ma2").empty();
                         $("#mi2").empty();
                         $("#j2").empty();
                         $("#v2").empty();
                         $("#s2").empty();

                         $("#l3").empty();
                         $("#ma3").empty();
                         $("#mi3").empty();
                         $("#j3").empty();
                         $("#v3").empty();
                         $("#s3").empty();

                         $("#l4").empty();
                         $("#ma4").empty();
                         $("#mi4").empty();
                         $("#j4").empty();
                         $("#v4").empty();
                         $("#s4").empty();

                         $("#l5").empty();
                         $("#ma5").empty();
                         $("#mi5").empty();
                         $("#j5").empty();
                         $("#v5").empty();
                         $("#s5").empty();

                         $("#l6").empty();
                         $("#ma6").empty();
                         $("#mi6").empty();
                         $("#j6").empty();
                         $("#v6").empty();
                         $("#s6").empty();

                         $("#l7").empty();
                         $("#ma7").empty();
                         $("#mi7").empty();
                         $("#j7").empty();
                         $("#v7").empty();
                         $("#s7").empty();

                         $("#l8").empty();
                         $("#ma8").empty();
                         $("#mi8").empty();
                         $("#j8").empty();
                         $("#v8").empty();
                         $("#s8").empty();

                         $("#l9").empty();
                         $("#ma9").empty();
                         $("#mi9").empty();
                         $("#j9").empty();
                         $("#v9").empty();
                         $("#s9").empty();

                         $("#l10").empty();
                         $("#ma10").empty();
                         $("#mi10").empty();
                         $("#j10").empty();
                         $("#v10").empty();
                         $("#s10").empty();

                         $("#l11").empty();
                         $("#ma11").empty();
                         $("#mi11").empty();
                         $("#j11").empty();
                         $("#v11").empty();
                         $("#s11").empty();

                         $("#l12").empty();
                         $("#ma12").empty();
                         $("#mi12").empty();
                         $("#j12").empty();
                         $("#v12").empty();
                         $("#s12").empty();

                         $("#l13").empty();
                         $("#ma13").empty();
                         $("#mi13").empty();
                         $("#j13").empty();
                         $("#v13").empty();
                         $("#s13").empty();

                         for (var i = 0; i < obj.length; i++) {

                           var id_horario = obj[i].id_horario;
                           var id = obj[i].cliente;
                           var nombre = obj[i].nombre;
                           var apaterno = obj[i].apaterno;
                           var amaterno = obj[i].amaterno;
                           var dia = obj[i].dia_visita;
                           var hora = obj[i].hora_visita;
                           var motivo = obj[i].motivo_visita;
                            var estado = obj[i].estado;

                           var nombrecompleto = nombre + ' ' + apaterno + ' ' + amaterno;

                           switch (dia) {

                             //Lunes
                             case 'Lunes':

                             switch (hora) {
                               case '8a-9a':

                                 $("#l2").html(nombrecompleto + '<br>' + motivo);
                                 $("#l2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '9a-10a':

                                $("#l3").html(nombrecompleto + '<br>' + motivo);
                                $("#l3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '10a-11a':

                                $("#l4").html(nombrecompleto + '<br>' + motivo);
                                $("#l4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '11a-12p':

                                $("#l5").html(nombrecompleto + '<br>' + motivo);
                                $("#l5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '12p-1p':

                                $("#l6").html(nombrecompleto + '<br>' + motivo);
                                $("#l6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '1p-2p':

                                $("#l7").html(nombrecompleto + '<br>' + motivo);
                                $("#l7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '2p-3p':

                                $("#l8").html(nombrecompleto + '<br>' + motivo);
                                $("#l8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '3p-4p':

                                $("#l9").html(nombrecompleto + '<br>' + motivo);
                                $("#l9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '4p-5p':

                                $("#l10").html(nombrecompleto + '<br>' + motivo);
                                $("#l10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '5p-6p':

                                $("#l11").html(nombrecompleto + '<br>' + motivo);
                                $("#l11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '6p-7p':

                                $("#l12").html(nombrecompleto + '<br>' + motivo);
                                $("#l12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '7p-8p':

                                $("#l13").html(nombrecompleto + '<br>' + motivo);
                                $("#l13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                             }

                             break;

                             //Martes
                             case 'Martes':

                             switch (hora) {
                               case '8a-9a':

                                $("#ma2").html(nombrecompleto + '<br>' + motivo);
                                $("#ma2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '9a-10a':

                                $("#ma3").html(nombrecompleto + '<br>' + motivo);
                                $("#ma3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '10a-11a':

                                $("#ma4").html(nombrecompleto + '<br>' + motivo);
                                $("#ma4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '11a-12p':

                                $("#ma5").html(nombrecompleto + '<br>' + motivo);
                                $("#ma5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '12p-1p':

                                $("#ma6").html(nombrecompleto + '<br>' + motivo);
                                $("#ma6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '1p-2p':

                                $("#ma7").html(nombrecompleto + '<br>' + motivo);
                                $("#ma7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '2p-3p':

                                $("#ma8").html(nombrecompleto + '<br>' + motivo);
                                $("#ma8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '3p-4p':

                                $("#ma9").html(nombrecompleto + '<br>' + motivo);
                                $("#ma9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '4p-5p':

                                $("#ma10").html(nombrecompleto + '<br>' + motivo);
                                $("#ma10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '5p-6p':

                                $("#ma11").html(nombrecompleto + '<br>' + motivo);
                                $("#ma11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '6p-7p':

                                $("#ma12").html(nombrecompleto + '<br>' + motivo);
                                $("#ma12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '7p-8p':

                                $("#ma13").html(nombrecompleto + '<br>' + motivo);
                                $("#ma13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                             }

                             break;

                             //Miercoles
                             case 'Miercoles':

                             switch (hora) {
                               case '8a-9a':

                                $("#mi2").html(nombrecompleto + '<br>' + motivo);
                                $("#mi2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '9a-10a':

                                $("#mi3").html(nombrecompleto + '<br>' + motivo);
                                $("#mi3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '10a-11a':

                                $("#mi4").html(nombrecompleto + '<br>' + motivo);
                                $("#mi4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '11a-12p':

                                $("#mi5").html(nombrecompleto + '<br>' + motivo);
                                $("#mi5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '12p-1p':

                                $("#mi6").html(nombrecompleto + '<br>' + motivo);
                                $("#mi6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '1p-2p':

                                $("#mi7").html(nombrecompleto + '<br>' + motivo);
                                $("#mi7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '2p-3p':

                                $("#mi8").html(nombrecompleto + '<br>' + motivo);
                                $("#mi8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '3p-4p':

                                $("#mi9").html(nombrecompleto + '<br>' + motivo);
                                $("#mi9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '4p-5p':

                                $("#mi10").html(nombrecompleto + '<br>' + motivo);
                                $("#mi10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '5p-6p':

                                $("#mi11").html(nombrecompleto + '<br>' + motivo);
                                $("#mi11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '6p-7p':

                                $("#mi12").html(nombrecompleto + '<br>' + motivo);
                                $("#mi12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '7p-8p':

                                $("#mi13").html(nombrecompleto + '<br>' + motivo);
                                $("#mi13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                             }

                             break;

                             //Jueves
                             case 'Jueves':

                             switch (hora) {
                               case '8a-9a':

                                $("#j2").html(nombrecompleto + '<br>' + motivo);
                                $("#j2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '9a-10a':

                                $("#j3").html(nombrecompleto + '<br>' + motivo);
                                $("#j3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '10a-11a':

                                $("#j4").html(nombrecompleto + '<br>' + motivo);
                                $("#j4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '11a-12p':

                                $("#j5").html(nombrecompleto + '<br>' + motivo);
                                $("#j5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '12p-1p':

                                $("#j6").html(nombrecompleto + '<br>' + motivo);
                                $("#j6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '1p-2p':

                                $("#j7").html(nombrecompleto + '<br>' + motivo);
                                $("#j7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '2p-3p':

                                $("#j8").html(nombrecompleto + '<br>' + motivo);
                                $("#j8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '3p-4p':

                                $("#j9").html(nombrecompleto + '<br>' + motivo);
                                $("#j9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '4p-5p':

                                $("#j10").html(nombrecompleto + '<br>' + motivo);
                                $("#j10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '5p-6p':

                                $("#j11").html(nombrecompleto + '<br>' + motivo);
                                $("#j11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '6p-7p':

                                $("#j12").html(nombrecompleto + '<br>' + motivo);
                                $("#j12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                               case '7p-8p':

                                $("#j13").html(nombrecompleto + '<br>' + motivo);
                                $("#j13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');


                               break;

                             }

                             break;

                             //Viernes
                             case 'Viernes':

                             switch (hora) {
                               case '8a-9a':

                                $("#v2").html(nombrecompleto + '<br>' + motivo);
                                $("#v2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '9a-10a':

                                $("#v3").html(nombrecompleto + '<br>' + motivo);
                                $("#j3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '10a-11a':

                                $("#v4").html(nombrecompleto + '<br>' + motivo);
                                $("#v4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '11a-12p':

                                $("#v5").html(nombrecompleto + '<br>' + motivo);
                                $("#v5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '12p-1p':

                                $("#v6").html(nombrecompleto + '<br>' + motivo);
                                $("#v6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '1p-2p':

                                $("#v7").html(nombrecompleto + '<br>' + motivo);
                                $("#v7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '2p-3p':

                                $("#v8").html(nombrecompleto + '<br>' + motivo);
                                $("#v8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '3p-4p':

                                $("#v9").html(nombrecompleto + '<br>' + motivo);
                                $("#v9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '4p-5p':

                                $("#v10").html(nombrecompleto + '<br>' + motivo);
                                $("#v10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '5p-6p':

                                $("#v11").html(nombrecompleto + '<br>' + motivo);
                                $("#v11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '6p-7p':

                                $("#v12").html(nombrecompleto + '<br>' + motivo);
                                $("#v12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '7p-8p':

                                $("#v13").html(nombrecompleto + '<br>' + motivo);
                                $("#v13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                             }

                             break;

                             //Sabado
                             case 'Sabado':

                             switch (hora) {
                               case '8a-9a':

                                $("#s2").html(nombrecompleto + '<br>' + motivo);
                                $("#s2").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '9a-10a':

                                $("#s3").html(nombrecompleto + '<br>' + motivo);
                                $("#s3").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '10a-11a':

                                $("#s4").html(nombrecompleto + '<br>' + motivo);
                                $("#s4").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '11a-12p':

                                $("#s5").html(nombrecompleto + '<br>' + motivo);
                                $("#s5").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '12p-1p':

                                $("#s6").html(nombrecompleto + '<br>' + motivo);
                                $("#s6").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '1p-2p':

                                $("#s7").html(nombrecompleto + '<br>' + motivo);
                                $("#s7").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '2p-3p':

                                $("#s8").html(nombrecompleto + '<br>' + motivo);
                                $("#s8").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '3p-4p':

                                $("#s9").html(nombrecompleto + '<br>' + motivo);
                                $("#s9").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '4p-5p':

                                $("#s10").html(nombrecompleto + '<br>' + motivo);
                                $("#s10").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '5p-6p':

                                $("#s11").html(nombrecompleto + '<br>' + motivo);
                                $("#s11").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '6p-7p':

                                $("#s12").html(nombrecompleto + '<br>' + motivo);
                                $("#s12").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                               case '7p-8p':

                                $("#s13").html(nombrecompleto + '<br>' + motivo);
                                $("#s13").append('<br>' + '<a href="#" id="Editar" onclick="EditarHorario('+id_horario+')"><i class="fa fa-pencil"></i></a><a href="#" id="Borrar" onclick="BorrarHorario('+id_horario+')"><i class="fa fa-close"></i> </a>');

                               break;

                             }

                             break;

                           }

                         }

                     }else{

                       $('#calendario').hide();
                       swal("Error","No existen datos para el rango de fechas seleccionado","error");

                     }

                 },
                 error:function() {

                   $('#calendario').hide();
                   swal("Error", "Ha ocurrido un error intentelo de nuevo","error");
                 },
             });
         }else{
             swal("Cuidado", "Aun quedan campos vacíos", "warning");
         }
     }

     function AgregarHorario(){

       var id = $('#id_c').val();
       var fecha = $('#fecha').val();
       var hora = $('#horas').val();
       var motivo = $('#motivo').val();

       if(id != "" && fecha != "" && hora != "" && motivo != ""){
         $.ajax({
             url:myBase_url+"index.php/Calendario/SaveHorario",
             type:'POST',
             data:{id:id,fecha:fecha,hora:hora,motivo:motivo},
             async: true,
             success:function(datos){

               var obj = JSON.parse(datos);

               if (obj == "TRUE") {

                 swal("Error","Ya existe una cita agendada en el horario seleccionado","error");

               }else {

                 swal("Exito","Se ha insertado correctamente la cita","success");
                 RellenaHorarioFunciones();

               }

             },
             error:function (){
                 swal("Error","Ha ocurrido un error intentelo de nuevo","error");
             }
         });
       }else {
         swal("Cuidado", "Aun quedan campos vacíos", "warning");
       }
    }

    function EditarHorario(id_horario){

      if (id_horario != "") {
        $.ajax({
            url:myBase_url+"index.php/Calendario/GetDatosHorario",
            type:'POST',
            data:{id_horario:id_horario},
            async: true,
            success:function(datos){

              var obj = JSON.parse(datos);

              if (obj != "") {
                var id = obj[0].id_horario;
                var fecha = obj[0].fecha_operacion;
                var hora = obj[0].hora_visita;
                var motivo = obj[0].motivo_visita;

                $('#botonAgregarHorario').hide();
                $('#botonActualizarHorario').show();
                $('#id_cal').val(id);
                $('#fecha').val(fecha);
                $('#horas').val(hora);
                $('#motivo').val(motivo);
              }

            },error:function (){
                swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });
      }
    }

    function ActualizaHorario(){

      var id_c = $('#id_c').val();
      var id_cal = $('#id_cal').val();
      var fecha = $('#fecha').val();
      var hora = $('#horas').val();
      var motivo = $('#motivo').val();

      if(id_c != "" && id_cal != "" && fecha != "" && hora != "" && motivo != ""){
        $.ajax({
          url:myBase_url+"index.php/Calendario/UpdateHorario",
          type:'POST',
          data:{id_c:id_c,id_cal:id_cal,fecha:fecha,hora:hora,motivo:motivo},
          async: true,
          success:function(datos){
            swal({
              title: "Exito",
              text: "Se ha actualizado el horario con exito ",
              type: "success",
              showCancelButton: false,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "OK",
              cancelButtonText: "No, Cancelar",
              closeOnConfirm: true,
              closeOnCancel: false
            },function(isConfirm){
              location.href = "";
            });
          },error:function (){
            swal("Error","Ha ocurrido un error intentelo de nuevo","error");
          }
        });
      }
    }

    function BorrarHorario(id_horario){

      if (id_horario != "") {

        swal({
          title: "ADVERTENCIA",
          text: "¿Seguro que desea borrar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "OK",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: true
        },function(isConfirm){
          if(isConfirm){

            $.ajax({
                url:myBase_url+"index.php/Calendario/DeleteHorario",
                type:'POST',
                data:{id_horario:id_horario},
                async: true,
                success:function(datos){

                    swal({
                        title: "Exito",
                        text: "Se ha eliminado el horario con exito ",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        cancelButtonText: "No, Cancelar",
                        closeOnConfirm: true,
                        closeOnCancel: false
                    }, function(isConfirm){
                            location.href = "";
                    });
                },error:function (){
                    swal("Error","Ha ocurrido un error intentelo de nuevo","error");
                }
            });
          }
        });
     }
    }

/* END - CONTROLLER: Calendario */

/* =============================================================================================================================================================================================================================== */

/*START CONTROLLER: Clientes*/

    function GuardarCliente(){

             var nombre = $('#nombre').val();
             var apaterno = $('#apaterno').val();
             var amaterno = $('#amaterno').val();
             var telefono = $('#telefono').val();
             var email = $('#email').val();
             var empresa = $('#empresa').val();

         if(nombre !="" && apaterno != "" && amaterno != "" && telefono != "" && email != "" && empresa != ""){

             $.ajax({
                 url:myBase_url+"index.php/Clientes/SaveCliente",
                 type:'POST',
                 data:{nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa},
                 async: true,
                 success:function(datos){
                     swal({
                         title: "Exito",
                         text: "Se ha guardado cliente con exito ",
                         type: "success",
                         showCancelButton: false,
                         confirmButtonColor: "#DD6B55",
                         confirmButtonText: "OK",
                         cancelButtonText: "No, Cancelar",
                         closeOnConfirm: true,
                         closeOnCancel: false
                     }, function(isConfirm){
                             location.href = "";
                     });
                 },
                 error:function (){
                     swal("Error","Ha ocurrido un error intentelo de nuevo","error");
                 }
             });

         }else {
             swal("Alerta","Aun existen campos vacios","warning");
         }

     }

     function EditarCliente($id){

         var id = $id;

         $.ajax({
             url:myBase_url+"index.php/Clientes/ClientePorID",
             type:'POST',
             data:{id:id},
             async: true,
             success:function(datos){

                 var obj = JSON.parse(datos);
                 console.log(obj);

                var id = obj [0].id_cliente;
                var nombre = obj [0].nombre;
                var apaterno = obj [0].apaterno;
                var amaterno = obj [0].amaterno;
                var telefono = obj [0].telefono;
                var email = obj [0].email;
                var empresa = obj [0].empresa;
                var token = obj [0].token;
                var estado = obj [0].estado;

                $('#token').attr('disabled',true);
                $('#password').attr('disabled',true);
                $('#botonGuardarCliente').hide();
                $('#botonActualizarCliente').show();
                $('#divestadoc').show();
                $('#divtoken').show();
                $('#id_client').val(id);
                $('#nombre').val(nombre);
                $('#apaterno').val(apaterno);
                $('#amaterno').val(amaterno);
                $('#telefono').val(telefono);
                $('#email').val(email);
                $('#empresa').val(empresa);
                $('#token').val(token);
                $('#estado').val(estado);


              }, error:function (){
                     swal("Error","Ha ocurrido un error intentelo de nuevo","error");
                 }
     });


     }

     function UpdateCliente(){


         var id = $('#id_client').val();
         var nombre = $('#nombre').val();
         var apaterno = $('#apaterno').val();
         var amaterno = $('#amaterno').val();
         var telefono = $('#telefono').val();
         var email = $('#email').val();
         var empresa = $('#empresa').val();
         var token = $('#token').val();
         var estado = $('#estado').val();


         if(id != "" && nombre != "" && apaterno != "" && amaterno != "" && telefono != "" && email !="" && empresa != "" && token != "" && estado !=""){

             $.ajax({
                 url:myBase_url+"index.php/Clientes/UpdateClient",
                 type:'POST',
                 data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa,token:token,estado:estado},
                 async: true,
                 success:function(datos){

                     swal({
                         title: "Exito",
                         text: "Se ha actualizado el cliente con exito ",
                         type: "success",
                         showCancelButton: false,
                         confirmButtonColor: "#DD6B55",
                         confirmButtonText: "OK",
                         cancelButtonText: "No, Cancelar",
                         closeOnConfirm: true,
                         closeOnCancel: false
                     }, function(isConfirm){
                             location.href = "";
                     });


                 },error:function (){
                     swal("Error","Ha ocurrido un error intentelo de nuevo","error");
                 }
             });
         }

     }

     function BorrarCliente($id){

        var id = $id;

        $.ajax({
            url:myBase_url+"index.php/Clientes/ClientePorID",
            type:'POST',
            data:{id:id},
            async: true,
            success:function(datos){

              var obj = JSON.parse(datos);
              console.log(obj);

              var id = obj [0].id_cliente;
              var nombre = obj [0].nombre;
              var apaterno = obj [0].apaterno;
              var amaterno = obj [0].amaterno;
              var telefono = obj [0].telefono;
              var email = obj [0].email;
              var empresa = obj [0].empresa;
              var token = obj [0].token;
              var estado = obj [0].estado;

              $('#id_client').val(id);
              $('#nombre').val(nombre);
              $('#apaterno').val(apaterno);
              $('#amaterno').val(amaterno);
              $('#telefono').val(telefono);
              $('#email').val(email);
              $('#empresa').val(empresa);
              $('#token').val(token);
              $('#estado').val(estado);

            },error:function(){
              swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });

        swal({
          title: "ADVERTENCIA",
          text: "¿Seguro que desea borrar?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "OK",
          cancelButtonText: "Cancelar",
          closeOnConfirm: false,
          closeOnCancel: true
        },function(isConfirm){
          if(isConfirm){

            var id = $('#id_client').val();
            var nombre = $('#nombre').val();
            var apaterno = $('#apaterno').val();
            var amaterno = $('#amaterno').val();
            var telefono = $('#telefono').val();
            var email = $('#email').val();
            var empresa = $('#empresa').val();
            var token = $('#token').val();
            var estado = $('#estado').val();

            $.ajax({
                url:myBase_url+"index.php/Clientes/DeleteClient",
                type:'POST',
                data:{id:id,nombre:nombre,apaterno:apaterno,amaterno:amaterno,telefono:telefono,email:email,empresa:empresa,token:token,estado:estado},
                async: true,
                success:function(datos){

                    swal({
                        title: "Exito",
                        text: "Se ha eliminado el cliente con exito ",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "OK",
                        cancelButtonText: "No, Cancelar",
                        closeOnConfirm: true,
                        closeOnCancel: false
                    }, function(isConfirm){
                            location.href = "";
                    });
                },error:function (){
                    swal("Error","Ha ocurrido un error intentelo de nuevo","error");
                }
            });
          }
        });
    }

  /*END CONTROLLER: Clientes */

/*START CONTROLLER: Reportes */
    var datoscita;
    var datoscliente;

     function CitasRangoCliente(){

       var cliente = $('#cliente').val();
       var fecha1  = $('#fecha1').val();
       var fecha2  = $('#fecha2').val();

       if(cliente != "" && fecha1 != "" && fecha2 != ""){
        $.ajax({
             url:myBase_url+"index.php/Reportes/CitasClienteFecha",
             type:'POST',
             data:{cliente:cliente, fecha1:fecha1, fecha2:fecha2},
             async: false,
             success:function(datos){
                // alert(datos);
                // alert(fecha1);

                $("#preloader").show();
                $("#boton").attr('disabled',true);

                datoscita = datos;

                // alert(datoscita);

             },
             error:function (){
                 swal("Error","Ha ocurrido un error intentelo de nuevo","error");
             }
         });

        // alert(datoscita);
        var objcitas = JSON.parse(datoscita);

        $.ajax({
            url:myBase_url+"index.php/Reportes/Cliente",
            type:'POST',
            data:{cliente:cliente},
            async: false,
            success:function(datos){

            // alert(datos);

            datoscliente = datos;

            },
            error:function (){
             swal("Error","Ha ocurrido un error intentelo de nuevo","error");
            }
        });

         // alert(objcliente);
         var objcliente = JSON.parse(datoscliente);

         var nombre   = objcliente[0].nombre;
         var apaterno = objcliente[0].apaterno;
         var amaterno = objcliente[0].amaterno;

         var nombrecompleto = nombre + " " + apaterno + " " + amaterno;
         // var nombrecompleto = "test";

         //Funcion para construir la tabla dinamicamente
         function buildTableBody(datoscita, columns) {
             var body = [];

             body.push(columns);

             datoscita.forEach(function(row) {
                 var dataRow = [];

                 columns.forEach(function(column) {
                     dataRow.push(row[column].toString());
                 })

                 body.push(dataRow);
             });

             return body;
         }

         //Funcion para construir y estilar la tabla en el formato requerido por PDFmake
         function tablescitas(datoscita, columns) {
             return {
                 style: 'tablecitas',
                 table: {
                     widths: ['auto','auto'],
                     headerRows: 1,
                     body: buildTableBody(datoscita, columns)
                 }
             };
         } 


         //Funcion para cambiar los nombres de los valores del JSON para imprimirlos en la tabla
         var objrenombradocitas = objcitas.map( item => { 
             return {Cliente: item.nombre,Motivo: item.motivo_visita}; 
         });


         var docDefinition = {

             //Inicio del contenido del PDF
             content: [
                 {
                     text: 'Citas de: ' +nombrecompleto+ ', del: ' +fecha1 + ' al: '+fecha2, style:'header',alignment:'left'
                 },
                 { 
                     text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                 },

                 { 
                     text: '\t\t\t\tLista de citas', style: 'titulos' 
                 },

                 { 
                     text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                 },

                 { 
                     text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                 },

                 tablescitas(objrenombradocitas, ['Cliente','Motivo']),

                 { 
                     text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                 },

                 { 
                     text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                 },


             ], //Termina contenido del PDF

             //Inician estilos del PDF
             styles: {
                 header: {
                     fontSize: 16,
                     bold: true
                 },

                 titulos: {
                     fontSize: 14,
                     bold: true,
                     decoration: 'underline',
                     alignment: 'center'
                 },

                 negro:{
                     bold:true,
                     fontSize: 12
                 },
                 tablecitas: {
                     margin: [5, 5, 0, 15],
                     fontSize: 12
                 },

                 especial: {
                     margin: [10, 20, 0, 0],
                     fontSize: 12
                 },
                 especialnegro: {
                     bold:true,
                     margin: [10, 20, 0, 0],
                     fontSize: 12
                 },

             },
             //Terminan los estilos del PDF
         };

         pdfMake.createPdf(docDefinition).download("Reporte de Citas de "+nombrecompleto); //Crea y descarga el PDF con el numero dela visita
         //pdfMake.createPdf(docDefinition).open(); //Abre el PDF en el navegador 

         $("#preloader").hide();
         $("#boton").attr('disabled',false);

       }else {
         swal("Cuidado", "...", "warning");
       }
   }
    

    function CitasMesCliente()
    {
        var cliente = $('#cliente').val();
        var mes = $('#mes').val();
        mes = mes.split("/")
        var year = mes[0];
        var mes = mes[1];

        switch (mes)
        {
            case "January":
                mes = "Enero";
                break;
            case "February":
                mes = "Febrero";
                break;
            case "March":
                mes = "Marzo";
                break;
            case "April":
                mes = "Abril";
                break;
            case "Mayo":
                mes = "Mayo";
                break;
            case "June":
                mes = "Junio";
                break;
            case "July":
                mes = "Julio";
                break;
            case "August":
                mes = "Agosto";
                break;
            case "September":
                mes = "Septiembre";
                break;
            case "October":
                mes = "Octubre";
                break;
            case "November":
                mes = "Noviembre";
                break;
            case "December":
                mes = "Diciembre";
                break;
        }

        // alert(cliente);
        // alert(mes);

        if (cliente != "" && mes != "")
        {
            $.ajax({
                url:myBase_url+"index.php/Reportes2/CitasClienteMes",
                type:'POST',
                data:{cliente:cliente, mes:mes, year:year},
                async: false,
                success:function(datos){
                // alert(datos);
                // alert(fecha1);

                $("#preloader").show();
                $("#boton").attr('disabled',true);

                datoscita = datos;

                // alert(datoscita);

                },
                error:function (){
                 swal("Error","1","error");
                }
            });
            var objcitas = JSON.parse(datoscita);
            // alert(objcitas);

            $.ajax({
                url:myBase_url+"index.php/Reportes/Cliente",
                type:'POST',
                data:{cliente:cliente},
                async: false,
                success:function(datos){

                // alert(datos);

                datoscliente = datos;

                },
                error:function (){
                 swal("Error","2","error");
                }
            });

            var objcliente = JSON.parse(datoscliente);
            // alert(objcliente);

            var nombre   = objcliente[0].nombre;
            var apaterno = objcliente[0].apaterno;
            var amaterno = objcliente[0].amaterno;

            // var nombrecompleto = nombre + " " + apaterno " " + amaterno;
            var nombrecompleto = nombre + " " + apaterno + " " + amaterno;

            function buildTableBody(datoscita, columns) {
                var body = [];

                body.push(columns);

                datoscita.forEach(function(row) {
                    var dataRow = [];

                    columns.forEach(function(column) {
                        dataRow.push(row[column].toString());
                    })

                    body.push(dataRow);
                });

                return body;
            }

            //Funcion para construir y estilar la tabla en el formato requerido por PDFmake
            function tablescitas(datoscita, columns) {
                return {
                    style: 'tablecitas',
                    table: {
                        widths: ['auto','auto'],
                        headerRows: 1,
                        body: buildTableBody(datoscita, columns)
                    }
                };
            } 


            //Funcion para cambiar los nombres de los valores del JSON para imprimirlos en la tabla
            var objrenombradocitas = objcitas.map( item => { 
                return {Cliente: item.nombre,Motivo: item.motivo_visita}; 
            });


            var docDefinition = {

                //Inicio del contenido del PDF
                content: [
                    {
                        text: 'Citas de: ' +nombrecompleto+ ', del mes: ' + mes, style:'header',alignment:'left'
                    },
                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\tLista de citas', style: 'titulos' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    tablescitas(objrenombradocitas, ['Cliente','Motivo']),

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },


                ], //Termina contenido del PDF

                //Inician estilos del PDF
                styles: {
                    header: {
                        fontSize: 16,
                        bold: true
                    },

                    titulos: {
                        fontSize: 14,
                        bold: true,
                        decoration: 'underline',
                        alignment: 'center'
                    },

                    negro:{
                        bold:true,
                        fontSize: 12
                    },
                    tablecitas: {
                        margin: [5, 5, 0, 15],
                        fontSize: 12
                    },

                    especial: {
                        margin: [10, 20, 0, 0],
                        fontSize: 12
                    },
                    especialnegro: {
                        bold:true,
                        margin: [10, 20, 0, 0],
                        fontSize: 12
                    },

                },
                //Terminan los estilos del PDF
            };

            pdfMake.createPdf(docDefinition).download("Reporte de Citas de " + nombrecompleto); //Crea y descarga el PDF con el numero dela visita
            //pdfMake.createPdf(docDefinition).open(); //Abre el PDF en el navegador 

            $("#preloader").hide();
            $("#boton").attr('disabled',false);
        }
        else
        {
            swal("Cuidado", "...", "warning");
        }

    }

    function CitasActivoCliente()
    {
        if (true)
        {
            $.ajax({
                url:myBase_url+"index.php/Reportes3/CitasClienteActivo",
                type:'POST',
                async: false,
                success:function(datos){
                // alert(datos);
                // alert(fecha1);

                $("#preloader").show();
                $("#boton").attr('disabled',true);

                datoscita = datos;

                alert(datoscita);

                },
                error:function (){
                 swal("Error","1","error");
                }
            });
            var objcitas = JSON.parse(datoscita);

            function buildTableBody(datoscita, columns) {
                var body = [];
                alert(columns);

                body.push(columns);

                datoscita.forEach(function(row) {
                    var dataRow = [];

                    columns.forEach(function(column) {
                        dataRow.push(row[column].toString());
                    })

                    body.push(dataRow);
                });

                return body;
            }

            //Funcion para construir y estilar la tabla en el formato requerido por PDFmake
            function tablescitas(datoscita, columns) {
                return {
                    style: 'tablecitas',
                    table: {
                        widths: ['auto','auto','auto','auto'],
                        headerRows: 1,
                        body: buildTableBody(datoscita, columns)
                    }
                };
            } 


            //Funcion para cambiar los nombres de los valores del JSON para imprimirlos en la tabla
            var objrenombradocitas = objcitas.map( item => { 
                return {Nombre: item.nombre + ' ' + item.apaterno + ' ' + item.amaterno,Telefono: item.telefono, Email: item.email, Empresa: item.empresa}; 
            });


            var docDefinition = {

                //Inicio del contenido del PDF
                content: [
                    {
                        text: 'Citas de clientes activos', style:'header',alignment:'left'
                    },
                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\tLista de citas', style: 'titulos' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    tablescitas(objrenombradocitas, ['Nombre','Telefono','Email','Empresa']),

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },

                    { 
                        text: '\t\t\t\t\t\t\t\t\t\t\t\t', style: 'negro',alignment:'center' 
                    },


                ], //Termina contenido del PDF

                //Inician estilos del PDF
                styles: {
                    header: {
                        fontSize: 16,
                        bold: true
                    },

                    titulos: {
                        fontSize: 14,
                        bold: true,
                        decoration: 'underline',
                        alignment: 'center'
                    },

                    negro:{
                        bold:true,
                        fontSize: 12
                    },
                    tablecitas: {
                        margin: [5, 5, 0, 15],
                        fontSize: 12
                    },

                    especial: {
                        margin: [10, 20, 0, 0],
                        fontSize: 12
                    },
                    especialnegro: {
                        bold:true,
                        margin: [10, 20, 0, 0],
                        fontSize: 12
                    },

                },
                //Terminan los estilos del PDF
            };

            pdfMake.createPdf(docDefinition).download("Reporte de Citas de clientes activos"); //Crea y descarga el PDF con el numero dela visita
            //pdfMake.createPdf(docDefinition).open(); //Abre el PDF en el navegador 

            $("#preloader").hide();
            $("#boton").attr('disabled',false);
        }
        else
        {
            swal("Cuidado", "...", "warning");
        }

    }

/*END CONTROLLER: Reportes */

/* START CONTROLLER: DASHBOARD */

function RellenaDatosDiaMes(dia)
{
    $("tablahorarios").empty();

    var tempodia = dia;
    var dia = "0"+tempodia;
    date = new Date();
    var anio = date.getFullYear();
    tempo = date.toLocaleString('default',{month:'long'});
    var mes;

    switch(tempo)
    {
        case 'enero':
            mes = "01";
            break;
        case 'febrero':
            mes = "02";
            break;
        case 'marzo':
            mes = "03";
            break;
        case 'abril':
            mes = "04";
            break;
        case 'mayo':
            mes = "05";
            break;
        case 'junio':
            mes = "06";
            break;
        case 'julio':
            mes = "07";
            break;
        case 'agosto':
            mes = "08";
            break;
        case 'septiembre':
            mes = "09";
            break;
        case 'octubre':
            mes = "10";
            break;
        case 'noviembre':
            mes = "11";
            break;
        case 'diciembre':
            mes = "12";
            break;
    }

    if(dia != "" && mes != "" && anio != "")
    {
        $.ajax({
            url:myBase_url+"index.php/Dashboard/CheckDatosCitas",
            type:'POST',
            data:{dia:dia, mes:mes, anio:anio},
            async: false,
            success:function(datos){

                var obj = JSON.parse(datos);
                var fechacompleta = "Detalles del dia : " + anio + "/" + mes + "/" + dia;
                $("#custom-width-modalLable").html(fechacompleta);

                if (obj != "")
                {
                    for (var i = 0; i < obj.length; i++)
                    {
                        var nombre = obj[i].nombre;
                        var apaterno = obj[i].apaterno;
                        var amaterno = obj[i].amaterno;
                        var hora = obj[i].hora;
                        var motivo = obj[i].motivo;

                        var nombrecompleto = nombre + " " + apaterno + " " + amaterno;

                        $("tablahorarios").append("<tr></tr>" + nombrecompleto + "</td><td>" + hora + "</td><tr>")

                    }
                }

            },
            error:function (){
             swal("Error","Ha ocurrido un error","error");
            }
        });
    }
}

/* END CONTROLLER: DASHBOARD */