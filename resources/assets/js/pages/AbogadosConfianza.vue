<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Abogados de confianza</v-toolbar-title>
            <v-divider
                    class="mx-2"
                    inset
                    vertical
            ></v-divider>

            <v-spacer></v-spacer>
            <v-dialog
      v-model="dialog2"
      max-width="60%"
    >
      <v-card>
        <v-card-title class="headline">Información del abogado</v-card-title>

        <v-card-text>

        <!-- {{editedItem.nombres}}
        {{editedItem.enfoques_abogados.nombre}}
        {{editedItem.tipos_abogados.nombre}} -->



        </v-card-text>

        <v-card-actions>


          <v-spacer></v-spacer>


        </v-card-actions>
      </v-card>
    </v-dialog>
            <v-spacer></v-spacer>
            <v-dialog v-model="dialog" max-width="90%">
                <v-btn slot="activator" @click="init_reg" color="primary" dark class="mb-2">Registrar Abogado</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">{{ formTitle }}</span>
                    </v-card-title>

                    <v-card-text>

            <v-stepper v-model="step" vertical>
              <v-stepper-header>
                <v-stepper-step editable step="1" :complete="step > 1">Datos basicos</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step  step="2" :complete="step > 2">Enfoque diferencial</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step editable  step="3" :complete="step > 3">En representación</v-stepper-step>
                <v-divider></v-divider>

              </v-stepper-header>
            <v-stepper-items>
              <v-stepper-content step="1">
                <v-form
                 ref="form_step_1"
                 v-model="valid"
                 lazy-validation
               >
               <v-layout >
                 <!-- <v-flex
                    xs12
                    md4
                  >
                 <v-select
                         v-model="editedItem.enfoques_abogados_id"
                         :items="enfoques_abogado"
                         label="Departamento al que pertenece"
                         item-text="nombre"
                         item-value='id'
                         :rules="requiredRules"
                         chips
                 ></v-select>
                 </v-flex> -->
              <v-flex

               >
                <v-select
                        v-model="editedItem.tipos_abogados_id"
                        :items="tipos_abogado"
                        label="Tipo de abogado"
                        item-text="nombre"
                        item-value='id'
                        disabled
                        :rules="requiredRules"
                        chips
                ></v-select>
                </v-flex>
              </v-layout>
              <label>Nombre completo</label>
                 <v-text-field label="Primer nombre" v-model="editedItem.nombres_nombre1"   :rules="requiredRules" ></v-text-field>
                 <v-text-field label="Segundo nombre" v-model="editedItem.nombres_nombre2"></v-text-field>
                 <v-text-field label="Primer apellido" v-model="editedItem.nombres_apellido1"   :rules="requiredRules" ></v-text-field>
                 <v-text-field label="Segundo apellido" v-model="editedItem.nombres_apellido2"></v-text-field>
                 <v-layout>
                 <v-flex
                    xs12
                    md4
                  >
                          <v-select
                                  v-model="editedItem.tipos_documentos_id"
                                  :items="tipo_documentos"
                                  label="Tipo de documento"
                                  item-text="nombre"
                                  item-value='id'
                                  :rules="requiredRules"
                                  chips
                          ></v-select>
                          </v-flex>
                <v-flex
                   xs12
                   md4
                 >
                 <v-text-field label="Número de documento" v-model="editedItem.no_identificacion" :rules="[rules.number_vacio]"></v-text-field>
               </v-flex>
               </v-layout>
                 <v-text-field label="Tarjeta profesional" v-model="editedItem.tarjeta_profesional" :rules="[rules.number_vacio]" ></v-text-field>
                 <v-text-field label="Dirección" v-model="editedItem.direccion_residencia" :rules="requiredRules"  required></v-text-field>
                 <v-text-field label="Teléfono" v-model="editedItem.telefono_contacto" :rules="requiredRules"  required></v-text-field>
                 <v-text-field label="Correo electrónico" v-model="editedItem.correo" :rules="requiredRules" required></v-text-field>
                 <template v-for="(documento, index) in documentos_requeridos">

                                 <cargar-documento :documento="documento" tipo="" ></cargar-documento>

                                 <!-- <span class="pa-2" v-if='editedItem.adjunto_tarjeta_profesional'>
                                   {{editedItem.adjunto_tarjeta_profesional}}
                                   <v-icon color="green darken-2">check</v-icon>
                                  </span> -->
                                  <!--
                                  Experiencia que guarde ID de abogado
                                  Que se muestren los documentos cargados en editar
                                  Que se muestre la info de cada abogado en el ojito
                                  Registro abogado de confianza
                                   -->
                             </template>

                <v-btn color="primary" @click="validate($refs.form_step_1,2)">Siguiente</v-btn>
                    </v-form>
              </v-stepper-content>
              <v-stepper-content step="2">
                <v-form
                 ref="form_step_2"
                 v-model="valid"
                 lazy-validation
                >
                          <v-select
                                  v-model="editedItem.sexo_id"
                                  :items="sexos"
                                  label="Sexo"
                                  item-text="nombre"
                                  item-value='id'
                                  :rules="requiredRules"
                                  chips
                          ></v-select>



                          <v-select
                                  v-model="editedItem.identidades_generos_id"
                                  :items="generos"
                                  label="Identidad de generos"
                                  item-text="nombre"
                                  item-value='id'
                                  chips
                          ></v-select>



                          <v-select
                                  v-model="editedItem.etnia_id"
                                  :items="etnias"
                                  label="Pertenencia étnica"
                                  item-text="nombre"
                                  item-value='id'
                                  chips
                          ></v-select>


              <v-text-field label="Grupo étnico" v-model="editedItem.grupo_etnico"></v-text-field>


                <v-btn flat @click.native="step = 1">Anterior</v-btn>
                <v-btn color="primary" @click="validate($refs.form_step_2,3)">Siguiente</v-btn>
