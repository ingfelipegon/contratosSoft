<template>
    <div>
        <v-toolbar dark flat color="grey-lighten">
            <v-toolbar-title>Abogados SAAD</v-toolbar-title>
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
          <div> <label>Nombre : </label> {{editedItem.nombres_nombre1}} {{editedItem.nombres_nombre2}} {{editedItem.nombres_apellido1}} {{editedItem.nombres_apellido2}}</div>
          <div v-if="editedItem.enfoques_abogados"> <label>Departamento : </label> {{editedItem.enfoques_abogados.nombre}} </div>
          <div v-if="editedItem.tipos_abogados"> <label>Tipo Abogado: </label> {{editedItem.tipos_abogados.nombre}} </div>
          <div v-if="editedItem.tipos_documentos"> <label>Documento : </label> {{editedItem.tipos_documentos.nombre}} {{editedItem.no_identificacion}}</div>
          <div> <label>Dirección : </label>  {{editedItem.direccion_residencia}} </div>
          <div> <label>Teléfono : </label>  {{editedItem.telefono_contacto}} </div>
          <div> <label>Correo electrónico : </label>  {{editedItem.correo}} </div>
          <div> <label>CONTRATO/CONVENIO {{editedItem.convenio}}</label> </div>
          <div> <label>Desde : </label> {{editedItem.fecha_inicio_contrato}} <label>Hasta : </label> {{editedItem.fecha_fin_contrato}} </div>
          <div> <label>Número: </label> {{editedItem.numero_contrato}} </div>
          <div> <label>Resolución: </label> {{editedItem.resolucion}} </div>
          <div> <label>PNUD / OI: </label> {{editedItem.pnud}} </div>
          <div> <label>Estado en el sistema: </label> {{editedItem.estado}} </div>
          <v-spacer></v-spacer>
          <h4 class="headline mb-0">Enfoque diferencial</h4>
          <div v-if="editedItem.sexo"> <label>Sexo : </label> {{editedItem.sexo.nombre}} </div>
          <div v-if="editedItem.identidades_generos"> <label>Identidad de genero : </label> {{editedItem.identidades_generos.nombre}} </div>
          <div v-if="editedItem.etnias"> <label>Pertenencia étnica : </label> {{editedItem.etnias.nombre}} </div>
          <div v-if="editedItem.grupo_etnico"> <label>Grupo étnico : </label> {{editedItem.grupo_etnico}} </div>
          <div v-if="editedItem.trabajo_territorial"> <label>Trabajo territorial : </label> {{editedItem.trabajo_territorial}} </div>
          <v-spacer></v-spacer>
          <h4 class="headline mb-0">Antecedentes</h4>
          <div v-if="editedItem.adjunto_resolucion"> <label>Resolución: </label> <a target="_blank" :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_resolucion">{{editedItem.adjunto_resolucion}}</a> </div>
          <div v-if="editedItem.adjunto_copia_tarjeta_profesional"> <label>Copia tarjeta profesional: </label><a target="_blank"  :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_copia_tarjeta_profesional"> {{editedItem.adjunto_copia_tarjeta_profesional}} </a></div>
          <div v-if="editedItem.adjunto_tarjeta_profesional"> <label>Vigencia tarjeta profesional: </label><a target="_blank"  :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_tarjeta_profesional"> {{editedItem.adjunto_tarjeta_profesional}}</a> </div>
          <div v-if="editedItem.adjunto_penales"> <label>Penales: </label> <a target="_blank"  :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_penales">{{editedItem.adjunto_penales}}</a> </div>
          <div v-if="editedItem.adjunto_contravencionales"> <label>Contravencionales: </label> <a  target="_blank" :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_contravencionales">{{editedItem.adjunto_contravencionales}}</a> </div>
          <div v-if="editedItem.adjunto_csj"> <label>Disciplinarios CSJ: </label> <a target="_blank"  :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_csj">{{editedItem.adjunto_csj}} </a></div>
          <div v-if="editedItem.adjunto_pgn"> <label>Disciplinarios PGN: </label><a target="_blank"  :href="'/storage/repositorio_documentos/' + editedItem.no_identificacion + '/_'+editedItem.adjunto_pgn"> {{editedItem.adjunto_pgn}}</a> </div>
           <v-divider class="mx-1"></v-divider>

          <div v-if="editedItem.educacion" v-for='(item, index) in editedItem.educacion'>
            <div> <label>Información academica</label></div>
            <div v-if="item.pre_pos==1"> <label>Pregrado</label> </div>
            <div v-if="item.pre_pos==2"> <label>Postgrado </label> </div>
            <div v-if="item.fecha_titulo"> <label>Fecha de grado: </label> {{item.fecha_titulo}} </div>
            <div v-if="item.titulo"> <label>Titulo: </label> {{item.titulo}} </div>
            <div v-if="item.universidad"> <label>Universidad: </label> {{item.universidad}} </div>
            <div v-if="item.pais"> <label>País: </label> {{item.pais}} </div>
             <v-divider class="mx-1"></v-divider>
          </div>

