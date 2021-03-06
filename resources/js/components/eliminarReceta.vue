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
            this.$swal.fire({
            title: 'Esta seguro de eliminar esta receta?',
            width: 600,
            padding: '3em',
            background: '#fff url(/images/trees.png)',
            backdrop: `
                rgba(0,0,123,0.4)
                url("/images/gif-anime.gif")
                left top
                no-repeat
            `,
            text: "Esta accion no sera reversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#47C11F',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar receta!',
             cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                const params={
                    id:this.idReceta
                }
                axios.post(`/recetas/${this.idReceta}`,{params, _method:'delete'})
                .then(respuesta=>{
                    this.$swal.fire(
                    'Receta eliminada!',
                    'Tu receta se ha eliminado.',
                    'success'
                    )
                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentElement);
                })
                .catch(error=>{
                    console.log(error);
                })

            } else {
                this.$swal.fire(
                'Accion Cancelada',
                'Tu receta no ha sido eliminada',
                'error'
                )
            }
            })
        }
    }

}
</script>
