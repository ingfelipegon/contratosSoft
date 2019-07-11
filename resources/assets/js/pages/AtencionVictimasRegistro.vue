<template >
    <div >
        <!-- <v-toolbar dark flat color="grey-lighten"> -->


            <!-- <v-dialog v-model="dialog" max-width="100%"> -->
                <!-- <v-btn slot="activator" @click="init_reg" color="primary" dark class="mb-2">Registrar Atención de victima</v-btn> -->
                <!-- <v-card > -->
                    <!-- <v-card-title>
                        <span class="headline">Registro</span>
                    </v-card-title> -->

                    <!-- <v-card-text> -->

            <v-stepper v-model="step" vertical  class="estilo_jep">
              <v-layout style="background-color:#b121f;">
                <v-flex fixed style="background-color:#b121f; ">
                  <div style="position:sticky;" >
              <v-stepper-header style="background-color:#b121f;">
                <v-stepper-step editable step="1" :complete="step > 1">Información personal</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step editable step="2" :complete="step > 2">Hechos victimizantes</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step  editable step="3" :complete="step > 3">Familiares y allegados</v-stepper-step>
                <v-divider></v-divider>
                <v-stepper-step editable step="4" :complete="step > 4">Representación judicial</v-stepper-step>
                 <v-divider></v-divider>
                <v-stepper-step  editable step="5" :complete="step > 5">Protección y seguridad</v-stepper-step>
                 <v-divider></v-divider>
                <v-stepper-step  editable step="6" :complete="step > 6">Verificar</v-stepper-step>
              </v-stepper-header>
            </div>
            </v-flex>
            </v-layout>
            <v-divider class="mx-1"></v-divider>
            <v-stepper-items class="estilo_jep">
              <v-stepper-content step="1">
                <v-form
                 ref="form_step_1"
                 v-model="valid"
                 lazy-validation
               >
               <v-layout>

                  <v-card>
                    <v-card-text>
                      <div><label>Manifestación de consentimiento:</label></div>
                      “De conformidad a lo establecido en el artículo 3 de la Ley 1922 de 2018, al llenar y enviar el siguiente Formulario en línea de Solicitud de Acreditación manifiesto mi voluntad de ser reconocido/a como víctima dentro del Caso No. 01 - "Retención ilegal de personas cometidos por parte de antiguas FARC-EP", que adelanta la Sala de Reconocimiento de Verdad y Responsabilidad, certifico que la información aquí consignada es verdadera.
                      <v-radio-group v-model='editedItem.disclaimer' :rules="requiredRules" row>
                      <v-radio label="Si" value="Si"></v-radio>
                        <v-radio label="No" value="No"></v-radio>
                      </v-radio-group>
                    </v-card-text>
                  </v-card>

                </v-layout>

 <v-divider class="mx-1"></v-divider>
                 <label>¿Ha presentado con anterioridad una solicitud de acreditación como víctima ante la Jurisdicción Especial para la Paz? </label>
                 <v-radio-group v-model='editedItem.solicitud_anterior' row>
                 <v-radio label="Si" value="Si"></v-radio>
                   <v-radio label="No" value="No"></v-radio>
                 </v-radio-group>
 <v-divider class="mx-1"></v-divider>
                 <label>Si tiene un registro ante el Registro Único de Víctimas, por favor indíquelo </label>
                 <v-text-field label="Registro" v-model="editedItem.no_registro_victima" ></v-text-field>
 <v-divider class="mx-1"></v-divider>
                 <label>¿Llena usted por sí mismo este formulario? </label>
                 <v-radio-group v-model='editedItem.formulario_propio' row>
                 <v-radio label="Si" value="Si"></v-radio>
                   <v-radio label="No" value="No"></v-radio>
                 </v-radio-group>

                  <!-- // Si marco No respuesta anterior -->
                <div v-if="editedItem.formulario_propio=='No'">
                  <label>Por favor indique el nombre de la persona que le está ayudando con este Formulario: </label>
                  <v-text-field label="Nombre completo" v-model="editedItem.persona_victima" ></v-text-field>
                </div>
 <v-divider class="mx-1"></v-divider>



                <label>Nombre de la víctima solicitante: </label>
                <v-text-field label="Primer nombre" v-model="editedItem.nombre_victima_solicitante" :rules="requiredRules"></v-text-field>
                <v-text-field label="Segundo nombre" v-model="editedItem.nombre2_victima_solicitante" ></v-text-field>
                <v-text-field label="Primer apellido" v-model="editedItem.apellido1_victima_solicitante" :rules="requiredRules"></v-text-field>
                <v-text-field label="Segundo apellido" v-model="editedItem.apellido2_victima_solicitante" ></v-text-field>
                <v-divider class="mx-1"></v-divider>


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

                <v-text-field label="Número de documento" @change="verifica_identificacion" v-model="editedItem.no_identificacion" :rules="[rules.number_vacio]" ></v-text-field>


                <label>Dirección residencia actual: </label>
                <v-text-field label="Dirección" :rules="requiredRules" v-model="editedItem.direccion" ></v-text-field>
                <v-select
                        v-model="editedItem.departamento_id"
                        :items="src_departamentos"
                        label="Departamento"
                        item-text="nombre"
                        item-value='id'
                        @change="trae_municipio"
                        chips
                ></v-select>
                <v-autocomplete
                                v-model="editedItem.municipio_id"
                                :items="src_municipios"
                                label="Municipio"
                                item-text="nombre"
                                item-value="id"
                                prepend-icon="fas fa-map-marked-alt"
                                hint="Escoja del desplegable el municipio que corresponda al lugar de nacimiento"

                              >  <v-slide-x-reverse-transition
                                  slot="append-outer"
                                  mode="out-in"
                                >

                                </v-slide-x-reverse-transition>
                              </v-autocomplete>
 <v-divider class="mx-1"></v-divider>
                <label>Pertenencia a un grupo étnico:</label>
                <v-radio-group v-model='editedItem.grupo_etnico' row>
                <v-radio label="Si" value="Si"></v-radio>
                  <v-radio label="No" value="No"></v-radio>
                </v-radio-group>
                <!-- // Si marco Si respuesta anterior -->
              <div v-if="editedItem.grupo_etnico=='Si'">
                <label>Por favor indique el nombre del grupo étnico al que pertenece: </label>
                <v-text-field label="Nombre grupo étnico" v-model="editedItem.nombre_grupo_etnico" ></v-text-field>
              </div>
 <v-divider class="mx-1"></v-divider>
                <label>Pertenencia a organización de víctimas:</label>
                <v-radio-group v-model='editedItem.organizacion_victimas' row>
                <v-radio label="Si" value="Si"></v-radio>
                  <v-radio label="No" value="No"></v-radio>
                </v-radio-group>
                <!-- // Si marco Si respuesta anterior -->
              <div v-if="editedItem.organizacion_victimas=='Si'">
                <label>Por favor indique el nombre de la organización de víctimas a la que pertenece: </label>
                <v-text-field label="Nombre organización victimas" v-model="editedItem.nombre_organizacion_victimas" ></v-text-field>
              </div>
 <v-divider class="mx-1"></v-divider>

              <label>Pertenencia a un sujeto colectivo que desea acreditarse como víctima:</label>
              <v-radio-group v-model='editedItem.sujeto_colectivo' row>
              <v-radio label="Si" value="Si"></v-radio>
                <v-radio label="No" value="No"></v-radio>
              </v-radio-group>
              <!-- // Si marco Si respuesta anterior -->
              <div v-if="editedItem.sujeto_colectivo=='Si'">
              <label>Por favor indique el nombre del sujeto colectivo al que pertenece: </label>
              <v-text-field label="Nombre sujeto colectivo" v-model="editedItem.nombre_sujeto_colectivo" ></v-text-field>
              </div>
 <v-divider class="mx-1"></v-divider>
              <label>Datos de contacto: </label>
              <v-select
                      v-model="editedItem.indicativo"
                      :items="indicativos"
                      label="Indicativo de ciudad para teléfono"
                      prepend-icon="fas fa-map"
                      item-text="nombre"
                      item-value='id'
                      chips
              ></v-select>
              <v-text-field label="Número de teléfono fijo" v-model="editedItem.telefono_fijo" :rules="requiredRules"></v-text-field>
              <v-text-field label="Número de teléfono celular" v-model="editedItem.telefono_celular" :rules="requiredRules"></v-text-field>
              <v-text-field label="Correo electrónico" v-model="editedItem.correo" :rules="[rules.email]"></v-text-field>
              <v-text-field label="Verifique Correo electrónico" @change="email_igual" :rules="[rules.email]" v-model="editedItem.correo_verificar"></v-text-field>
 <v-divider class="mx-1"></v-divider>
              <v-text-field label="Ocupación actual" v-model="editedItem.ocupacion_actual" ></v-text-field>


                <v-btn color="primary" @click="validate($refs.form_step_1,2)">Siguiente</v-btn>
                    </v-form>
              </v-stepper-content>
              <v-stepper-content step="2">
                <v-form
                 ref="form_step_2"
                 v-model="valid"
                 lazy-validation
                >



            <label>Esta solicitud de acreditación la hago en razón de los siguientes hechos victimizantes:  </label>
            <!-- <v-text-field  v-model="editedItem.hecho_victimizante" ></v-text-field> -->
            <v-textarea
         v-model="editedItem.hecho_victimizante"
         label="Relate los hechos:"
         hint="Brinde por favor un relato tan detallado como sea posible de los hechos, especificando su fecha, lugar de ocurrencia e información sobre presuntos responsables. Si desea en el siguiente campo puede adjuntar un documento con el relato de los hechos."
       ></v-textarea>
       <cargar-documento documento="Adjunto Hechos victimizantes" tipo="HV" ></cargar-documento>
            <v-divider class="mx-1"></v-divider>


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
           v-model="editedItem.fecha_hechos_inicio"
           label="Seleccione la fecha de inicio de los hechos"
           prepend-icon="event"
           readonly
           v-on="on"
          ></v-text-field>
          </template>
          <v-date-picker v-model="editedItem.fecha_hechos_inicio" @input="menu_fecha_inicio_contrato = false"></v-date-picker>
          </v-menu>

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
           v-model="editedItem.fecha_hechos_fin"
           label="Seleccione la fecha de fin de los hechos"
           prepend-icon="event"
           readonly
           v-on="on"
          ></v-text-field>
          </template>
          <v-date-picker v-model="editedItem.fecha_hechos_fin" @input="menu_fecha_fin_contrato = false"></v-date-picker>
          </v-menu>
