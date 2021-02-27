<template>
    <input type="submit" class="btn btn-danger" value="Eliminar" v-on:click="eliminarReceta">
</template>

<script>
export default {
    props:['idReceta'],
    mounted(){
        console.log('id receta', this.idReceta)
    },
    methods:{
        eliminarReceta(){
            console.log('hola', this.idReceta)
        }
    }

}
</script>
