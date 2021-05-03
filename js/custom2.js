function errormsj(dato)
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Revisa el campo de: |'+dato+' y vuelve a intentarlo.',
    })
};

function registrado(dato)
{
    Swal.fire({
        icon: 'success',
        title: 'Registrado correctamente!',
        text: 'Bienvenid@! '+dato,
        footer: 'Por favor verifica tu correo electrónico para activar tu cuenta.'
    })
};

function erroremail()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Ese no es un correo electrónico válido.',
    })
};

function erroremail2()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Ese correo electrónico ya esta registrado.',
    })
};

function erroremail3()
{
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'No hemos podido enviar tu correo de verificacion debido a un error inesperado, por favor ponte en contacto con nosotros.',
    })
};

function errorcontraseña()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Las contraseñas no son identicas.',
    })
};

function verifsuccess()
{
    Swal.fire({
        icon: 'success',
        title: 'Verificad@ correctamente!',
        text: 'Ahora puedes acceder a funciones adicionales.'
    })
};

function veriferror()
{
    Swal.fire({
        icon: 'error',
        title: 'Hubo un error inesperado al momento de verificar tu cuenta',
        text: 'Si sigues recibiendo este error, ponte en contacto con nosotros.'
    })
};

function alreadyverif()
{
    Swal.fire({
        icon: 'warning',
        title: 'Su cuenta ya ha sido Verificada',
        text: 'Ya puede iniciar sesión en nuestra pagina web.'
    })
};

function errorcuenta()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'El correo o la contraseña no coinciden.',
    })
};

function logueado(dato)
{
    Swal.fire({
        icon: 'success',
        title: 'Logueado correctamente!',
        text: 'Bienvenid@! '+dato,
    })
};

function errorcomentario()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hubo un error al comentar, intenta de nuevo.',
    })
};

function comentario()
{
    Swal.fire({
        icon: 'success',
        title: 'Enviado correctamente!',
        text: 'Tu comentario se envió.',
    })
};

function respuesta(dato)
{
    Swal.fire({
        title: 'Responder',
        html:'<form method="POST">' +
             '<input name="ComID" type="hidden" value="'+dato+'">' +
             '<input name="Respuesta" class="swal2-input">' +
             '<button name="Respuestabtn" type="submit" class="swal2-input btn-success">Enviar</button>' +
             '</form>',
        showConfirmButton: false,
        showCancelButton: true,
    })
}

function respuestaok()
{
    Swal.fire({
        icon: 'success',
        title: 'Enviado correctamente!',
        text: 'Tu respuesta se envió.',
    })
};

function errorrespuesta()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hubo un error al responder, intenta de nuevo.',
    })
};

function errorimagen()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hubo un error al subir la imagen, intenta de nuevo.',
        footer: 'Se permiten archivos .jpeg | .jpg | .png y un tamaño maximo de 500 MB'
    })
};

function errordatos()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hubo un error, revisa las entradas',
        footer: 'Intenta de nuevo'
    })
};

function editadook()
{
    Swal.fire({
        icon: 'success',
        title: 'Editado correctamente!',
        text: 'El artículo se editó.',
    })
};

function creadook()
{
    Swal.fire({
        icon: 'success',
        title: 'Creada correctamente!',
        text: 'El artículo se creó.',
    })
};

function eliminadook()
{
    Swal.fire({
        icon: 'success',
        title: 'Eliminada correctamente!',
        text: 'El artículo se eliminó.',
    })
};

function eliminarcm(dato)
{
    Swal.fire({
        title: '¿Quieres eliminar el comentario con ID: '+dato+'?',
        html:'<form method="POST">' +
             '<input name="ComID" type="hidden" value="'+dato+'">' +
             '<button name="EliminarCom" type="submit" class="swal2-input btn-danger">Eliminar</button>' +
             '</form>',
        showConfirmButton: false,
        showCancelButton: true,
    })
}

function eliminarR(dato)
{
    Swal.fire({
        title: '¿Quieres eliminar la respuesta con ID: '+dato+'?',
        html:'<form method="POST">' +
             '<input name="ResID" type="hidden" value="'+dato+'">' +
             '<button name="EliminarR" type="submit" class="swal2-input btn-danger">Eliminar</button>' +
             '</form>',
        showConfirmButton: false,
        showCancelButton: true,
    })
}

function CmEliminado()
{
    Swal.fire({
        icon: 'success',
        title: 'Eliminado correctamente!',
        text: 'El comentario y sus respuestas se eliminaron.',
    })
};

function REliminado()
{
    Swal.fire({
        icon: 'success',
        title: 'Eliminado correctamente!',
        text: 'La respuesta se eliminó.',
    })
};

function editadoevaok()
{
    Swal.fire({
        icon: 'success',
        title: 'Editado correctamente!',
        text: 'El evangelio se editó.',
    })
};

function editusererror()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Hubo un error al editar el usuario, revisa los datos.',
        footer: 'Intenta de nuevo'
    })
}

function editadoUok()
{
    Swal.fire({
        icon: 'success',
        title: 'Editado correctamente!',
        text: 'El usuario se editó.',
    })
};

function cuentainactiva()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Su cuenta se encuentra inactiva.',
        footer: 'Ponte en contacto con un Administrador.'
    })
}

function cuentanoverif()
{
    Swal.fire({
        icon: 'info',
        title: 'Oops...',
        text: 'Su cuenta aun no ha sido verificada.',
        footer: 'Por favor verifica tu cuenta.'
    })
}

function eliminadouser()
{
    Swal.fire({
        icon: 'success',
        title: 'Eliminado correctamente!',
        text: 'El usuario se eliminó.',
    })
};

function creadosliok()
{
    Swal.fire({
        icon: 'success',
        title: 'Añadido correctamente!',
        text: 'El slider se añadió.',
    })
};

function eliminarS(dato)
{
    Swal.fire({
        title: '¿Quieres eliminar el Slider con ID: '+dato+'?',
        html:'<form method="POST">' +
             '<input name="SID" type="hidden" value="'+dato+'">' +
             '<button name="Eliminar" type="submit" class="swal2-input btn-danger">Eliminar</button>' +
             '</form>',
        showConfirmButton: false,
        showCancelButton: true,
    })
};

function slidererror()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Error al insertar posiciones.',
        footer: 'Verifica tus entradas.'
    })
}

function sliderok()
{
    Swal.fire({
        icon: 'success',
        title: 'Editado correctamente!',
        text: 'El slider se editó.',
    })
};

function eliminarEva(dato)
{
    Swal.fire({
        title: '¿Quieres eliminar el Evangelio con ID: '+dato+'?',
        html:'<form method="POST">' +
             '<input name="EID" type="hidden" value="'+dato+'">' +
             '<button name="Eliminar" type="submit" class="swal2-input btn-danger">Eliminar</button>' +
             '</form>',
        showConfirmButton: false,
        showCancelButton: true,
    })
};

function evaok()
{
    Swal.fire({
        icon: 'success',
        title: 'Creado correctamente!',
        text: 'El evangelio se creó.',
    })
};

function evaerrorfecha()
{
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Error al insertar la fecha.',
        footer: 'Ya hay un evangelio programado para ese dia'
    })
}

function evaeditok()
{
    Swal.fire({
        icon: 'success',
        title: 'Editado correctamente!',
        text: 'El evangelio se editó.',
    })
};

function pass()
{
    Swal.fire({
        icon: 'info',
        title: '¿Tienes problemas?',
        text: 'Ponte en contacto con un Administrador',
        footer: 'Email: x@gmail.com'
    })
}