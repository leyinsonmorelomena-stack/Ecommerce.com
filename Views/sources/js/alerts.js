/*================================================
Formatear envio de fomularios / limpia los campos
================================================*/
function formatearCamposFormulario(){
    if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
}



/*=====================================
            SweetAlert2
=====================================*/

function sweetAlert(titulo,text,icono,url = null){

    if(url){
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
        });
    }else{
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success"
            });
          }
        });
    }

}