<v-divider class="mx-1"></v-divider>
          <v-select
                  v-model="editedItem.departamento_hechos_id"
                  :items="src_departamentos_hechos"
                  label="Departamento de los hechos"
                  hint="Escoja del desplegable el departamento que corresponda al lugar de nacimiento"
                  prepend-icon="fas fa-map"
                  item-text="nombre"
                  item-value='id'
                  @change="trae_municipio_hechos"
                  chips
          ></v-select>
          <!-- <v-select
                  v-model="editedItem.municipio_hechos_id"
                  :items="municipios"
                  label="Municipio de los hechos"
                  item-text="nombre"
                  item-value='id'
                  chips
          ></v-select> -->

          <v-autocomplete
                          v-model="editedItem.municipio_hechos_id"
                          :items="src_municipios_hechos"
                          label="Municipio"
                          item-text="nombre"
                          item-value="id"
                          prepend-icon="fas fa-map-marked-alt"

                          hint="Escoja del desplegable el municipio que corresponda al lugar de nacimiento"


                        >
                        </v-autocomplete>

<v-divider class="mx-1"></v-divider>

<v-textarea
v-model="editedItem.lugar_hechos"
label="Lugar de los hechos"
hint="Si es posible, por favor, especifique el lugar exacto (corregimiento, vía, vereda, municipio, departamento en que tuvieron ocurrencia los hechos. Si es posible, en una hoja anexa, dibuje el lugar de ubicación exacta que complemente y permita determinar el lugar exacto de ocurrencia"
></v-textarea>
<cargar-documento documento="Lugar de los hechos" tipo="lh" ></cargar-documento>

