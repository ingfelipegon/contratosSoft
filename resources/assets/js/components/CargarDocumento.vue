<template>
<div>


            <div class="title font-weight-bold"> {{documento}} (max. 5MB solo PDF o imagen)
              <v-btn fab dark small color="indigo" @click="$refs.inputUpload.click()" >
                  <v-icon dark>attach_file</v-icon>
                </v-btn>
                 </div>
                 <span class="pa-2" v-if='upload_success'>
                       {{this.file.name}}
                       <v-icon color="green darken-2">check</v-icon>
                      </span>

<input v-show="false" id="archivo"  accept="application/pdf" ref="inputUpload" type="file" @change="uploadFile" >

</div>
</template>
<script>

import { EventBus } from '../EventBus.js'

export default {

 components: {

 },

 props:['documento','tipo'],

 data: () => ({


       selected_archivo:{},
       upload_success:false,
       upload_failed:false,
       spinner_on:false,
       file:{},


   }),

   mounted () {

      if (Object.keys(this.documento).length !== 0) {

      }

     },

     watch:{




     },


     methods:{


         checkIfDocumentoEstaCargado(){
             if (this.documentos_cargados.length >0 && this.documentos_cargados.includes(this.documento.id)) this.upload_success=true;

         },

          uploadFile(event){
              this.upload_success=true;
              this.spinner_on=false;

             this.file = event.target.files[0];
             if(this.tipo==null)
             {this.tipo="";}
            EventBus.$emit('file-to-upload',this.file,this.documento,this.tipo);

       } ,

     }

 }

</script>
