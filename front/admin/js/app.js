const app = new Vue({
    
    el: '#app',
    data: {        
        persona: null
    },
    created () {
        //aca se llama a la api que trae el detalle de producto y se actualiza el objeto mapeado
        this.persona = {nombre:'martin',apellido:'esses'};
    },
});