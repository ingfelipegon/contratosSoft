<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
        <v-toolbar-title>Configuracion Base del Registro Anual de Adquisiciones</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>
        <v-dialog v-model="dialog2" max-width="60%">
          <v-card>
            <v-card-text> 
              <div>
                <h4 class="headline mb-0">Información PAA - ITEM: {{editedItem.item}}</h4>
                  <div> <label>Código UNSPSC : </label> {{editedItem.codUNSPSC}}</div>
                  <div> <label>Número de Ítem : </label>  {{editedItem.item}} </div>
                  <div> <label>Descripción : </label>  {{editedItem.descripcion}} </div>
                  <div> <label>Mes estimado de inicio de proceso de selección: </label>  {{editedItem.mesinicio}} </div>
                  <div> <label>Mes estimado de presentación de ofertas : {{editedItem.mesoferta}}</label> </div>
                  <div> <label>Duración estimada del contrato (número) : {{editedItem.duracion}} </label></div>
                  <div> <label>Duración estimada del contrato (intervalo: días, meses, años): </label> {{editedItem.unidadtiempo_id}} </div>
                  <div> <label>Modalidad de selección : </label> {{editedItem.modalidad_id}} </div>
                  <div> <label>Fuente de los recursos: </label> {{editedItem.fuente_id}} </div>
                  <div> <label>Valor total estimado: </label> {{editedItem.valortotal}} </div>
                  <div> <label>Valor estimado en la vigencia actual: </label> {{editedItem.valorvigencia}} </div>
                  <div> <label>Estado de solicitud de vigencias futuras: </label> {{editedItem.estadovigencia}} </div>
                  <div> <label>Datos de contacto del responsible: </label> {{editedItem.nombreresponsable}} </div>
              </div>        
            </v-card-text>   
          </v-card>
        </v-dialog>
        <v-dialog max-width="60%">
            <v-card>
                <v-card-title class="headline">{{ formTitle }}</v-card-title>
                <v-card-text>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                </v-card-actions>
            </v-card>    
        </v-dialog>
        <v-spacer></v-spacer>
        
        <v-dialog v-model="dialog" max-width="70%">
            <v-btn slot="activator" color="primary" dark class="mb-2">Registro de Custodias documentos físicos</v-btn>
            <v-card>
                <v-card-title>
                    <span class="headline">Registro del PAA</span>
                </v-card-title>
                <v-card-text>                        
                    <v-stepper  v-model="step" vertical>
                        <v-stepper-header>
                            <v-stepper-step editable step="1"> Formulario de registro y custodia de Información física de la Dirección de Contratación </v-stepper-step>
                        </v-stepper-header>
                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-form
                                ref="form_step_1"
                                v-model="valid"
                                lazy-validation
                                >
                                    <label>Formulario PAA</label>
                                    <v-text-field label="Descripción" v-model="editedItem.descripcion" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Ubicación" v-model="editedItem.ubicacion" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Folio" v-model="editedItem.folio" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.respopnsable_id"
                                            :items="responsables"
                                            label="Responsable en custodia"
                                            item-text="name"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.estadocustodia_id"
                                            :items="estadosCustodia"
                                            label="Estado de prestamo"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-btn color="primary" @click.prevent="validate($refs.form_step_1,0)">Guardar</v-btn>
                                </v-form>
                            </v-stepper-content>
                        </v-stepper-items>
                    </v-stepper>    
                </v-card-text>    
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat @click="close">CANCELAR</v-btn>
                </v-card-actions>
            </v-card>               
        </v-dialog>
        </v-toolbar>    

        <v-data-table :headers="headers" :items="tableData" class="elevation-1">
          <template slot="items" slot-scope="props">    
                <td class="text-xs-left" v-if="props.item.id">{{ props.item.id }}</td>
                <td class="text-xs-left" v-if="props.item.descripcion">{{ props.item.descripcion }}</td>
                <td class="text-xs-left" v-if="props.item.ubicacion">{{ props.item.ubicacion }}</td>
                <td class="text-xs-left" v-if="props.item.folio">{{ props.item.folio }}</td>
                <td class="text-xs-left" v-if="props.item.respopnsable_id">
                  <v-chip color="indigo" text-color="white">
                          <v-avatar>
                            <v-icon>account_circle</v-icon>
                          </v-avatar>
                          {{ props.item.responsables.name }}   
                  </v-chip>
                </td>    
                <td class="text-xs-left" v-if="props.item.estadocustodia_id">{{ props.item.estadosCustodia.nombre }}</td> 
                <td class="text-xs-left" v-if="props.item.creado">{{ props.item.creado }}</td>   
                <td class="text-xs-left" v-if="props.item.actualizado">{{ props.item.actualizado }}</td>   

                <td class="justify-center layout px-0">
                    <v-icon
                            small
                            class="done"
                            @click="editItem(props.item)"
                    >
                        edit
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon>
                </td>  
          </template>
          <template slot="no-data">
            <v-btn color="primary" @click="initialize">Reset</v-btn>
          </template>
        </v-data-table>
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
        {text: 'Consecutivo Registro', value: 'id'},
        {text: 'Descripción', value: 'descripcion'},
        {text: 'Ubicación', value: 'ubicacion'},
        {text: 'Folio', value: 'folio'},
        {text: 'Responsable', value: 'respopnsable_id'},
        {text: 'Estado Prestamo', value: 'estadocustodia_id'},
        {text: 'Fecha Creación', value: 'created_at'},
        {text: 'Fecha Actualización', value: 'updated_at'},
      ],
      tableData: [],
      editedIndex: -1,
      estadosCustodia:[],
      responsables:[],
      editedItem: {
        id: '',
        created_at: '',
        updated_at: '',
        descripcion:'',
        ubicacion:'',
        folio:'',
        estadocustodia_id:'',
        respopnsable_id:'',
      },
      defaultItem: {
        id: '',
        created_at: '',
        updated_at: '',
        descripcion:'',
        ubicacion:'',
        folio:'',        
        estadocustodia_id:'',
        respopnsable_id:'',
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
        return this.editedIndex === -1 ? 'Registrar plan de Adquisiciones Anual' : 'Editar plan de Adquisiciones Anual';
      },
    },

    watch: {
      dialog(val) {
        val || this.close();
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

        axios.get('/api/custodias').then(response => {
          console.log(response);
          this.tableData = response.data.data;
        });
        
        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
        axios.get('/api/users').then(response => {this.responsables=response.data.data;});
        axios.get('/api/estadosCustodia').then(response => {this.estadosCustodia=response.data.data;});

      },

      editItem(item) {
        // alert("entro a editar");
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      showItem(item) {
        console.log("entro a mostrar: " + item);
        // alert("entor a mostrar registro");
        this.editedIndex = this.tableData.indexOf(item);
        // alert("entro a mostrar: " + this.editedIndex);
        this.editedItem = Object.assign({}, item);
        this.dialog2 = true;
      },

      deleteItem(item) {
        console.log("entro a borrad: " + item);
        const index = this.tableData.indexOf(item);
        // alert("el index es  " + index);
        confirm('Esta seguro que desea borrar el registro?') && this.tableData.splice(index, 1);

        axios.delete('/api/custodias/'+item.id).then(response=>console.log(response.data))

      },

      validate (form_s,next_step) {
        if (form_s.validate()) {
          this.dialog = false;
          this.save();
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

              this.editedItem.apoderado.push(Object.assign({},this.apodera));

              // this.$refs.form_step_1.reset()
              // this.$refs.form_step_2.reset()
              // this.$refs.form_step_3.reset()
      },
      agregar_documento(){
        this.openFileDialog[this.num_docs]=true;
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
        // console.log(this.editedIndex);
        // console.log("el edit item es :" + this.editedItem);
        console.log("el edit item es :");
        
        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);
          axios.put('/api/custodias/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          console.log("Entró a save de custodias");
          axios.post('/api/custodias',this.editedItem).then(response=>{
            console.log(response.data.custodia)
            this.tableData.push(response.data.custodia);            
          }, function (error) {
              console.log(error.response.data); 
          });
        }
        this.close();
      },
    },
  };
</script>



