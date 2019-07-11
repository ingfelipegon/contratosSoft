<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Atenciones registradas</v-toolbar-title>
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
      <v-card-text>
        <div>
        <h4 class="headline mb-0">Información personal</h4>
        <div> <label>¿Ha presentado con anterioridad una Solicitud de Acreditación ante la Jurisdicción Especial para la Paz? </label> </div>
        <div>{{editedItem.solicitud_anterior}} </div>
       <div><label>¿Ha presentado con anterioridad una Solicitud de Acreditación ante la Jurisdicción Especial para la Paz? </label></div>
       <div>{{editedItem.solicitud_anterior}}</div>
       <div><label>Si tiene un número de registro ante el Registro Único de Víctimas, porfavor indíquelo </label></div>
       <div>{{editedItem.no_registro_victima}}</div>
       <div><label>¿Llena usted por sí mismo este formulario? </label></div>
       <div>{{editedItem.formulario_propio}}</div>
       <div v-if="editedItem.formulario_propio=='No'"><label>Por favor indique el nombre de la persona que le está ayudando con este Formulario: </label></div>
       <div v-if="editedItem.formulario_propio=='No'">{{editedItem.persona_victima}}</div>
       <div><label>Nombre de la víctima solicitante: </label></div>
       <div>{{editedItem.nombre_victima_solicitante}} {{editedItem.nombre2_victima_solicitante}} {{editedItem.apellido1_victima_solicitante}} {{editedItem.apellido2_victima_solicitante}}</div>
       <div><label>Direccion residencia actual</label></div>
       <div>{{editedItem.direccion}}</div>
       <div><label>Departamento residencia actual</label></div>
       <div>{{editedItem.departamento_id}}</div>
       <div><label>Municipio residencia actual</label></div>
       <div>{{editedItem.municipio_id}}</div>

       <div><label>Pertenencia a un grupo étnico: </label></div>
       <div>{{editedItem.grupo_etnico}}</div>
       <div v-if="editedItem.grupo_etnico=='Si'"><label>Por favor indique el nombre del grupo étnico al que pertenece: </label></div>
       <div v-if="editedItem.grupo_etnico=='Si'">{{editedItem.nombre_grupo_etnico}}</div>
       <div><label>Pertenencia a organizacion de victimas: </label></div>
       <div>{{editedItem.organizacion_victimas}}</div>
       <div v-if="editedItem.organizacion_victimas=='Si'"><label>Por favor indique el nombre de la Organización de víctimas a la que pertenece: </label></div>
       <div v-if="editedItem.organizacion_victimas=='Si'">{{editedItem.nombre_organizacion_victimas}}</div>

       <div><label>Pertenencia a un sujeto colectivo que desea acreditarse como víctima: </label></div>
       <div>{{editedItem.sujeto_colectivo}}</div>
       <div v-if="editedItem.sujeto_colectivo=='Si'"><label>Por favor indique el nombre del sujeto colectivo al que pertenece: </label></div>
       <div v-if="editedItem.sujeto_colectivo=='Si'">{{editedItem.nombre_sujeto_colectivo}}</div>
       <div><label>Datos de contacto Número de teléfono fijo de residencia</label></div>
       <div>{{editedItem.indicativo}} + {{editedItem.telefono_fijo}}</div>
       <div><label>Datos de contacto Número de teléfono celular</label></div>
       <div>{{editedItem.telefono_celular}}</div>
       <div><label>Datos de contacto correo electrónico</label></div>
       <div>{{editedItem.correo}}</div>
       <div><label>Ocupación actual </label></div>
       <div>{{editedItem.ocupacion_actual}}</div>
        <v-spacer></v-spacer>
<v-divider class="mx-1"></v-divider>
        <h4 class="headline mb-0">Hechos victimizantes</h4>
       <div><label>Esta solicitud de acreditación la hago en razón de los siguientes hechos victimizantes: </label></div>
       <div>{{editedItem.hecho_victimizante}}</div>
       <div><label>Fecha inicio de los hechos: </label></div>
       <div>{{editedItem.fecha_hechos_inicio}}</div>
       <div><label>Fecha fin de los hechos: </label></div>
       <div>{{editedItem.fecha_hechos_fin}}</div>
       <div><label>Departamento de los hechos </label></div>
       <div>{{editedItem.departamento_hechos_id}}</div>
       <div><label>Municipio de los hechos </label></div>
       <div>{{editedItem.municipio_hechos_id}}</div>
       <div><label>Lugar de los hechos </label></div>
       <div>{{editedItem.lugar_hechos}}</div>
        <v-spacer></v-spacer>
