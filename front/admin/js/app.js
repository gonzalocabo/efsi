const app = new Vue({
    
    el: '#app',
    data: {        
        producto: {}
    },
    created () {
        //aca se llama a la api que trae el detalle de producto y se actualiza el objeto mapeado
        let uri = window.location.search.substring(1); 
        let params = new URLSearchParams(uri);
        console.log("id: "+params.get("idProducto"));
        if(params.get("idProducto")!=null&&params.get("idProducto")>0){
            var formData=new FormData();
            formData.append('accion',"obtenerporid");
            formData.append('id',params.get("idProducto"));
            axios.post("http://localhost/controllers/productoController.php",formData).then(function(response){
                this.producto=response.data; 
            }).catch(function(error){console.log(error);});
        }
    },
});