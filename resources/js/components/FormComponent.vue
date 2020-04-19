<template>
    <div class="card mb-2">
        <div class="card-header">
          <h6 class="card-title">¿En que estas pensando ahora?</h6>
          <form action="" v-on:submit.prevent="newPensamiento()">
              <div class="form-group">
                <label for="exampleInputEmail1">Ahora estoy pensando en:</label>
                <input type="text" class="form-control" id="pensamiento" aria-describedby="emailHelp" name="pensamiento" v-model="descripcion" state="true">
                <button class="btn btn-primary my-2" type="submit"><i class="fas fa-plus"></i> Nuevo</button>
              </div>
          </form>
        </div>
      </div>
</template>

<script>
    export default {
        data(){
            return{
              descripcion: '',
            }
        },
        mounted() {
            console.log('FormComponent mounted.')
        },
        methods: {
            newPensamiento(){
                const params = {
                    descripcion : this.descripcion,
                };
                this.descripcion = '';
                axios.post('/pensamientos',params)
                  .then((response)=> {
                    const pensamiento = response.data;
                    this.$emit('new', pensamiento);
                  });
            }
        }
    }
</script>