</v-form>
              </v-stepper-content>
              <v-stepper-content step="3">
                <v-form
                 ref="form_step_3"
                 v-model="valid"
                 lazy-validation
                >
                <div v-for='(item, index) in editedItem.apoderado'>




        				<v-text-field label="Nombre" v-model="item.nombre" required></v-text-field>
        				<v-text-field label="Documento" v-model="item.documento" required></v-text-field>
                <v-select
                        v-model="item.tipo_apoderado"
                        :items="tipos_apoderados"
                        label="Tipo apoderado"
                        item-text="nombre"
                        item-value='id'
                        chips
                ></v-select>

                <v-spacer></v-spacer>
                <v-btn color="danger" @click="less_skillset(index)">-</v-btn>
                <v-spacer></v-spacer>
        </div>
<v-btn color="info" @click="add_skillset">+</v-btn>
        <!-- <v-text-field label="Adjuntar Vigencia tarjeta profesional (PDF)"  v-model='editedItem.adjunto_tarjeta_profesional' prepend-icon='attach_file'></v-text-field>
				<v-text-field label="Adjuntar Penales (PDF)"  v-model='editedItem.adjunto_penales' prepend-icon='attach_file'></v-text-field>
				<v-text-field label="Adjuntar Contravencionales (PDF)"  v-model='editedItem.adjunto_contavencionales' prepend-icon='attach_file'></v-text-field>
				<v-text-field label="Adjuntar Disciplinarios CSJ (PDF)"  v-model='editedItem.adjunto_csj' prepend-icon='attach_file'></v-text-field>
				<v-text-field label="Adjuntar Disciplinarios PGN (PDF)"  v-model='editedItem.adjunto_pgn' prepend-icon='attach_file'></v-text-field> -->

                <v-btn flat @click.native="step = 2">Anterior</v-btn>
                <v-btn color="primary" @click.prevent="save">Guardar</v-btn>
</v-form>
              </v-stepper-content>
            </v-stepper-items>
          </v-stepper>

                    </v-card-text>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click="close">CANCELAR</v-btn>
                        <!-- <v-btn color="blue darken-1" flat @click="save">Save</v-btn> -->
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-toolbar>

    </div>
</template>

