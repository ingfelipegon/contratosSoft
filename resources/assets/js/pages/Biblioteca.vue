<template>
  <v-card
    class="mx-auto"
    max-width="800"
  >
    <v-sheet class="pa-3 primary lighten-2">      
      <v-text-field
        v-model="search"
        label="Buscar en directorio de la JEP"
        dark
        flat
        solo-inverted
        hide-details
        clearable
        clear-icon="mdi-close-circle-outline"
      ></v-text-field>
      <v-checkbox
        v-model="caseSensitive"
        dark
        hide-details
        label="Mayúsculas y minúsculas"
      ></v-checkbox>
    </v-sheet>      
    <v-card-text>      
      <v-treeview
        :items="items"
        :search="search"
        :filter="filter"
        :open.sync="open"
      >   
        <template v-slot:prepend="{ item }">
          <v-icon color="yellow darken-2" v-if="item.children">
                    folder
                  </v-icon>
                  <a v-if="!item.children" @click.prevent="downloadItem(item.nombre)" target="_blank"  href="">                  
                    <v-icon v-if="!item.children">
                      archive
                    </v-icon>                  
                  </a>
        </template>
      </v-treeview>
    </v-card-text>
  </v-card>   
</template>

<script>
  import { EventBus } from '../EventBus'
  import CargarDocumento from '../components/CargarDocumento'

  export default {
    data: () => ({
      items: [
        {
          id: 1,
          name: 'Biblioteca de documentos disponibles JEP',
          children: [
            {
              id: 2,
              name: 'De la Nación',
              children: [
                {
                  id: 201,
                  name: 'Constitución política de Colombia',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 202,
                  name: 'Código Civil',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 203,
                  name: 'Código de Comercio',
                  nombre:'Constitucion politica de Colombia.pdf'
                }                
              ]
            },
            {
              id: 3,
              name: 'De la JEP',
              children: [
                {
                  id: 301,
                  name: 'Manual de Contratación',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 302,
                  name: 'Manual de Supervisión',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 303,
                  name: 'Resolución de delegación',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 304,
                  name: 'Manual de Funciones de las áreas',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 305,
                  name: 'Organigrama de la Entidad',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 306,
                  name: 'Plan Anual de Adquisiciones y sus actualizaciones',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 307,
                  name: 'Procedimientos de métodos de selección de contratistas',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 308,
                  name: 'Modelos de Reglas de Invitación de cada modalidad de selección de contratistas',
                  nombre:'Constitucion politica de Colombia.pdf'
                }
              ]
            },
            {
              id: 4,
              name: 'De Otros documentos',
              children: [
                {
                  id: 401,
                  name: 'Otros procedimientos en fases de planeación, precontractual y postcontractual',
                  nombre:'Constitucion politica de Colombia.pdf'
                },
                {
                  id: 402,
                  name: 'Otros modelos en fases de planeación, precontractual y postcontractual',
                  nombre:'Constitucion politica de Colombia.pdf'
                }
              ]
            }
          ]
        }
      ],
      open: [1, 2],
      search: null,
      caseSensitive: false
    }),

    methods: {
      
      downloadItem (nombre) {        
        console.log("descarga con nombre:  " + nombre);
        
        axios.get('/api/descarga/' + nombre, { responseType: 'arraybuffer' })
          .then(({ data }) => {
            let blob = new Blob([data], {type: 'application/pdf'});
            let link = document.createElement('a')
            link.href = window.URL.createObjectURL(blob)
            link.download = nombre
            console.log("ruta:  " + link.href);
            link.click()          
        })
      }
    },

    computed: {
      filter () {
        return this.caseSensitive
          ? (item, search, textKey) => item[textKey].indexOf(search) > -1
          : undefined
      }
    }
  }
</script>