<v-divider class="mx-1"></v-divider>

<label>Presuntos responsables:  </label>
<div v-for='(item, index) in editedItem.presuntos_responsables'>

<v-text-field label="Primer nombre" v-model="item.nombre_responsable" required></v-text-field>
<v-text-field label="Segundo nombre" v-model="item.nombre2_responsable" required></v-text-field>
<v-text-field label="Primer apellido" v-model="item.apellido1_responsable" required></v-text-field>
<v-text-field label="Segundo apellido" v-model="item.apellido2_responsable" required></v-text-field>
<v-text-field label="Alias" v-model="item.alias_responsable" required></v-text-field>
<v-select
        v-model="item.bloque_id"
        :items="src_bloques"
        label="Bloque"
        item-text="nombre"
        item-value='id'
        chips
></v-select>
<v-select
        v-model="item.frente_id"
        :items="src_frentes"
        label="Frente"
        item-text="nombre"
        item-value='id'
        chips
></v-select>
<v-text-field label="¿Cúal?" v-if="item.frente_id==81" v-model="item.otro" required></v-text-field>
<v-btn color="danger" @click="less_pres_resp(index)">-</v-btn>
<v-divider class="mx-1"></v-divider>
<v-spacer></v-spacer>
</div>
<v-btn color="info" @click="add_pres_resp">+</v-btn><label>Clic para agregar tantos presuntos responsables como requiera.</label>
<v-spacer></v-spacer>
<v-divider class="mx-1"></v-divider>
  <label>Algunos documentos que dan cuenta de los hechos que estoy reportando en donde consta que he sido víctima, son:
  (Incluya documentos como copia de inclusión en el RUV, denuncias ante otras instituciones, sentencias en donde haya sido reconocido(a) como víctima, entre otros).</label>

  <template v-for='(item, index) in adjuntar_documentos'>
  <cargar-documento documento="Adjunto" :tipo="index" ></cargar-documento>
  <!-- adjuntar_documentos ++; -->
  <v-btn color="danger" @click="less_documentos(index)">-</v-btn>
  <v-divider class="mx-1"></v-divider>
  <v-spacer></v-spacer>
  </template>

  <v-btn color="info" @click="add_documentos">+</v-btn><label>Clic para agregar tantos documentos como requiera.</label>

