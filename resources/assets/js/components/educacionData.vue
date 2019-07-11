<template>
  <div>
  <v-radio-group v-model='editedItem.grado' row>
  <v-radio label="Pregrado" value="radio-1"></v-radio>
  <v-radio label="Posgrado" value="radio-2"></v-radio>
  </v-radio-group>

  <!-- <v-menu
  ref="menu"
  v-model="fecha_menu"
  :close-on-content-click="false"
  :nudge-right="40"
  :return-value.sync="fecha_grado"
  lazy
  transition="scale-transition"
  offset-y
  full-width
  min-width="290px"
  >
  <v-text-field
  slot="activator"
  v-model="fecha_grado"
  label="Fecha de grado"
  prepend-icon="event"
  readonly
  ></v-text-field>
  <v-date-picker v-model="fecha_grado" no-title scrollable> -->
  <!-- <v-spacer></v-spacer>
  <v-btn flat color="primary" @click="fecha_menu = false">Cancelar</v-btn>
  <v-btn flat color="primary" @click="$refs.fecha_menu.save(fecha_grado)">Aceptar</v-btn>
  </v-date-picker> -->
  <!-- </v-menu> -->
  <v-text-field label="Titulo" v-model="editedItem.titulo" required></v-text-field>
  <v-text-field label="Universidad" v-model="editedItem.universidad" required></v-text-field>
  <v-text-field label="País" v-model="editedItem.pais" required></v-text-field>
    <v-spacer></v-spacer>
</div>
</template>
<script>
export default {
  data: () => ({
    // fecha_menu: '',
    // fecha_grado: '',
    // titulo: '',
    // pais: '',
    // grado: '',
    // universidad: '',
    editedItem:[]
  })
}
</script>
