<template>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form-component @new="agregarPensamiento(...arguments)">
                </form-component>

                <pensamiento-component 
                    v-for="(pensamiento, index) in pensamientos" 
                    :key="pensamiento.id" 
                    :pensamiento="pensamiento"
                    @update="actualizarPensamiento(index, ...arguments)"
                    @delete="borrarPensamiento(index)">
                </pensamiento-component>

            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                  pensamientos:[]
            }
        },
        mounted() {
            axios.get('/pensamientos').then((response)=>{
                this.pensamientos = response.data;
            });
        },
        methods:{
            agregarPensamiento(pensamiento){
                this.pensamientos.push(pensamiento);
                
            },
            actualizarPensamiento(index ,pensamiento){
               
                this.pensamientos[index] = pensamiento;
            },

            borrarPensamiento(index){
               
                this.pensamientos.splice(index, 1);
            },
        }
    }
</script>