<v-divider class="mx-1"></v-divider>

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

                <label>Solicito que también sean reconocidos como víctimas los siguientes miembros de mi familia y/o allegados, para lo cual adjunto los siguientes registros civiles y/o pruebas que acreditan el daño por ellos sufrido en razón de los hechos victimizantes descritos: </label>
                <label>Por favor, indique los datos personales completos de sus familiares y/o allegados, así como los registros civiles y otra documentación aportada </label>
                <div v-for='(item, index) in editedItem.allegados_familiares'>
                <v-text-field label="Primer nombre" v-model="item.nombre_allegado" required></v-text-field>
                <v-text-field label="Segundo nombre" v-model="item.nombre2_allegado" required></v-text-field>
                <v-text-field label="Primer apellido" v-model="item.apellido1_allegado" required></v-text-field>
                <v-text-field label="Segundo apellido" v-model="item.apellido2_allegado" required></v-text-field>
                <v-text-field label="Documento" v-model="item.documento_allegado" required></v-text-field>
                <v-text-field label="Parentesco" v-model="item.parentezco_allegado" required></v-text-field>
                <cargar-documento documento="Adjuntar documento"  :tipo="item.nombre_allegado" ></cargar-documento>

                <v-btn color="danger" @click="less_allegados(index)">-</v-btn>
                <v-divider class="mx-1"></v-divider>
                <v-spacer></v-spacer>
                </div>
                <v-btn color="info" @click="add_allegados">+</v-btn><label>Clic para agregar tantos familiares o allegados como requiera.</label>
                <v-spacer></v-spacer>
                <v-divider class="mx-1"></v-divider>

                <label>Si desea adjuntar documentos adicionales de sus familiares o allegados, porfavor adjuntelos a continuación.</label>
                <template v-for='(item, index) in adjuntar_documentos_fa'>
                <cargar-documento documento="Adjuntar documento" :tipo="index" ></cargar-documento>
                <!-- adjuntar_documentos ++; -->
                <v-btn color="danger" @click="less_documentos_fa(index)">-</v-btn>
                <v-divider class="mx-1"></v-divider>
                <v-spacer></v-spacer>
                </template>
                <v-btn color="info" @click="add_documentos_fa">+</v-btn><label>Clic para agregar tantos documentos como requiera.</label>

                <v-divider class="mx-1"></v-divider>


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


             <label>¿Cuenta usted con un abogado de confianza que lo represente en el proceso?</label>
             <v-radio-group v-model='editedItem.abogado_confianza' row>
             <v-radio label="Si" value="Si"></v-radio>
               <v-radio label="No" value="No"></v-radio>
             </v-radio-group>
             <!-- // Si marco Si respuesta anterior -->
             <div v-if="editedItem.abogado_confianza=='Si'">

               <label>Nombre del abogado</label>
               <v-text-field label="Primer nombre" v-model="editedItem.nombre_abogado" ></v-text-field>
               <v-text-field label="Segundo nombre" v-model="editedItem.nombre2_abogado" ></v-text-field>
               <v-text-field label="Primer apellido" v-model="editedItem.apellido1_abogado" ></v-text-field>
               <v-text-field label="Segundo apellido" v-model="editedItem.apellido2_abogado" ></v-text-field>
               <v-text-field label="Dirección de notificación" v-model="editedItem.direccion_abogado" ></v-text-field>
               <v-text-field label="Teléfono de contacto" v-model="editedItem.telefono_abogado" ></v-text-field>
               <v-text-field label="Celular de contacto" v-model="editedItem.celular_abogado" ></v-text-field>
               <v-text-field label="Correo electrónico" v-model="editedItem.correo_abogado" ></v-text-field>
               <cargar-documento documento="Adjunto poder abogado" tipo="Abogado" ></cargar-documento>

               <label>¿	Anexa poder especial ?</label>
               <v-radio-group v-model='editedItem.poder_abogado' row>
               <v-radio label="Si" value="Si"></v-radio>
                 <v-radio label="No" value="No"></v-radio>
               </v-radio-group>
              </div>
               <!-- // Si marco No respuesta anterior -->
               <div v-if="editedItem.abogado_confianza=='No'">


                 <label>¿Esta siendo representado/a actualmente por un abogado del Sistema Autónomo de Asesoría y Representación Legal de la JEP?</label>
                 <v-radio-group v-model='editedItem.representado_actualmente_jep' row>
                 <v-radio label="Si" value="Si"></v-radio>
                   <v-radio label="No" value="No"></v-radio>
                 </v-radio-group>
               </div>
               <div v-if="editedItem.representado_actualmente_jep=='Si'">

                 <label>Nombre del abogado</label>
                 <v-text-field label="Primer nombre" v-model="editedItem.nombre_abogado" ></v-text-field>
                 <v-text-field label="Segundo nombre" v-model="editedItem.nombre2_abogado" ></v-text-field>
                 <v-text-field label="Primer apellido" v-model="editedItem.apellido1_abogado" ></v-text-field>
                 <v-text-field label="Segundo apellido" v-model="editedItem.apellido2_abogado" ></v-text-field>
                 <v-text-field label="Dirección de notificación" v-model="editedItem.direccion_abogado" ></v-text-field>
                 <v-text-field label="Teléfono de contacto" v-model="editedItem.telefono_abogado" ></v-text-field>
                 <v-text-field label="Celular de contacto" v-model="editedItem.celular_abogado" ></v-text-field>
                 <v-text-field label="Correo electrónico" v-model="editedItem.correo_abogado" ></v-text-field>

                </div>
                <div v-if="editedItem.representado_actualmente_jep=='No'">
                 <label>¿Manifiesta su interés en ser representado/a por un abogado común del Sistema Autónomo de Asesoría y Representación Legal de la JEP?</label>
                 <v-radio-group v-model='editedItem.manifiesta_interes' row>
                 <v-radio label="Si" value="Si"></v-radio>
                   <v-radio label="No" value="No"></v-radio>
                 </v-radio-group>
                   <!-- // Si marco No respuesta anterior -->
                   <div v-if="editedItem.manifiesta_interes=='No'">
                     <label>¿Manifiesta su voluntad de actuar por sí mismo/a en el proceso ante la JEP?</label>
                     <v-radio-group v-model='editedItem.voluntad_actuar_solo' row>
                     <v-radio label="Si" value="Si"></v-radio>
                       <v-radio label="No" value="No"></v-radio>
                     </v-radio-group>
                     <!-- // Si marco No respuesta anterior -->
                     <div v-if="editedItem.voluntad_actuar_solo=='No'">
                       <label>Por favor, indique qué otro medio de representación judicial usará:</label>
                       <v-text-field label="Medio de representación" v-model="editedItem.medio_representacion" ></v-text-field>

                     </div>

                   </div>

               </div>




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
             <label>¿Las víctimas solicitantes tienen alguna razón para temer por su seguridad, integridad, dignidad o bienestar actualmente, o identifica riesgos por el inicio de este proceso de acreditación ante la Jurisdicción Especial para la Paz?</label>
             <v-radio-group v-model='editedItem.riesgo_seguridad' row>
             <v-radio label="Si" value="Si"></v-radio>
               <v-radio label="No" value="No"></v-radio>
             </v-radio-group>
             <!-- // Si marco Si respuesta anterior -->
             <div v-if="editedItem.riesgo_seguridad=='Si'">
               <v-textarea
                  v-model="editedItem.razones_riesgo_seguridad"
                  label="¿Cuáles son las razones? "
                  ></v-textarea>


             </div>

             <v-divider class="mx-1"></v-divider>
             <label>¿Autoriza a ser notificado de las actuaciones de este caso por medios electrónicos?</label>
             <v-radio-group v-model='editedItem.autoriza_notificacion' row>
             <v-radio label="Si" value="Si"></v-radio>
               <v-radio label="No" value="No"></v-radio>
             </v-radio-group>

                <v-btn flat @click.native="step = 4">Anterior</v-btn>
                <v-btn color="primary"  @click.native="step = 6">Previsualizar</v-btn>
