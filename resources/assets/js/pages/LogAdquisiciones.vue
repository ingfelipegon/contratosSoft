<template>
    <div>
        <h1>Adquisicion Consecutivo de Registro Número: {{ $route.params.id }} </h1>  
        <v-toolbar dark flat color="grey-lighten">
        <v-toolbar-title>Modificaciones al Registro Anual de Adquisiciones</v-toolbar-title>
        <v-divider class="mx-2" inset vertical></v-divider>
        <v-spacer></v-spacer>       
        <v-dialog v-model="dialog" max-width="70%">
            <v-card>
                <v-card-title>
                    <span class="headline">Registro del PAA</span>
                </v-card-title>
                <v-card-text>                        
                    <v-stepper  v-model="step" vertical>
                        <v-stepper-header>
                            <v-stepper-step editable step="1"> Formulario de ingreso de datos por cada Item </v-stepper-step>
                        </v-stepper-header>
                        <v-stepper-items>
                            <v-stepper-content step="1">
                                <v-form
                                ref="form_step_1"
                                v-model="valid"
                                lazy-validation
                                >
                                    <label>Formulario PAA</label>
                                    <v-text-field label="Código UNSPSC" v-model="editedItem.codUNSPSC" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Número de Ítem"  v-model="editedItem.item" :rules="requiredRules"></v-text-field>
                                    <v-textarea label="Descripción" v-model="editedItem.descripcion" :rules="requiredRules"></v-textarea>
                                    <v-text-field label="Número del Proceso"  v-model="editedItem.numero_proceso" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Número de Contrato"  v-model="editedItem.numero_contrato" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.mes_inicio_id"
                                            :items="mesinicio"
                                            label="Mes estimado de inicio del proceso de selección"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.mes_oferta_id"
                                            :items="mesoferta"
                                            label="Mes estimado de presentación de ofertas"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>                                    
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.abogado_id"
                                            :items="abogados"
                                            label="Abogado responsable del proceso"
                                            item-text="name"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.unidadtiempo_id"
                                            :items="unidadesTiempo"
                                            label="Duración estimada del contrato (intervalo: días, meses, años)"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-text-field label="Duracion" v-model="editedItem.duracion" :rules="requiredRules"></v-text-field>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.modalidad_id"
                                            :items="modalidades"
                                            label="Modalidad de selección"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-layout>
                                        <v-select
                                            v-model="editedItem.fuente_id"
                                            :items="fuente_recursos"
                                            label="Fuente de los recursos"
                                            item-text="nombre"
                                            item-value='id'
                                            :rules="requiredRules"
                                            chips
                                        ></v-select>            
                                    </v-layout>
                                    <v-text-field label="Valor total estimado" v-model="editedItem.valortotal" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Valor estimado en la vigencia actual" v-model="editedItem.valorvigencia" :rules="requiredRules"></v-text-field>
                                    <label>¿Se requieren vigencias futuras? </label>
                                    <v-radio-group v-model='editedItem.vigenciafutura' :rules="requiredRules" row>
                                    <v-radio label="Si" value=1></v-radio>
                                    <v-radio label="No" value=0></v-radio>
                                    </v-radio-group>
                                    <v-text-field label="Estado de solicitud de vigencias futuras" v-model="editedItem.estadovigencia" :rules="requiredRules"></v-text-field>
                                    <v-text-field label="Datos de contacto del responsable" v-model="editedItem.nombreresponsable" :rules="requiredRules"></v-text-field>
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

        <template>
          <v-card>
            <v-card-title>
              Busqueda por número
              <v-spacer></v-spacer>
              <v-text-field
                v-model="search"
                append-icon="search"
                label="Search"
                single-line
                hide-details
              ></v-text-field>
            </v-card-title>
            <v-data-table :headers="headers" :items="tableData" item-key="item" :search="search" class="elevation-1">
              <template slot="items" slot-scope="props">    
                    <td class="text-xs-left" v-if="props.item.codUNSPSC">{{ props.item.codUNSPSC }}</td>
                    <td class="text-xs-left" v-if="props.item.item">
                      <v-chip color="indigo" text-color="white">
                        {{ props.item.item }} 
                      </v-chip>
                    </td>

                    <td class="text-xs-left" v-if="props.item.descripcion">{{ props.item.descripcion }}</td>
                    <td class="text-xs-left" v-if="props.item.numero_proceso">{{ props.item.numero_proceso }}</td>
                    <td class="text-xs-left" v-if="props.item.numero_contrato">{{ props.item.numero_contrato }}</td>
                    <!-- <td class="text-xs-left" v-if="props.item.abogado_id">{{ props.item.abogado.name }}</td> -->
                    <td class="text-xs-left" v-if="props.item.mes_inicio_id">{{ props.item.mesinicio.nombre }}</td>
                    <td class="text-xs-left" v-if="props.item.mes_oferta_id">{{ props.item.mesoferta.nombre }}</td>
                    <td class="text-xs-left" v-if="props.item.valortotal">{{ props.item.valortotal }}</td>
                    <!-- <td width="3px" class="text-xs-left" v-if="props.item.nombreresponsable">{{ props.item.nombreresponsable }}</td> -->
                    <td class="text-xs-left" v-if="props.item.duracion">{{ props.item.duracion }}</td>
                    <td class="text-xs-left" v-if="props.item.unidades_tiempo">{{ props.item.unidades_tiempo.nombre }}</td>    
                    <td class="text-xs-left" v-if="props.item.modalidades">{{ props.item.modalidades.nombre }}</td>  
                    <td width="3px" class="text-xs-left" v-if="props.item.fuente_recursos">{{ props.item.fuente_recursos.nombre }}</td>   
                    <td class="justify-center layout px-0">
                        <!-- <v-icon
                                small
                                class="done"
                                @click="showItem(props.item)"
                        >
                            visibility
                        </v-icon> -->
                        <v-icon color="teal"
                                small
                                class="done"
                                @click="editItem(props.item)"
                        >
                            edit
                        </v-icon>
                    </td>  
              </template>
              <template slot="no-data">
                <v-btn color="primary" @click="initialize">Reset</v-btn>
              </template>
            </v-data-table>    
          </v-card>
        </template>

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
      search: '',
      headers: [
        {text: 'Cod. UNSPSC', value: 'codUNSPSC'},
        {text: 'Num. Ítem', value: 'item'},
        {text: 'Descripción', value: 'descripcion'},
        {text: 'Número del Proceso', value: 'numero_proceso'},
        {text: 'Número de Contrato', value: 'numero_contrato'},
        // {text: 'Abogado responsable', value: 'abogado_id'},
        {text: 'Mes Inicio', value: 'mes_inicio_id'},
        {text: 'Mes Oferta', value: 'mes_oferta_id'},
        {text: 'Valor Total', value: 'valortotal', width: "3px"},
        // {text: 'Nombre Responsable', value: 'nombreresponsable', width: "3px"},
        {text: 'Duracion', value: 'duracion', width: "3px"},
        {text: 'Tiempo', value: 'unidadtiempo_id', width: "3px"},
        {text: 'Modalidad', value: 'modalidad_id', width: "3px"},
        {text: 'Fuente de Recursos', value: 'fuente_id'},
      ],
      tableData: [],
      editedIndex: -1,
      unidadesTiempo:[],
      abogados:[],
      mesinicio:[],
      mesoferta:[],
      modalidades:[],  
      fuente_recursos:[],
      editedItem: {
        id: '',
        created_at: '',
        codUNSPSC:'',
        item:'',
        descripcion:'',
        abogado_id:'',
        numero_proceso:'',
        numero_contrato:'',
        mes_inicio_id:'',
        mes_oferta_id:'',  
        duracion:'',
        valortotal:'',
        valorvigencia:'',
        vigenciafutura:'',
        nombreresponsable:'',
        estadovigencia:'',
        unidadtiempo_id:'',
        modalidad_id:'',
        fuente_id:'',
      },
      defaultItem: {
        id: '',
        created_at: '',
        codUNSPSC:'',
        item:'',
        descripcion:'',
        abogado_id:'',
        numero_proceso:'',
        numero_contrato:'',        
        mes_inicio_id:'',
        mes_oferta_id:'', 
        duracion:'',
        valortotal:'',
        valorvigencia:'',
        vigenciafutura:'',
        nombreresponsable:'',
        estadovigencia:'',
        unidadtiempo_id:'',
        modalidad_id:'',
        fuente_id:'',
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

      headers0() {
        return this.headers.map(header => Object.assign({}, header, {fixed: false}))
      },
      headers2() {
        return [
          { text: '', fixed: true, width: '100px', sortable: false }
        ].concat(this.headers)
      },
      headers3() {
        return [
          { text: '', fixed: true, width: '100px'}
        ].concat(this.headers)
      },
      headers5() {
        return this.headers3
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

        var idAdquisicion = this.$route.params.id;
        console.log('El Id adquisicion solcitado es: ' + idAdquisicion);   

        axios.get('/api/adquisiciones/'+ idAdquisicion + '/logAdquisiciones').then(response => {
          console.log(response);
          this.tableData = response.data.data;
        });
        
        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);
        axios.get('/api/unidades').then(response => {this.unidadesTiempo=response.data.data;});
        axios.get('/api/meses').then(response => {this.mesinicio=response.data.data;});
        axios.get('/api/meses').then(response => {this.mesoferta=response.data.data;});
        axios.get('/api/modalidades').then(response => {this.modalidades=response.data.data;});
        axios.get('/api/fuentes').then(response => {this.fuente_recursos=response.data.data;});
        axios.get('/api/users').then(response => {this.abogados=response.data.data;});
      },

      editItem(item) {
        // alert("entro a editar");
        this.editedIndex = this.tableData.indexOf(item);
        console.log("entro a editar: " + item);
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

        axios.delete('/api/adquisiciones/'+item.id).then(response=>console.log(response.data))

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
        console.log(this.editedIndex);
        console.log("el edit item es :" + this.editedItem);

        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);
          axios.put('/api/adquisiciones/'+this.editedItem.id,this.editedItem).then(response=>{
            console.log(response.data.adquisision)
            axios.get('/api/adquisiciones').then(response => {
              this.tableData = response.data.data;
            });
          });
        } else {
          console.log("Entró a save de adquisiciones");
          axios.post('/api/adquisiciones',this.editedItem).then(response=>{
            console.log(response.data.adquisision)
            this.tableData.push(response.data.adquisision);            
          }, function (error) {
              console.log(error.response.data); 
          });
        }
        
        this.close();
      },
    },
  };
</script>



