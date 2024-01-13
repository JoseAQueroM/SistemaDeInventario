$('#btn_guardar').click(function(){
    Swal.fire(
    'Exito!',
    'Se guardo de la manera correcta',
    'success',
    )
    
});

$('#btn_reporte').click(function(){
    Swal.fire(
    'Exito!',
    'Se ha enviado el reporte correctamente',
    'success',
    )
    
});

$('#btn_editar').click(function(){
  Swal.fire(
  'Exito!',
  'Se ha editado correctamente los datos',
  'success',
  )
  
});

$('#btn_eliminado').click(function(){
  Swal.fire(
  'Exito!',
  'Se eliminó correctamente',
  'success',
  )
  
});



$('#btn_actualizar').click(function(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Se actualizo el registro de la manera correcta',
        showConfirmButton: false,
        timer: 1500
      })
});
$('#btn_eliminar').click(function(){
    Swal.fire({
        title: '¿Esta seguro de eliminar el registro?',
        text: "Verifique antes de continuar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Eliminado',
            'Se elimino su registro de la manera correcta',
            'success'
          )
        }
      })
});