</v-form>
              </v-stepper-content>
			     <v-stepper-content step="6">
             <v-form
              ref="form_step_6"
              v-model="valid"
              lazy-validation
             >

             <v-card>
               <v-card-text>
                 <div>
                 <h4 class="headline mb-0">Información personal</h4>
                 <h2 class="headline mb-0">Visualización de la información registrada antes de enviarla, recuerde que puede dar clic sobre las pestañas del formulario si desea realizar algún cambio.</h2>
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

                <v-btn flat @click.native="step = 5">Anterior</v-btn>
                <v-btn color="primary" @click.prevent="save">Guardar</v-btn>
                <!-- <v-btn color="primary" @click.prevent="exportar_pdf">Exportar PDF</v-btn> -->
</v-form>
              </v-stepper-content>
            </v-stepper-items>
          </v-stepper>

                    <!-- </v-card-text> -->

                </v-card>
            <!-- </v-dialog> -->
        <!-- </v-toolbar> -->

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
      indicativos:['4 - ANTIOQUIA','5 - ATLÁNTICO','1 - BOGOTÁ D.C.','5 - BOLÍVAR','8 - BOYACÁ','6 - CALDAS','8 - CAQUETÁ','2 - CAUCA','5 - CESAR','4 - CÓRDOBA','1- CUNDINAMARCA','4- CHOCO','8 - HUILA','5 - GUAJIRA','5 - MAGDALENA','8 - META','2 - NARIÑO','7 - NORTE DE SANTANDER','6 - QUINDÍO','6 - RISARALDA','7 - SANTANDER','5 - SUCRE','8 - TOLIMA','3 - VALLE DEL CAUCA','7 - ARAUCA','8 - CASANARE','8 - PUTUMAYO','8 - SAN ANDRÉS Y PROVIDENCIA','8 - AMAZONAS','8 - GUAINÍA','8 - GUAVIARE','8 VAUPÉS','8 - VICHADA'],
      departamentos:['Boyacá','Santander'],
      municipios:['Tunja','Barbosa'],
      bloques:['BLOQUE CARIBE'],
      frentes:['FRENTE 19 JOSE PRUDENCIA PADILLA','FRENTE 35 ANTONIO JOSE DE SUCRE','FRENTE 37 BENKOS BIOHO','FRENTE 41 CACIQUE DE UPAR','FRENTE 59 RESISTENCIA GUAJIRA','RED URBANA JOSE ANTEQUERA'],
      documentos_requeridos:['Vigencia tarjeta profesional','Penales','Contravencionales','Disciplinarios CSJ', 'Diciplinarios PGN'],
      sexos:[],
      tipo_documentos:[],
      src_departamentos:[],
      src_municipios:[],
      src_frentes:[],
      src_bloques:[],
      src_departamentos_hechos:[],
      src_municipios_hechos:[],
      documento:"",
      nombreAdjunto:"",
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
      adjuntar_documentos:[],
      adjuntar_documentos_fa:[],
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
        nombre2_responsable:'',
        apellido1_responsable:'',
        apellido2_responsable:'',
        alias_responsable:'',
        estructura_responsable:'',
      },
      docu_adjunto:{
        documento:'',
      },
      docu_adjunto_fa:{
        documento:'',
      },
      fami_alle:{
        id:-1,
        nombre_allegado:'',
        nombre2_allegado:'',
        apellido1_allegado:'',
        apellido2_allegado:'',
        documento_allegado:'',
        parentezco_allegado:'',
        adjunto_allegado:'',
      },
      editedItem: {
        solicitud_anterior: '',
        no_registro_victima: '',
        formulario_propio: '',
        persona_victima: '',
        nombre_victima_solicitante: '',
        nombre2_victima_solicitante: '',
        apellido1_victima_solicitante: '',
        apellido2_victima_solicitante: '',
        direccion: '',
        departamento_id: '',
        municipio_id: '',
        grupo_etnico: '',
        nombre_grupo_etnico: '',
        organizacion_victimas: '',
        nombre_organizacion_victimas: '',
        sujeto_colectivo: '',
        nombre_sujeto_colectivo: '',
        indicativo: '',
        telefono_fijo: '',
        telefono_celular: '',
        correo: '',
        ocupacion_actual: '',
        hecho_victimizante: '',
        fecha_hechos_inicio: '',
        fecha_hechos_fin: '',
        departamento_hechos_id: '',
        municipio_hechos_id: '',
        lugar_hechos: '',
        abogado_confianza: '',
        nombre_abogado: '',
        nombre2_abogado: '',
        apellido1_abogado: '',
        apellido2_abogado: '',
        direccion_abogado: '',
        telefono_abogado: '',
        celular_abogado: '',
        correo_abogado: '',
        adjunto_poder_abogado: '',
        poder_abogado: '',
        representado_actualmente_jep: '',
        manifiesta_interes: '',
        voluntad_actuar_solo: '',
        medio_representacion: '',
        riesgo_seguridad: '',
        razones_riesgo_seguridad: '',
        autoriza_notificacion: '',
        estado: '',
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
      // 'editedItem.departamento_id': function (val){
      //
      //   if(this.editedItem.departamento_id){
      //     if(this.editedItem.departamento_id=="")
      //     {
      //      this.src_municipios=[];
      //      this.src_municipios.unshift({id:"",nombre:"Seleccione un valor.."})
      //     }
      //     else
      //     {
      //       console.log("municipio  1");
              //axios.get('/api/municipios/'+this.editedItem.departamento_id).then(response=>this.src_municipios=response.data.data);
      //     }
      //   }

      // },


      // 'editedItem.departamento_hechos_id': function (val){
      //
      //   if(this.editedItem.departamento_hechos_id){
      //     if(this.editedItem.departamento_hechos_id=="")
      //     {
      //      this.src_municipios_hechos=[];
      //      this.src_municipios_hechos.unshift({id:"",nombre:"Seleccione un valor.."})
      //     }
      //     else
      //     {
      //        console.log("municipio hechos 1");
      //         axios.get('/api/municipios/'+this.editedItem.departamento_hechos_id).then(response=>this.src_municipios_hechos=response.data.data);
      //     }
      //   }
      //
      // }
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
            EventBus.$on('file-to-upload', (file_to_upload,nombreAdj,tipoAdj) => {
                 // this.openFileDialog=false;

                 this.editedItem.files_to_upload[nombreAdj+" "+tipoAdj]=file_to_upload;
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
        axios.get('/api/departamentos').then(response=>this.src_departamentos=response.data.data);
        axios.get('/api/departamentos').then(response=>this.src_departamentos_hechos=response.data.data);
        axios.get('/api/bloques').then(response=>this.src_bloques=response.data.data);
        axios.get('/api/frentes').then(response=>this.src_frentes=response.data.data);
        // axios.get('/api/municipios').then(response=>this.src_municipios=response.data.data);
        axios.get('/api/tipo_documentos').then(response => {this.tipo_documentos=response.data.data;});


        this.editedItem.presuntos_responsables.push(Object.assign({},this.pres_resp));
        this.editedItem.allegados_familiares.push(Object.assign({},this.fami_alle));
        this.adjuntar_documentos.push(Object.assign({},this.docu_adjunto));
        this.adjuntar_documentos_fa.push(Object.assign({},this.docu_adjunto_fa));

        // this.$refs.form_step_1.reset()
        // this.$refs.form_step_2.reset()
        // this.$refs.form_step_3.reset()
        // this.$refs.form_step_4.reset()
        // this.$refs.form_step_5.reset()

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
      verifica_identificacion() {

        axios.get('/api/verifica_identificacion/'+this.editedItem.no_identificacion).then((response) => {
          console.log(response);
          if(response.data==1)
          {
            alert("Ya ha sido registrada una Solicitud de Acreditación como víctima del caso No. 01 asociada a este número de identificación '"+this.editedItem.no_identificacion+"'. En caso de que no sea así, por favor comuníquese con nosotros remitiendo un correo a victimas.caso01@jep.gov.co");
            this.editedItem.no_identificacion="";
          }
        });

      },
      trae_municipio()
      {
        axios.get('/api/municipios/'+this.editedItem.departamento_id).then(response=>this.src_municipios=response.data.data);
      },
      trae_municipio_hechos()
      {
        axios.get('/api/municipios/'+this.editedItem.departamento_hechos_id).then(response=>this.src_municipios_hechos=response.data.data);
      },

      email_igual() {
              if(this.editedItem.correo!=this.editedItem.correo_verificar)
              {
                alert("El correo eléctronico y la verificación deben coincidir.");
                this.editedItem.correo_verificar="";
              }
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

      add_documentos () {
        this.adjuntar_documentos.push(Object.assign({},this.docu_adjunto));
          // this.adjuntar_documentos++;
          // this.editedItem.allegados_familiares.push(Object.assign({},this.fami_alle));
      },

      less_documentos (index) {
          // this.$delete(this.editedItem.allegados_familiares,index);
          this.$delete(this.adjuntar_documentos,index);

      },
      add_documentos_fa () {
        this.adjuntar_documentos_fa.push(Object.assign({},this.docu_adjunto_fa));
          // this.adjuntar_documentos++;
          // this.editedItem.allegados_familiares.push(Object.assign({},this.fami_alle));
      },

      less_documentos_fa (index) {
          // this.$delete(this.editedItem.allegados_familiares,index);
          this.$delete(this.adjuntar_documentos_fa,index);

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
      exportar_pdf(){

                this.show_export_spinner=true;

                axios({
                    url: '/exportar_pdf',
                    params:this.editedItem,
                    method: 'GET',
                    responseType: 'blob', // important
                  }).then((response) => {
                    console.log(response);
                    // this.show_export_spinner=false;
                    const url = window.URL.createObjectURL(new Blob([response.data], {type:'application/pdf'}));
                     const link = document.createElement('a');
                     link.href = url;
                     link.setAttribute('download', 'formulario_registro.pdf'); //or any other extension
                     document.body.appendChild(link);
                     link.click();
                 })
                    .catch((error)=>{
                      this.show_export_spinner=false;
                      console.log(error);
                  });
              },
      save() {

        if(this.editedItem.files_to_upload)
        {
          console.log('Si existe files_to_upload')
          Object.entries(this.editedItem.files_to_upload).forEach(([key, val]) => {
              console.log(key);          // the name of the current key.
              console.log(val);          // the value of the current key.
              this.file = val;
              // this.file = this.editedItem.files_to_upload['"'+element+'"'];

              var formData = new FormData();
              formData.append('archivo', this.file);
              formData.append('nombre_adjunto', key);
              formData.append('identificacion', this.editedItem.nombre_victima_solicitante+"_"+this.editedItem.nombre2_victima_solicitante+"_"+this.editedItem.apellido1_victima_solicitante+"_"+this.editedItem.apellido2_victima_solicitante);
              console.log("A guardar = "+this.file.name);
              axios.post('/api/uploadFile',formData).then(response=>console.log(response.data));
          });


        }
        if (this.editedIndex > -1) {
          console.log("Entró a update");
          Object.assign(this.tableData[this.editedIndex], this.editedItem);

          axios.put('/api/atencion_victimas/'+this.editedItem.id,this.editedItem).then(response=>console.log(response.data));
        } else {
          console.log("Entró a save");

          if(confirm('Se guardará y enviará la información recibida, una vez registrada no podrá ser modificada. ¿ Desea enviar el formulario?'))
          {

          // console.log(this.editedItem)
          this.exportar_pdf();

          axios.post('/api/atencion_victimas',this.editedItem).then(response=>{
            this.tableData.push(response.data.abogado);
            alert("La información fué registrada, se ha generado un archivo PDF con la información de su formulario, por favor conservelo.")
            // window.location.href("/publico/atencion_victimas")
            // console.log(response.data)
            //location.reload();
          });
          }
        }
        this.close();
      },
    },
  };
</script>
<style lang="css" scoped>
  .estilo_jep{
    background-color: #0b121f;
  }
  .primary--text
  {color: red; }

</style>
<style> *{ text-transform: none !important; } </style>
