
function inscribirse(presentacion_id){
    //alert("aqui");
    //alert(idtipo);
    //alert(idfact);
    $.ajax({
        type: "GET",
        url: "/mescyt/frontend/web/index.php/asignar_presentacion?presentacion_id="+presentacion_id,
        
        }).done(function( data ) {
            if(data==1)
                {
		$('presentacion_ver').html(data);
                alert("Resgistro realizado");
             //   $(presentacion_id+"regis").css();
                }
                return;
            
        
        });
    
}