<script>
import { EventBus } from '../EventBus'
import CargarDocumento from '../components/CargarDocumento'
  export default {
    data: () => ({
      step: 1,
      valid: true,
      dialog: false,
      dialog2: false,
      headers: [
        {text: 'Nombre', value: 'nombres'},
        {text: 'Identificación', value: 'no_identificacion'},
        {text: 'Tarjeta profesional', value: 'tarjeta_profesional'},
        {text: 'Departamento', value: 'enfoques_abogados_id'},
        {text: 'Tipo', value: 'tipos_abogados_id'},
        // {text: 'Fecha fin contrato', value: 'fecha_fin_contrato'},
        {text: 'Estado', value: 'activo'},
        {text: 'Actions', value: 'name', sortable: false},
      ],
      tableData: [],
      editedIndex: -1,
      etnias:[],
      generos:[],
      documentos_requeridos:['Vigencia tarjeta profesional'],
      tipos_apoderados:['Compareciente','Victima'],
      sexos:[],
      tipo_documentos:[],
      documento:"",
      enfoques_abogado:[],
      tipos_abogado:[],
      menu:'',
      menu_fecha_titulo:[],
      menu_fecha_ingreso:[],
      menu_fecha_salida:[],
      menu_fecha_inicio_contrato:false,
      menu_fecha_fin_contrato:false,
      num_docs:1,
      openFileDialog:[],
      date:'',
      items_educa:0,
        file:{},
        selected_archivo:{},
        upload_success:false,
        upload_failed:false,
        spinner_on:false,
        documento: '',
      educa:{
        id:-1,
        universidad:'',
        grado:'',
        titulo:'',
        pais:'',
        pre_pos:'',
      },
        documento: '',
      apodera:{
        id:-1,
        nombre:'',
        documento:'',
        tipo_apoderado:'',
      },
      items_educa:0,
      exper:{
        id:-1,
        cargo:'',
        entidad:'',
        fecha_ingreso:'',
        fecha_salida:'',
      },
      editedItem: {
        name: '',
        email: '',
        tarjeta_profesional: '',
        tipos_abogados_id: 2,
        role:{},
        permissions:[],
        apoderado:[],
        files_to_upload:[],
        created_at: '',
      },
      defaultItem: {
        name: '',
        email: '',
        tarjeta_profesional: '',
        tipos_abogados_id: 2,
        role:{},
        permissions:[],
        apoderado:[],
        files_to_upload:[],
        created_at: '',
      },

      rules: {
          required: value => !!value || 'Este campo es obligatorio',
          email: value => {
            const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            return pattern.test(value) || 'Correo Electrónico Invalido.'
          },
          email_vacio: value => {
            const pattern =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
            return pattern.test(value) ||!value || 'Correo Electrónico Invalido'
          },
          number_vacio: value => {
            const pattern =  /^\d+(\.\d)?$/
            return pattern.test(value) ||!value || 'Este campo debe contener dígitos únicamente'
          },


        },
      requiredRules: [
            v => !!v || 'Este campo es obligatorio',
            //v => /^\d+(\.\d)?$/.test(v) || 'Número de documento debe contener dígitos únicamente'
        ],

    }),
    components:{
      'cargar-documento': CargarDocumento
    },
    computed: {
      formTitle() {
        return this.editedIndex === -1 ? 'Registrar abogado' : 'Editar abogado';
      },
    },

    watch: {
      dialog(val) {
        val || this.close();
      },
    },

    created() {
      this.initialize();
    },
    mounted(){
          this.num_docs=1;
         // EventBus.$on('file-upload-success', (id) => {
         //      this.openFileDialog[id]=false;
         //      // this.editedItem.adjunto_tarjeta_profesional=event.target.files[0];
         //      console.log(id);
         //    });
            EventBus.$on('file-to-upload', (file_to_upload,nombreAdjunto) => {
                 // this.openFileDialog=false;
                 this.editedItem.files_to_upload[nombreAdjunto]=file_to_upload;
                 // this.editedItem.this[nombreAdjunto]=file_to_upload;
                 console.log("Archivo recibido = "+file_to_upload);
                 // console.log(this.editedItem.this[nombreAdjunto]);
                 console.log(this.editedItem);
                 // this.no_upload[this.num_docs]=false;
               });

        },

    methods: {
      initialize() {

      //  this.editedItem.educacion.push(Object.assign({},this.educa));
        // this.editedItem.experiencia.push(Object.assign({},this.experiencia));
        // console.log(this.editedItem)
        // axios.get('/api/abogados').then(response => {
        //   console.log(response);
        //   this.tableData = response.data.data;
        // });

        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);

        axios.get('/api/tipo_documentos').then(response => {
          this.tipo_documentos=response.data.data;
        });

        axios.get('/api/sexos').then(response => {
          this.sexos=response.data.data;
        });

        axios.get('/api/generos').then(response => {
          this.generos=response.data.data;
        });

        axios.get('/api/etnias').then(response => {
          this.etnias=response.data.data;
        });

        axios.get('/api/enfoques_abogado').then(response => {
          this.enfoques_abogado=response.data.data;
        });

        axios.get('/api/tipos_abogado').then(response => {
          this.tipos_abogado=response.data.data;
        });

      },

      editItem(item) {
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      showItem(item) {
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog2 = true;
      },

      deleteItem(item) {
        const index = this.tableData.indexOf(item);
        confirm('Esta seguro que desea borrar el registro?') && this.tableData.splice(index, 1);

        axios.delete('/api/abogados/'+item.id).then(response=>console.log(response.data))

      },

      validate (form_s,next_step) {
        if (form_s.validate()) {
          this.step = next_step;
        }
      },

      add_skillset () {
          // this.items_educa++;
          this.editedItem.apoderado.push(Object.assign({},this.apodera));
      },

      less_skillset (index) {
          this.$delete(this.editedItem.apoderado,index);
      },



      init_reg () {
          // this.items_educa++;

          // (!this.editedItem.educacion) ? this.editedItem.educacion = Object.assign({}, this.educa) : console.log("SI existe");;
            // this.editedItem.educacion = Object.assign({}, this.educa);
            // if(this.editedItem.educacion)
            // {
              //this.editedItem.educacion = {};

              this.editedItem.apoderado.push(Object.assign({},this.apodera));

              // this.$refs.form_step_1.reset()
              this.$refs.form_step_2.reset()
              this.$refs.form_step_3.reset()
          //  }
          // (!this.editedItem.educacion)?this.editedItem.educacion.push(Object.assign({},this.educa));
      },
      agregar_documento(){
        this.openFileDialog[this.num_docs]=true;
        // console.log("el documento para open = "+documento);
        // this.openFileDialog[1]=true;
       this.num_docs++;


      },
      delete_skillset (id_set) {
          this.items_educa++;
      },

      close() {
        this.dialog = false;
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem);
          this.editedIndex = -1;
        }, 300);
      },

      save() {
        // console.log("Entro a save");
        //  documentos_requeridos:['Vigencia tarjeta profesional','Penales','Contravencionales','Disciplinarios CSJ', 'Diciplinarios PGN'],
        // <!-- <v-text-field label="Adjuntar Vigencia tarjeta profesional (PDF)"  v-model='editedItem.adjunto_tarjeta_profesional' prepend-icon='attach_file'></v-text-field>
        // <v-text-field label="Adjuntar Penales (PDF)"  v-model='editedItem.adjunto_penales' prepend-icon='attach_file'></v-text-field>
        // <v-text-field label="Adjuntar Contravencionales (PDF)"  v-model='editedItem.adjunto_contavencionales' prepend-icon='attach_file'></v-text-field>
        // <v-text-field label="Adjuntar Disciplinarios CSJ (PDF)"  v-model='editedItem.adjunto_csj' prepend-icon='attach_file'></v-text-field>
        // <v-text-field label="Adjuntar Disciplinarios PGN (PDF)"  v-model='editedItem.adjunto_pgn' prepend-icon='attach_file'></v-text-field> -->

        if(this.editedItem.files_to_upload)
        {
          console.log('Si existe files_to_upload')

            // this.documentos_requeridos.forEach(function(elemento) {
            //   console.log("en el array = "+elemento);
            //   if(this.editedItem.files_to_upload['"'+element+'"'])
            //   {
            //     this.editedItem.adjunto_tarjeta_profesional=this.editedItem.files_to_upload['"'+element+'"'].name
            //     this.file = this.editedItem.files_to_upload['"'+element+'"'];
            //
            //     var formData = new FormData();
            //     formData.append('archivo', this.file);
            //     formData.append('identificacion', this.editedItem.no_identificacion);
            //     console.log("A guardar = "+this.file.name);
            //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
            //   }

            // });

          if(this.editedItem.files_to_upload['Vigencia tarjeta profesional'])
          {
                this.editedItem.adjunto_tarjeta_profesional=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name
              this.file = this.editedItem.files_to_upload['Vigencia tarjeta profesional'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Disciplinarios CSJ'])
          {
                this.editedItem.adjunto_csj=this.editedItem.files_to_upload['Disciplinarios CSJ'].name
              this.file = this.editedItem.files_to_upload['Disciplinarios CSJ'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Penales'])
          {
                this.editedItem.adjunto_penales=this.editedItem.files_to_upload['Penales'].name
              this.file = this.editedItem.files_to_upload['Penales'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Contravencionales'])
          {
                this.editedItem.adjunto_contravencionales=this.editedItem.files_to_upload['Contravencionales'].name
              this.file = this.editedItem.files_to_upload['Contravencionales'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Diciplinarios PGN'])
          {
                this.editedItem.adjunto_pgn=this.editedItem.files_to_upload['Diciplinarios PGN'].name
              this.file = this.editedItem.files_to_upload['Diciplinarios PGN'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }
          // if(this.editedItem.files_to_upload['Penales'])
          // {this.editedItem.adjunto_penales=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].nam.namee}
          // if(this.editedItem.files_to_upload['Contravencionales'])
          // {this.editedItem.adjunto_contavencionales=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name}
          // if(this.editedItem.files_to_upload['Disciplinarios CSJ'])
          // {this.editedItem.adjunto_csj=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name}
          // if(this.editedItem.files_to_upload['Diciplinarios PGN'])
          // {this.editedItem.adjunto_pgn=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name}
        }
        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);

          axios.put('/api/abogados/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          console.log("Entró a save");


          // console.log(this.editedItem)
          axios.post('/api/abogados',this.editedItem).then(response=>{
            this.tableData.push(response.data.abogado);
            // console.log(response.data)

          });
        }
        this.close();
      },
    },
  };
</script>
