<template>
    <div>
        <h1>Proceso Contrato {{this.descripcionProceso}} - Consecutivo de Registro Número: {{ $route.params.id }} </h1>  
        <v-toolbar dark flat color="grey-lighten">
        <v-toolbar-title>Etapas del proceso de Contratación</v-toolbar-title>
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
            <!-- <v-btn @click="loadRegister" color="primary" dark class="mb-2">Registrar etapa del proceso Contractual - JEP II</v-btn> -->
            <v-btn slot="activator" @click="loadRegister" color="primary" dark class="mb-2">Registrar etapa del proceso Contractual - JEP</v-btn>
            <!-- <v-btn color="primary" dark class="mb-2" flat @click="loadRegister">cargar</v-btn> -->
            <v-card>
                <v-card-title>
                    <span class="headline">Registro de etapa - JEP</span>
                </v-card-title>
                <v-card-text>                        
                    <v-stepper  v-model="step" vertical>
                        <v-stepper-header>
                            <v-stepper-step editable step="1"> Formulario de ingreso de datos por cada Etapa </v-stepper-step>
                        </v-stepper-header>
                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-form
                                ref="form_step_1"
                                v-model="valid"
                                lazy-validation
                                >
                                    <label>Formulario Etapa</label>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.etapa_id"
                                            :items="etapas"
                                            label="Etapa actual del proceso"
                                            item-text="nombre"
                                            item-value='id'
                                            v-on:change="obtenerDuracionEtapa"
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>                                 
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.modalidad_id"
                                            :items="modalidades"
                                            label="Modalidad de contratación"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                            readonly
                                        ></v-select>                                                              
                                    </v-layout>   
                                    <v-text-field readonly label="Duración de etapa" v-model="editedItem.duracionetapa" ></v-text-field>
                                    <v-text-field label="Descripción" v-model="editedItem.descripcion" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.respopnsable_id"
                                            :items="responsables"
                                            label="Responsable actual del proceso"
                                            item-text="name"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                            readonly
                                        ></v-select>            
                                    </v-layout>                                    
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.estadooperacion_id"
                                            :items="estadosOperacion"
                                            label="Estado de la Operación"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                            readonly
                                        ></v-select>            
                                    </v-layout>
                                    <v-btn color="primary" @click.prevent="save">Guardar</v-btn>
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
                <td class="text-xs-left" v-if="props.item.creado">{{ props.item.creado }}</td>
                <td class="text-xs-left" v-if="props.item.modalidad_id">{{ props.item.modalidades.nombre }}</td>
                <td class="text-xs-left" v-if="props.item.etapa_id">{{ props.item.etapas.nombre }}</td>
                <td class="text-xs-left" v-if="props.item.estadooperacion_id">{{ props.item.estadosOperacion.nombre }}</td>
                <td class="text-xs-left" v-if="props.item.estadooperacion_id==1">
                  <v-icon color="orange darken-2">
                    brightness_1
                  </v-icon>
                </td>
                <td class="text-xs-left" v-if="props.item.estadooperacion_id==2">
                  <v-icon color="yellow darken-2">
                    brightness_1
                  </v-icon>
                </td> 
                <td class="text-xs-left" v-if="props.item.estadooperacion_id==3">
                  <v-icon color="green darken-2">
                    brightness_1
                  </v-icon>
                </td>
                <td class="text-xs-left" v-if="props.item.estadooperacion_id==4">
                  <v-icon color="red darken-2">
                    brightness_1
                  </v-icon>
                </td>
                <td class="text-xs-left" v-if="props.item.descripcion">{{ props.item.descripcion }}</td>
                <td class="text-xs-left" v-if="props.item.duracionetapa">{{ props.item.duracionetapa }}</td>
                <td class="text-xs-left" v-if="props.item.respopnsable_id">{{ props.item.responsables.name }}</td>  
                <td class="justify-center layout px-0">
                    <v-icon
                            small
                            class="done"
                            @click="showItem(props.item)"
                    >
                        visibility
                    </v-icon>
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
      idProceso: '',  
      step: 1,
      valid: true,
      dialog: false,
      dialog2: false,
      headers: [
        {text: 'Id Registro', value: 'id'},
        {text: 'Creado', value: 'creado'},
        {text: 'Modalidad', value: 'modalidad_id'},
        {text: 'Etapa', value: 'etapa_id'},
        {text: 'Estado Operación', value: 'estadooperacion_id'},
        {text: 'Semáforo', value: ''},
        {text: 'Descripción', value: 'descripcion'},
        {text: 'Duración de la Etapa', value: 'duracionetapa'},
        {text: 'Responsable Actual', value: 'respopnsable_id'},            
      ],
      tableData: [],
      editedIndex: -1,
      solicitudes:[],    
      responsables:[],
      estadosOperacion:[],
      etapas:[],
      modalidades:[],
      descripcionProceso:'',

      editedItem: {
        created_at: '',
        id: '',
        item:'',
        descripcion:'',
        duracionetapa:'',
        solicitud_id:'',
        respopnsable_id:'',
        estadooperacion_id:'',  
        etapa_id:'',                
        modalidad_id:'',
      },
      defaultItem: {
        created_at: '',
        id: '',
        item:'',
        descripcion:'',
        duracionetapa:'',
        solicitud_id:'',
        respopnsable_id:'',
        estadooperacion_id:'',  
        etapa_id:'',                
        modalidad_id:'',
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
        return this.editedIndex === -1 ? 'Registrar solicitud de apoyo contractual' : 'Editar solicitud de apoyo contractual';
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
        var idSolicitud = this.$route.params.id;
        console.log(idSolicitud);

        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
        axios.get('/api/users').then(response => {this.responsables=response.data.data;});
        axios.get('/api/estadosOperacion').then(response => {this.estadosOperacion=response.data.data;});                
        axios.get('/api/modalidades').then(response => {this.modalidades=response.data.data;});        
        axios.get('/api/solicitudes/'+ idSolicitud + '/etapas').then(response => {this.etapas=response.data.data;});        

        axios.get('/api/solicitudes/'+ idSolicitud + '/movimientos').then(response => {
          console.log(response);
          this.descripcionProceso =  response.data.data.descripcion; 
          this.tableData = response.data.data;
        });

      },

      actulizarEstados(){

      },
      
      loadRegister() {
        
        var idSolicitud = this.$route.params.id;
        //alert("entro a cargar registro la solcitud: " + idSolicitud);
        axios.get('/api/solicitudes/'+idSolicitud).then(response => {
            //alert("entro a cargar registro la solcitud adentro del llamdo");
            console.log(response);
            //this.tableData = response.data.data;
            //this.editedItem.descripcion = response.data.data.descripcion;                   
            this.editedItem.respopnsable_id =  response.data.data.respopnsable_id;            
            this.editedItem.estadooperacion_id =  response.data.data.estadooperacion_id;                                        
            this.editedItem.modalidad_id =  response.data.data.modalidad_id;
            this.editedItem.solicitud_id =  idSolicitud;
            console.log(this.editedItem.descripcion);     
        });
      },

      obtenerDuracionEtapa(){
          if(this.editedItem.etapa_id > 0 && this.editedItem.modalidad_id>0){
            // alert("igresar duracion etapa");    
            axios.get('/api/obtener_dias_etapa/'+this.editedItem.modalidad_id + '/' + this.editedItem.etapa_id).then(response => {
            console.log(response.data);
            if(response.data==0)
            {
              this.editedItem.duracionetapa=0;
            }  
            else{
              this.editedItem.duracionetapa=response.data;
            }
          }, function (error) {
              console.log(error.response.data); 
          });
        }   
      },

      editItem(item) {
        // alert("entro a editar");
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      showItem(item) {
        console.log("entro a mostrar: " + item);
        //alert("entor a mostrar registro");
        this.editedIndex = this.tableData.indexOf(item);
        //alert("entro a mostrar: " + this.editedIndex);
        this.editedItem = Object.assign({}, item);
        this.dialog2 = true;
      },

      deleteItem(item) {
        console.log("entro a borrad: " + item);
        const index = this.tableData.indexOf(item);
        //alert("el index es  " + index);
        confirm('Esta seguro que desea borrar el registro?') && this.tableData.splice(index, 1);

        axios.delete('/api/movimientos/'+item.id).then(response=>console.log(response.data))

      },

      validate (form_s,next_step) {
        if (form_s.validate()) {
          this.step = next_step;
        }
      },

      close() {
        this.dialog = false;
        setTimeout(() => {
          this.editedItem = Object.assign({}, this.defaultItem);
          this.editedIndex = -1;
        }, 300);
      },

      save() {
        console.log(this.editedIndex);
        console.log(this.editedItem);

        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);
          axios.put('/api/movimientos/'+this.editedItem.id,this.editedItem).then(response=>{this.tableData.push(response.data)}); 

        } else {
          console.log("Entró a save de movimientos");
          axios.post('/api/movimientos',this.editedItem).then(response=>{
          this.tableData.push(response.data)});
        
          // axios.post('/api/movimientos',this.editedItem).then(function (response) {
          //     console.log(response.data);
          // }, function (error) {
          //     console.log(error.response.data); 
          // });
        }
        this.close();
      },
    },
  };
</script>






