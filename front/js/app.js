const app = new Vue({
    el: '#app',
    data: {
        producto:{}
    },
    created () {
        let uri = window.location.search.substring(1); 
        let params = new URLSearchParams(uri);
        console.log("id: "+params.get("id"));
        var that=this;
        if(params.get("id")!=null&&params.get("id")>0){
            var formData=new FormData();
            var id=params.get("id");
            formData.append('accion','obtenerporid');
            formData.append('id',id);
            axios.post("http://localhost/controllers/productoController.php",formData).then(function(response){
				console.log(response.data);
				$('#imagenProducto').append('<img class="product-big-img" src="/uploads/fotos/productos/'+response.data.foto+'"alt="">');
				that.producto=response.data;
				zoom();
			}).catch(function(error){console.log(error);});
        }
    },
});