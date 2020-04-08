<template>
    <div class="card my-2">
        <div class="card-header">
          <h6 class="h6-responsive text-secondary card-title">Creado por {{pensamiento.user_id}}</h6>
         
        </div>
        <div class="card-body">
          
          <input v-if="editMode" type="text" class="form-control" v-model="pensamiento.descripcion"></input>
          <p v-else>{{pensamiento.descripcion}}</p>
        </div>
        <div class="card-footer">
          <button v-if="editMode" class="btn btn-primary btn-sm" v-on:click="updatePensamiento()">
                <i class="far fa-save"></i>&nbsp;Guardar Cambios
          </button>
          <button v-else class="btn btn-secondary btn-sm" v-on:click="editPensamiento()">
                <i class="fas fa-pen"></i> Editar
          </button>
          <button class="btn btn-danger btn-sm" v-on:click="deletePensamiento()">
                <i class="fas fa-times"></i> Borrar
          </button>
           <p class="card-text text-right"><small class="text-muted">Creado&nbsp;{{pensamiento.created_at}} - Editado&nbsp;{{pensamiento.updated_at}}</small></p>
        </div>
      </div>
</template>

<script>
    export default {
        props:['pensamiento'],
        
        data(){
          return{
              editMode:false
          };
        },
        mounted() {
            console.log('PensamientoComponent mounted.')
        },
        methods:{
            deletePensamiento(){
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(()=> {
                  this.$emit('delete');
                });
                
            },
            editPensamiento(){
                this.editMode = true;
            },
            updatePensamiento(){
                const params = {
                    descripcion : this.pensamiento.descripcion
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`,params).then((response)=>{
                    this.editMode = false;
                    const pensamiento = response.data;
                    this.$emit('update',pensamiento);
                });
                
            }
        }
    }
</script>