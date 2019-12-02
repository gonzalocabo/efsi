const app = new Vue({
    
    el: '#app',
    data: {      
        producto: {},
        selected: '0',
        options:[]
        
    },
    created () {
        //aca se llama a la api que trae el detalle de producto y se actualiza el objeto mapeado
        let uri = window.location.search.substring(1); 
        let params = new URLSearchParams(uri);
        console.log("id: "+params.get("id"));
        var that=this;
        if(params.get("id")!=null&&params.get("id")>0){
            var formData=new FormData();
            formData.append('accion',"obtenerporid");
            formData.append('id',params.get("id"));
            axios.post("http://localhost/controllers/productoController.php",formData).then(function(response){
                that.producto=response.data;
            }).catch(function(error){console.log(error);});
        }
        var formData=new FormData();
        formData.append('accion', 'listarActivos');
        axios.post('http://localhost/controllers/categoriaController.php',formData).then(function(response){
            that.options=response.data;
            if(params.get("id")!=null&&params.get("id")>0){
                $.each(response.data,function(index,value){
                    if(value.nombre==that.producto.categoria){
                        that.selected=index+1;
                    }
                });
            }
            
        }).catch(function (error){console.log(error)});
    },
});