<v-divider class="mx-1"></v-divider>
        <h4 class="headline mb-0">Presuntos responsables</h4>
       <v-divider class="mx-1"></v-divider>
         <div v-if="editedItem.presuntos_responsables" v-for='(item, index) in editedItem.presuntos_responsables'>
           <div><label>Nombre: </label></div>
           <div>{{item.nombre_responsable}} {{item.nombre2_responsable}} {{item.apellido1_responsable}} {{item.apellido2_responsable}}</div>
             <div><label>Alias: </label></div>
             <div>{{item.alias_responsable}}</div>
             <div><label>Bloque: </label></div>
             <div>{{item.estructura_responsable}}</div>
             <div><label>Frente: </label></div>
             <div>{{item.frente_responsable}}</div>
             <v-divider class="mx-1"></v-divider>
         </div>
        <v-spacer></v-spacer>
        <v-divider class="mx-1"></v-divider>
        <h4 class="headline mb-0">Familiares y allegados </h4>
        <v-divider class="mx-1"></v-divider>
         <div v-if="editedItem.allegados_familiares" v-for='(item, index) in editedItem.allegados_familiares'>
           <div><label>Nombre</label></div>
           <div>{{item.nombre_allegado}} {{item.nombre2_allegado}} {{item.apellido1_allegado}} {{item.apellido2_allegado}}</div>
           <div><label>Documento identificación</label></div>
           <div>{{item.documento_allegado}}</div>
           <div><label>Parentezco</label></div>
           <div>{{item.parentezco_allegado}}</div>
           <v-divider class="mx-1"></v-divider>
         </div>
         <v-spacer></v-spacer>
         <v-divider class="mx-1"></v-divider>
        <h4 class="headline mb-0">Sobre la representación legal</h4>
       <div><label>¿Cuenta usted con un abogado de confianza que lo represente en el proceso? </label></div>
       <div>{{editedItem.abogado_confianza}}</div>
       <div  v-if="editedItem.abogado_confianza=='Si'">
       <div><label>Nombre del abogado:</label></div>
       <div>{{editedItem.nombre_abogado}} {{editedItem.nombre2_abogado}} {{editedItem.apellido1_abogado}} {{editedItem.apellido2_abogado}}</div>
       <div><label>Dirección de notificación</label></div>
       <div>{{editedItem.direccion_abogado}}</div>
       <div><label>Teléfono de contacto</label></div>
       <div>{{editedItem.telefono_abogado}}</div>
       <div><label>Celular de contacto</label></div>
       <div>{{editedItem.celular_abogado}}</div>
       <div><label>Correo electrónico</label></div>
       <div>{{editedItem.correo_abogado}}</div>
       <div><label>Anexa poder especial: </label></div>
       <div>{{editedItem.poder_abogado}}</div>
     </div>
     <div  v-if="editedItem.abogado_confianza=='No'">
       <div><label>Representado actualmente por la JEP: </label></div>
       <div>{{editedItem.representado_actualmente_jep}}</div>
       <div  v-if="editedItem.representado_actualmente_jep=='Si'">
         <div><label>Nombre del abogado:</label></div>
         <div>{{editedItem.nombre_abogado}} {{editedItem.nombre2_abogado}} {{editedItem.apellido1_abogado}} {{editedItem.apellido2_abogado}}</div>
         <div><label>Dirección de notificación</label></div>
         <div>{{editedItem.direccion_abogado}}</div>
         <div><label>Teléfono de contacto</label></div>
         <div>{{editedItem.telefono_abogado}}</div>
         <div><label>Celular de contacto</label></div>
         <div>{{editedItem.celular_abogado}}</div>
         <div><label>Correo electrónico</label></div>
         <div>{{editedItem.correo_abogado}}</div>
       </div>
       <div  v-if="editedItem.representado_actualmente_jep=='No'">
         <div><label>Manifiesta su interés en ser representado/a por un abogado común del Sistema Autónomo de Asesoría y Representación Legal de la JEP?</label></div>
         <div>{{editedItem.manifiesta_interes}}</div>
         <div v-if="editedItem.manifiesta_interes=='No'"><label>Manifiesta su voluntad de actuar por sí mismo/a en el proceso ante la JEP? </label></div>
         <div v-if="editedItem.manifiesta_interes=='No'">{{editedItem.voluntad_actuar_solo}}</div>
         <div v-if="editedItem.voluntad_actuar_solo=='No'"><label>Por favor, indique qué otro medio de representación judicial usará: </label></div>
         <div v-if="editedItem.voluntad_actuar_solo=='No'">{{editedItem.medio_representacion}}</div>
       </div>
         </div>
         <v-divider class="mx-1"></v-divider>
         <v-spacer></v-spacer>
         <v-divider class="mx-1"></v-divider>
        <h4 class="headline mb-0">PROTECCIÓN Y SEGURIDAD</h4>
       <div><label>¿Las víctimas solicitantes tienen alguna razón para temer por su seguridad, integridad, dignidad o bienestar actualmente, o identifica riesgos por el inicio de este proceso de acreditación ante la Jurisdicción Especial para la Paz? </label></div>
       <div>{{editedItem.riesgo_seguridad}}</div>
     <div v-if="editedItem.riesgo_seguridad=='Si'" ><label>¿Cuáles son las razones? </label></div>
     <div  v-if="editedItem.riesgo_seguridad=='Si'" > {{editedItem.razones_riesgo_seguridad}}</div>
     <div><label>¿Autoriza a ser notificado de las actuaciones de este caso por medios electrónicos? </label></div>
     <div>{{editedItem.autoriza_notificacion}}</div>
       <v-divider class="mx-1"></v-divider>






        </div>





      </v-card-text>

      <v-card-actions>


        <v-spacer></v-spacer>


      </v-card-actions>
    </v-card>
    </v-dialog>
            <v-spacer></v-spacer>
            <div class="card">
              <a href="/publico/atencion_victimas" tagert="_blank"><v-btn color="primary" dark class="mb-2">Registrar Atención de victima</v-btn></a>
            </div>


        </v-toolbar>
        <v-data-table
                :headers="headers"
                :items="tableData"
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td >{{ props.item.nombre_victima_solicitante }} {{ props.item.nombre2_victima_solicitante }} {{ props.item.apellido1_victima_solicitante }} {{ props.item.apellido2_victima_solicitante }}</td>
                <td  v-if="props.item.activo===1">
                    <v-icon large color="teal darken-2">
                      verified_user
                    </v-icon>
                </td>

                <td >
                    <v-icon
                            small
                            class="done"
                            @click="showItem(props.item)"
                    >
                        visibility
                    </v-icon>
                    <!-- <v-icon
                            small
                            class="done"
                            @click="editItem(props.item)"
                            v-if="props.item.tipos_abogados.nombre=='De oficio JEP'"
                    >
                        edit
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(props.item)"
                    >
                        delete
                    </v-icon> -->
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
// import Alertifyjs from 'vue2-alertifyjs'

  export default {
    data: () => ({
      step: 1,
      valid: true,
      dialog: false,
      dialog2: false,
      headers: [
        {text: 'Nombre', value: 'nombres'},
        // {text: 'Identificación', value: 'no_identificacion'},
        // {text: 'Tarjeta profesional', value: 'tarjeta_profesional'},
        // {text: 'Departamento', value: 'enfoques_abogados_id'},
        // {text: 'Tipo', value: 'tipos_abogados_id'},
        // {text: 'Fecha fin contrato', value: 'fecha_fin_contrato'},
        {text: 'Estado', value: 'activo'},
        {text: 'Actions', value: 'name', sortable: false},
      ],
      tableData: [],
      editedIndex: -1,
      etnias:[],
      generos:[],
      departamentos:['Boyacá','Santander'],
      municipios:['Tunja','Barbosa'],
      bloques:['BLOQUE CARIBE'],
      frentes:['FRENTE 19 JOSE PRUDENCIA PADILLA','FRENTE 35 ANTONIO JOSE DE SUCRE','FRENTE 37 BENKOS BIOHO','FRENTE 41 CACIQUE DE UPAR','FRENTE 59 RESISTENCIA GUAJIRA','RED URBANA JOSE ANTEQUERA'],
      documentos_requeridos:['Vigencia tarjeta profesional','Penales','Contravencionales','Disciplinarios CSJ', 'Diciplinarios PGN'],
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
      items_educa:0,
      pres_resp:{
        id:-1,
        nombre_responsable:'',
        alias_responsable:'',
        estructura_responsable:'',
      },
      fami_alle:{
        id:-1,
        nombre_allegado:'',
        documento_allegado:'',
        parentezco_allegado:'',
        adjunto_allegado:'',
      },
      editedItem: {
        name: '',
        email: '',
        tarjeta_profesional: '',
        tipos_abogados_id: 1,
        role:{},
        permissions:[],
        presuntos_responsables:[],
        allegados_familiares:[],
        files_to_upload:[],
        created_at: '',
      },
      defaultItem: {
        name: '',
        email: '',
        tarjeta_profesional: '',
        tipos_abogados_id: 1,
        role:{},
        permissions:[],
        presuntos_responsables:[],
        allegados_familiares:[],
        files_to_upload:[],
        created_at: '',
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
      let vm = this

  	// vm.$notify('TEST','success')
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
        axios.get('/api/atencion_victimas').then(response => {
          console.log(response);
          this.tableData = response.data.data;
        });

        axios.get('/api/roles').then(response=>this.allRoles=response.data.data);
        axios.get('/api/permissions').then(response=>this.allPermissions=response.data.data);

        // axios.get('/api/tipo_documentos').then(response => {
        //   this.tipo_documentos=response.data.data;
        // });
        //
        // axios.get('/api/sexos').then(response => {
        //   this.sexos=response.data.data;
        // });
        //
        // axios.get('/api/generos').then(response => {
        //   this.generos=response.data.data;
        // });
        //
        // axios.get('/api/etnias').then(response => {
        //   this.etnias=response.data.data;
        // });
        //
        // axios.get('/api/enfoques_abogado').then(response => {
        //   this.enfoques_abogado=response.data.data;
        // });
        //
        // axios.get('/api/tipos_abogado').then(response => {
        //   this.tipos_abogado=response.data.data;
        // });

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

        axios.delete('/api/atencion_victimas/'+item.id).then(response=>console.log(response.data))

      },

      validate (form_s,next_step) {
        if (form_s.validate()) {
          this.step = next_step;
        }
      },

      add_pres_resp () {
          // this.items_educa++;
          this.editedItem.presuntos_responsables.push(Object.assign({},this.pres_resp));
      },

      less_pres_resp (index) {
          this.$delete(this.editedItem.presuntos_responsables,index);
      },

      add_allegados () {
          // this.items_educa++;
          this.editedItem.allegados_familiares.push(Object.assign({},this.fami_alle));
      },

      less_allegados (index) {
          this.$delete(this.editedItem.allegados_familiares,index);
      },

      init_reg () {
          // this.items_educa++;

          // (!this.editedItem.educacion) ? this.editedItem.educacion = Object.assign({}, this.educa) : console.log("SI existe");;
            // this.editedItem.educacion = Object.assign({}, this.educa);
            // if(this.editedItem.educacion)
            // {
              //this.editedItem.educacion = {};
              this.editedItem.presuntos_responsables.push(Object.assign({},this.pres_resp));
              this.editedItem.allegados_familiares.push(Object.assign({},this.fami_alle));

              this.$refs.form_step_1.reset()
              this.$refs.form_step_2.reset()
              this.$refs.form_step_3.reset()
              this.$refs.form_step_4.reset()
              this.$refs.form_step_5.reset()
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

          // if(this.editedItem.files_to_upload['Vigencia tarjeta profesional'])
          // {
          //       this.editedItem.adjunto_tarjeta_profesional=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name
          //     this.file = this.editedItem.files_to_upload['Vigencia tarjeta profesional'];
          //
          //     var formData = new FormData();
          //     formData.append('archivo', this.file);
          //     formData.append('identificacion', this.editedItem.no_identificacion);
          //     console.log("A guardar = "+this.file.name);
          //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          // }
          //
          // if(this.editedItem.files_to_upload['Disciplinarios CSJ'])
          // {
          //       this.editedItem.adjunto_csj=this.editedItem.files_to_upload['Disciplinarios CSJ'].name
          //     this.file = this.editedItem.files_to_upload['Disciplinarios CSJ'];
          //
          //     var formData = new FormData();
          //     formData.append('archivo', this.file);
          //     formData.append('identificacion', this.editedItem.no_identificacion);
          //     console.log("A guardar = "+this.file.name);
          //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          // }
          //
          // if(this.editedItem.files_to_upload['Penales'])
          // {
          //       this.editedItem.adjunto_penales=this.editedItem.files_to_upload['Penales'].name
          //     this.file = this.editedItem.files_to_upload['Penales'];
          //
          //     var formData = new FormData();
          //     formData.append('archivo', this.file);
          //     formData.append('identificacion', this.editedItem.no_identificacion);
          //     console.log("A guardar = "+this.file.name);
          //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          // }
          //
          // if(this.editedItem.files_to_upload['Contravencionales'])
          // {
          //       this.editedItem.adjunto_contravencionales=this.editedItem.files_to_upload['Contravencionales'].name
          //     this.file = this.editedItem.files_to_upload['Contravencionales'];
          //
          //     var formData = new FormData();
          //     formData.append('archivo', this.file);
          //     formData.append('identificacion', this.editedItem.no_identificacion);
          //     console.log("A guardar = "+this.file.name);
          //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          // }
          //
          // if(this.editedItem.files_to_upload['Diciplinarios PGN'])
          // {
          //       this.editedItem.adjunto_pgn=this.editedItem.files_to_upload['Diciplinarios PGN'].name
          //     this.file = this.editedItem.files_to_upload['Diciplinarios PGN'];
          //
          //     var formData = new FormData();
          //     formData.append('archivo', this.file);
          //     formData.append('identificacion', this.editedItem.no_identificacion);
          //     console.log("A guardar = "+this.file.name);
          //     axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          // }

        }
        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);

          axios.put('/api/atencion_victimas/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          console.log("Entró a save");


          // console.log(this.editedItem)
          axios.post('/api/atencion_victimas',this.editedItem).then(response=>{
            this.tableData.push(response.data.abogado);
            // console.log(response.data)

          });
        }
        this.close();
      },
    },
  };
</script>