<!-- <v-divider class="mx-1"></v-divider><v-divider class="mx-1"></v-divider> -->
         <v-divider class="mx-1"></v-divider>
          <!-- <h4 v-if="editedItem.experiencia" class="headline mb-0">Experiencia profesional</h4> -->
          <div v-if="editedItem.experiencia" v-for='(item, index) in editedItem.experiencia'>
            <div> <label>Experiencia profesional</label></div>
            <div v-if="item.fecha_ingreso"> <label>Fecha de ingreso: </label> {{item.fecha_ingreso}} </div>
            <div v-if="item.fecha_salida"> <label>Fecha de salida: </label> {{item.fecha_salida}} </div>
            <div v-if="item.entidad"> <label>Entidad: </label> {{item.entidad}} </div>
            <div v-if="item.cargo"> <label>Cargo: </label> {{item.cargo}} </div>
          <v-divider class="mx-1"></v-divider>
          </div>
 <v-divider class="mx-1"></v-divider>
    <!-- <v-divider class="mx-1"></v-divider><v-divider class="mx-1"></v-divider>      <v-spacer></v-spacer> -->
          <!-- <div v-if="editedItem.apoderado" class="headline mb-0">Apoderados </div> -->
          <div v-if="editedItem.apoderado" v-for='(item, index) in editedItem.apoderado'>
            <div> <label>APODERADO</label></div>
            <div v-if="item.nombre"> <label>Nombre: </label> {{item.nombre}} </div>
            <div v-if="item.documento"> <label>Documento: </label> {{item.documento}} </div>
            <div v-if="item.tipo_apoderado"> <label>Tipo apoderado: </label> {{item.tipo_apoderado}} </div>
          <v-divider class="mx-1"></v-divider>
          </div>


          </div>





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
                <v-stepper-step editable step="2" :complete="step > 2">Enfoque diferencial</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step  editable step="3" :complete="step > 3">Antecedentes</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step editable step="4" :complete="step > 4">Información academica</v-stepper-step>
                 <v-divider></v-divider>
                <v-stepper-step  editable step="5" :complete="step > 5">Experiencia profesional</v-stepper-step>
              </v-stepper-header>
            <v-stepper-items>
              <v-stepper-content step="1">
                <v-form
                 ref="form_step_1"
                 v-model="valid"
                 lazy-validation
               >
               <v-layout pa-3 mb-2>
               <v-flex
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
              </v-flex>
              <v-flex
                 xs12
                 md4
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

                 <v-menu
                 v-model="menu_fecha_inicio_contrato"
                 :close-on-content-click="false"
                 :nudge-right="40"
                 lazy
                 transition="scale-transition"
                 offset-y
                 full-width
                 min-width="290px"
                 >
                 <template v-slot:activator="{ on }">
                 <v-text-field
                  v-model="editedItem.fecha_inicio_contrato"
                  label="Seleccione la fecha inicio del contrato"
                  prepend-icon="event"
                  readonly
                  v-on="on"
                 ></v-text-field>
                 </template>
                 <v-date-picker v-model="editedItem.fecha_inicio_contrato" @input="menu_fecha_inicio_contrato = false"></v-date-picker>
                 </v-menu>
                 <!-- <v-text-field label="Fecha inicio contrato" v-model="editedItem.fecha_inicio_contrato" :rules="requiredRules" required></v-text-field> -->

                 <v-menu
                 v-model="menu_fecha_fin_contrato"
                 :close-on-content-click="false"
                 :nudge-right="40"
                 lazy
                 transition="scale-transition"
                 offset-y
                 full-width
                 min-width="290px"
                 >
                 <template v-slot:activator="{ on }">
                 <v-text-field
                  v-model="editedItem.fecha_fin_contrato"
                  label="Seleccione la fecha fin del contrato"
                  prepend-icon="event"
                  readonly
                  v-on="on"
                 ></v-text-field>
                 </template>
                 <v-date-picker v-model="editedItem.fecha_fin_contrato" @input="menu_fecha_fin_contrato = false"></v-date-picker>
                 </v-menu>
                 <!-- <v-text-field label="Fecha fin contrato" v-model="editedItem.fecha_fin_contrato" :rules="requiredRules" required></v-text-field> -->

                 <label>Contrato o convenio:</label>
                 <v-radio-group v-model='editedItem.convenio' row>
                 <v-radio label="Contrato" value="Contrato"></v-radio>
                   <v-radio label="Convenio" value="Convenio"></v-radio>
                 </v-radio-group>
                 <!-- // Si marco Si respuesta anterior -->
                 <div v-if="editedItem.convenio=='Contrato'">
                 <label>Por favor adjunte la resolución: </label>
                 <cargar-documento documento="Resolución" tipo=""></cargar-documento>
                 <v-text-field label="Nombre resolucion" v-model="editedItem.resolucion" ></v-text-field>

                 <v-divider class="mx-1"></v-divider>
                 <!-- <v-text-field label="Resolucion" v-model="editedItem.resolucion" :rules="requiredRules" required></v-text-field> -->
                 <v-text-field label="Nùmero de contrato" v-model="editedItem.numero_contrato"></v-text-field>
                 </div>
                 <div v-if="editedItem.convenio=='Convenio'">
                 <v-text-field label=" PNUD / OI" v-model="editedItem.pnud" ></v-text-field>

                 <v-divider class="mx-1"></v-divider>
                 <!-- <v-text-field label="Resolucion" v-model="editedItem.resolucion" :rules="requiredRules" required></v-text-field> -->
                 <!-- <v-text-field label="Nùmero de contrato" v-model="editedItem.numero_contrato" :rules="requiredRules" required></v-text-field> -->
                 </div>
                 <v-select
                         v-model="editedItem.estado"
                         :items="estados"
                         label="Estado en el sistema"
                         item-text="nombre"
                         item-value='id'
                         chips
                 ></v-select>


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
              <v-text-field label="Trabajo territorial" v-model="editedItem.trabajo_territorial"></v-text-field>


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
            <template v-for="(documento, index) in documentos_requeridos">

                            <cargar-documento :documento="documento" tipo="" ></cargar-documento>


                        </template>

                        <v-card v-if="this.editedIndex > -1">
                          <v-card-title class="headline">Documentos previamente adjuntos</v-card-title>
                          <v-card-text>
                            <span class="pa-2" v-if="editedItem.adjunto_resolucion">
                              Resolución:
                              {{editedItem.adjunto_resolucion}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_tarjeta_profesional">
                              Vigencia tarjeta profesional:
                              {{editedItem.adjunto_tarjeta_profesional}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_copia_tarjeta_profesional">
                              Copia tarjeta profesional:
                              {{editedItem.adjunto_copia_tarjeta_profesional}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_penales">
                              Penales:
                              {{editedItem.adjunto_penales}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_contravencionales">
                              Contravencionales:
                              {{editedItem.adjunto_contravencionales}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_csj">
                              Disciplinarios CSJ:
                              {{editedItem.adjunto_csj}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                            <span class="pa-2" v-if="editedItem.adjunto_pgn">
                              Disciplinarios PGN:
                              {{editedItem.adjunto_pgn}}
                              <v-icon color="green darken-2">check</v-icon>
                             </span>
                          </v-card-text>
                        </v-card>


                <v-btn flat @click.native="step = 2">Anterior</v-btn>
                <v-btn color="primary" @click.native="step = 4">Siguiente</v-btn>
</v-form>
              </v-stepper-content>
			     <v-stepper-content step="4">


             <v-form
              ref="form_step_4"
              v-model="valid"
              lazy-validation
             >
<!-- {{editedItem.educacion}} -->
        <div v-for='(item, index) in editedItem.educacion'>
               <v-radio-group v-model='item.pre_pos' row>
				<v-radio label="Pregrado" value="1"></v-radio>
					<v-radio label="Posgrado" value="2"></v-radio>
				</v-radio-group>

        <v-menu
     v-model="menu_fecha_titulo[index]"
     :close-on-content-click="false"
     :nudge-right="40"
     lazy
     transition="scale-transition"
     offset-y
     full-width
     min-width="290px"
   >
     <template v-slot:activator="{ on }">
       <v-text-field
         v-model="item.fecha_titulo"
         label="Seleccione la fecha de grado"
         prepend-icon="event"
         readonly
         v-on="on"
       ></v-text-field>
     </template>
     <v-date-picker v-model="item.fecha_titulo" @input="menu_fecha_titulo[index] = false"></v-date-picker>
   </v-menu>


				<v-text-field label="Titulo" v-model="item.titulo" required></v-text-field>
				<v-text-field label="Universidad" v-model="item.universidad" required></v-text-field>
				<v-text-field label="País" v-model="item.pais" required></v-text-field>
        <v-spacer></v-spacer>
        <v-btn color="danger" @click="less_skillset(index)">-</v-btn>
        <v-spacer></v-spacer>
</div>

        <!-- <educacion-data v-for='item in items_educa'></educacion-data> -->
        <v-btn color="info" @click="add_skillset">+</v-btn>
<v-spacer></v-spacer>




                <v-btn flat @click.native="step = 3">Anterior</v-btn>
                <v-btn color="primary" @click.native="step = 5">Siguiente</v-btn>
</v-form>
              </v-stepper-content>
			     <v-stepper-content step="5">
             <v-form
              ref="form_step_5"
              v-model="valid"
              lazy-validation
             >
<!-- {{editedItem.experiencia}} -->
             <div v-for='(item, index) in editedItem.experiencia'>

             <v-menu
             v-model="menu_fecha_ingreso[index]"
             :close-on-content-click="false"
             :nudge-right="40"
             lazy
             transition="scale-transition"
             offset-y
             full-width
             min-width="290px"
             >
             <template v-slot:activator="{ on }">
             <v-text-field
              v-model="item.fecha_ingreso"
              label="Seleccione la fecha de ingreso"
              prepend-icon="event"
              readonly
              v-on="on"
             ></v-text-field>
             </template>
             <v-date-picker v-model="item.fecha_ingreso" @input="menu_fecha_ingreso[index] = false"></v-date-picker>
             </v-menu>


             <v-menu
             v-model="menu_fecha_salida[index]"
             :close-on-content-click="false"
             :nudge-right="40"
             lazy
             transition="scale-transition"
             offset-y
             full-width
             min-width="290px"
             >
             <template v-slot:activator="{ on }">
             <v-text-field
              v-model="item.fecha_salida"
              label="Seleccione la fecha de salida"
              prepend-icon="event"
              readonly
              v-on="on"
             ></v-text-field>
             </template>
             <v-date-picker v-model="item.fecha_salida" @input="menu_fecha_salida[index] = false"></v-date-picker>
             </v-menu>



				<v-text-field label="Entidad" v-model="item.entidad" required></v-text-field>
				<v-text-field label="Cargo" v-model="item.cargo" required></v-text-field>
        <v-spacer></v-spacer>
        <v-btn color="danger" @click="less_expset(index)">-</v-btn>
        <v-spacer></v-spacer>
      </div>

              <!-- <educacion-data v-for='item in items_educa'></educacion-data> -->
              <v-btn color="info" @click="add_expset">+</v-btn>
      <v-spacer></v-spacer>
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
        <v-data-table
                :headers="headers"
                :items="tableData"
                class="elevation-1"
        >
            <template slot="items" slot-scope="props">
                <td class="text-xs-right">{{ props.item.nombres_nombre1 }} {{ props.item.nombres_nombre2 }} {{ props.item.nombres_apellido1 }} {{ props.item.nombres_apellido2 }}</td>
                <td class="text-xs-right" v-if="props.item.no_identificacion">{{ props.item.tipos_documentos.nombre }} {{ props.item.no_identificacion }}</td>
                <td class="text-xs-right" v-if="props.item.tarjeta_profesional">{{ props.item.tarjeta_profesional }}</td>
                <td class="text-xs-right" v-if="props.item.enfoques_abogados">{{ props.item.enfoques_abogados.nombre }}</td>
                <td class="text-xs-right" v-if="props.item.tipos_abogados.nombre">{{ props.item.tipos_abogados.nombre }}</td>
                <!-- <td class="text-xs-right" v-if="props.item.fecha_fin_contrato">{{ props.item.fecha_fin_contrato }}</td> -->
                <td class="text-xs-right" v-if="props.item.estado==='Activo'">
                    <v-icon large color="teal darken-2">
                      verified_user
                    </v-icon>
                </td>
                <td class="text-xs-right" v-else-if="props.item.estado==='Inactivo'">
                  <v-icon large color="orange darken-2">
                    info_outline
                  </v-icon>
                </td>
                <td class="text-xs-right" v-else-if="props.item.estado==='Retirado'">
                  <v-icon large color="red darken-2">
                    error_outline
                  </v-icon>
                </td>
                </td>
                <td class="text-xs-right" v-else>
                  <v-icon large color="teal darken-2">
                    verified_user
                  </v-icon>
                </td>
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
                            v-if="props.item.tipos_abogados.nombre=='Abogado SAAD'"
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
// import Alertifyjs from 'vue2-alertifyjs'

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
      documentos_requeridos:['Copia tarjeta profesional','Vigencia tarjeta profesional','Penales','Contravencionales','Disciplinarios CSJ', 'Diciplinarios PGN'],
      estados:['Activo','Inactivo','Retirado'],
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
        tipos_abogados_id: 1,
        role:{},
        permissions:[],
        educacion:[],
        experiencia:[],
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
        educacion:[],
        experiencia:[],
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
        axios.get('/api/abogados').then(response => {
          console.log(response);
          this.tableData = response.data.data;
        });

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
        console.log("entro a mostrar: " + item);
        
        this.editedIndex = this.tableData.indexOf(item);
        alert("entro a mostrar: " + this.editedIndex);

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
          this.editedItem.educacion.push(Object.assign({},this.educa));
      },

      less_skillset (index) {
          this.$delete(this.editedItem.educacion,index);
      },

      add_expset () {
          // this.items_educa++;
          this.editedItem.experiencia.push(Object.assign({},this.exper));
      },

      less_expset (index) {
          this.$delete(this.editedItem.experiencia,index);
      },

      init_reg () {
          // this.items_educa++;

          // (!this.editedItem.educacion) ? this.editedItem.educacion = Object.assign({}, this.educa) : console.log("SI existe");;
            // this.editedItem.educacion = Object.assign({}, this.educa);
            // if(this.editedItem.educacion)
            // {
              //this.editedItem.educacion = {};
              this.editedItem.educacion.push(Object.assign({},this.educa));
              this.editedItem.experiencia.push(Object.assign({},this.exper));

              // this.$refs.form_step_1.reset()
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

          if(this.editedItem.files_to_upload['Resolución'])
          {
                this.editedItem.adjunto_resolucion=this.editedItem.files_to_upload['Resolución'].name
              this.file = this.editedItem.files_to_upload['Resolución'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              formData.append('nombre_adjunto', '');
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Copia tarjeta profesional'])
          {
                this.editedItem.adjunto_copia_tarjeta_profesional=this.editedItem.files_to_upload['Copia tarjeta profesional'].name
              this.file = this.editedItem.files_to_upload['Copia tarjeta profesional'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              formData.append('nombre_adjunto', '');
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          }

          if(this.editedItem.files_to_upload['Vigencia tarjeta profesional'])
          {
                this.editedItem.adjunto_tarjeta_profesional=this.editedItem.files_to_upload['Vigencia tarjeta profesional'].name
              this.file = this.editedItem.files_to_upload['Vigencia tarjeta profesional'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('identificacion', this.editedItem.no_identificacion);
              formData.append('nombre_adjunto', '');
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
              formData.append('nombre_adjunto', '');
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
              formData.append('nombre_adjunto', '');
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
              formData.append('nombre_adjunto', '');
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
              formData.append('nombre_adjunto', '');
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
          console.log("Entró a save abogados");


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
