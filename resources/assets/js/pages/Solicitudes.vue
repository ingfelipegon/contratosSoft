<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
        <v-toolbar-title>Registro de Solictudes para dar tramite de Contratación</v-toolbar-title>
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
            <v-btn slot="activator" color="primary" dark class="mb-2">Registrar solcitud Contractual - JEP</v-btn>
            <v-card>
                <v-card-title>
                    <span class="headline">Registro de la solcitud - JEP</span>
                </v-card-title>
                <v-card-text>                        
                    <v-stepper  v-model="step" vertical>
                        <v-stepper-header>
                            <v-stepper-step editable step="1"> Formulario de ingreso de datos por cada Solicitud </v-stepper-step>
                        </v-stepper-header>
                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-form
                                ref="form_step_1"
                                v-model="valid"
                                lazy-validation
                                >
                                    <label>Formulario PAA</label>
                                    <v-text-field label="Número de Ítem" @change="verificar_registro_PAA" v-model="editedItem.item" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Descripción" v-model="editedItem.descripcion" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Duración del Contrato" v-model="editedItem.duracioncontrato" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.modalidad_id"
                                            :items="modalidades"
                                            label="Modalidad de contratación"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-text-field label="Nombre del Responsable" v-model="editedItem.nombresupervisor" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.estadoproceso_id"
                                            :items="estadosProceso"
                                            label="Estado del Proceso"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
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
                                        ></v-select>            
                                    </v-layout>
                                    <label>¿Cuenta con reparto el proceso Contractual? </label>
                                    <v-radio-group v-model='editedItem.tienereparto' :rules="requiredRules" row>
                                    <v-radio label="Si" value=1></v-radio>
                                    <v-radio label="No" value=0></v-radio>
                                    </v-radio-group>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.areasolicitante_id"
                                            :items="dependencias"
                                            label="Dependencia o área que solicita"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.respopnsable_id"
                                            :items="responsables"
                                            label="Responsable actual del proceso"
                                            item-text="name"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.tipotramite_id"
                                            :items="tiposTramite"
                                            label="Tipo de Tramite"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
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
                <td class="text-xs-right" v-if="props.item.item">{{ props.item.item }}</td>
                <td class="text-xs-right" v-if="props.item.descripcion">{{ props.item.descripcion }}</td>
                <td class="text-xs-right" v-if="props.item.duracioncontrato">{{ props.item.duracioncontrato }}</td>
                <td class="text-xs-right" v-if="props.item.nombresupervisor">{{ props.item.nombresupervisor }}</td>
                <td class="text-xs-right" v-if="props.item.tienereparto">
                  <v-icon color="teal darken-2">
                    verified_user 
                  </v-icon>
                </td>
                <td class="text-xs-right" v-if="!props.item.tienereparto">
                  <v-icon color="red darken-2">
                    error_outline
                  </v-icon>
                </td>
                <td class="text-xs-right" v-if="props.item.modalidad_id">{{ props.item.modalidades.nombre }}</td>
                <td class="text-xs-right" v-if="props.item.estadoproceso_id">{{ props.item.estadosProceso.nombre }}</td>
                <!-- <td class="text-xs-right" v-if="props.item.estadooperacion_id">{{ props.item.estadosOperacion.nombre }}</td> -->
                <td class="text-xs-right" v-if="props.item.estadooperacion_id==1">
                  <v-icon color="orange darken-2">
                    schedule
                  </v-icon>
                </td>
                <td class="text-xs-right" v-if="props.item.estadooperacion_id==2">
                  <v-icon color="yellow darken-2">
                    check_circle
                  </v-icon>
                </td> 
                <td class="text-xs-right" v-if="props.item.estadooperacion_id==3">
                  <v-icon color="green darken-2">
                    done
                  </v-icon>
                </td>
                <td class="text-xs-right" v-if="props.item.estadooperacion_id==4">
                  <v-icon color="red darken-2">
                    pan_tool
                  </v-icon>
                </td>
                <td class="text-xs-right" v-if="props.item.areasolicitante_id">{{ props.item.dependencias.nombre }}</td>
                <td class="text-xs-right" v-if="props.item.respopnsable_id">{{ props.item.responsables.name }}</td>    
                <td class="text-xs-right" v-if="props.item.tipotramite_id">{{ props.item.tiposTramite.nombre }}</td>   
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
      step: 1,
      valid: true,
      dialog: false,
      dialog2: false,
      headers: [
        {text: 'Num. Ítem', value: 'item'},
        {text: 'Descripción', value: 'descripcion'},
        {text: 'Duración de Contrato', value: 'duracioncontrato'},
        {text: 'Nombre Supervisor', value: 'nombresupervisor'},
        {text: 'Tiene Reparto', value: 'tienereparto'},        
        {text: 'Modalidad', value: 'modalidad_id'},
        {text: 'Estado Proceso', value: 'estadoproceso_id'},
        {text: 'Estado Operación', value: 'estadooperacion_id'},
        {text: 'Dependencia', value: 'areasolicitante_id'},
        {text: 'Responsable', value: 'respopnsable_id'},
        {text: 'Tipo Tramite', value: 'tipotramite_id'},
      ],
      tableData: [],
      editedIndex: -1,
      modalidades:[],    
      estadosProceso:[],
      estadosOperacion:[],
      dependencias:[],
      responsables:[],
      tiposTramite:[],
      responsables:[],

      editedItem: {
        created_at: '',
        id: '',
        item:'',
        descripcion:'',
        duracioncontrato:'',
        modalidad_id:'',
        nombresupervisor:'',
        estadoproceso_id:'',
        estadooperacion_id:'',
        tienereparto:'',
        areasolicitante_id:'',
        respopnsable_id:'',
        tipotramite_id:'',
      },
      defaultItem: {
        created_at: '',
        mes:'',
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

        axios.get('/api/solicitudes').then(response => {
          console.log(response);
          this.tableData = response.data.data;
        });
        
        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
        axios.get('/api/modalidades').then(response => {this.modalidades=response.data.data;});
        axios.get('/api/estadosProceso').then(response => {this.estadosProceso=response.data.data;});
        axios.get('/api/estadosOperacion').then(response => {this.estadosOperacion=response.data.data;});
        axios.get('/api/areas').then(response => {this.dependencias=response.data.data;});
        axios.get('/api/tiposTramite').then(response => {this.tiposTramite=response.data.data;});
        axios.get('/api/users').then(response => {this.responsables=response.data.data;});
        
      },

      editItem(item) {
        alert("entro a editar");
        this.editedIndex = this.tableData.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialog = true;
      },

      showItem(item) {
        console.log("entro a mostrar: " + item);
        alert("entor a mostrar registro");
        this.editedIndex = this.tableData.indexOf(item);
        alert("entro a mostrar: " + this.editedIndex);
        this.editedItem = Object.assign({}, item);
        this.dialog2 = true;
      },

      deleteItem(item) {
        console.log("entro a borrad: " + item);
        const index = this.tableData.indexOf(item);
        alert("el index es  " + index);
        confirm('Esta seguro que desea borrar el registro?') && this.tableData.splice(index, 1);

        axios.delete('/api/solicitudes/'+item.id).then(response=>console.log(response.data))

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

              this.editedItem.apoderado.push(Object.assign({},this.apodera));

              // this.$refs.form_step_1.reset()
              this.$refs.form_step_2.reset()
              this.$refs.form_step_3.reset()
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

      verificar_registro_PAA() {
        axios.get('/api/verificar_registro_PAA/'+this.editedItem.item).then((response) => {
          console.log(response);
          if(response.data==0)
          {
            alert("No existe Item registrado con esta numeración regsitrada, verifique la información del PAA previamente.");
            this.editedItem.item="";
          }
        });

      },

      save() {
        console.log(this.editedIndex);
        console.log(this.editedItem);
        
        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);
          axios.put('/api/solicitudes/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data)); 

        } else {
          console.log("Entró a save de adquisiciones");
          axios.post('/api/solicitudes',this.editedItem).then(response=>{
          this.tableData.push(response.data)});

          // axios.post('/api/solicitudes',this.editedItem).then(function (response) {
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



