<template>
    <div  >
        <v-app id="inspire" dark>
            <v-navigation-drawer
                    clipped
                    fixed
                    v-model="drawer"
                    app
                    hide-overlay
                    stateless
            >
                <v-list dense>

                    <!-- <v-list-tile exact to="/home/mistramites" v-if="$auth.hasRole('Persona')">
                        <v-list-tile-action>
                            <v-icon>open_with</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Mis Tramites</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile> -->

                    <!-- <v-list-tile exact to="/home/tramites" v-if="!$auth.hasRole('Persona')">
                        <v-list-tile-action>
                            <v-icon>open_with</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Tramites</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile> -->

                    <!-- <v-list-tile to="/home/abogados" v-if="!$auth.hasRole('Persona')"> -->
                    <!-- <v-list-tile to="/home/abogados" v-if="!$auth.hasRole('Persona')"> -->
                    <v-list-tile to="/home/Adquisiciones">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Configuracion PAA</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/Solicitudes">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Solicitud Precontractual JEP</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/Postcontractual">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Solicitud Postcontractual JEP</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/Procesos">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Procesos de Contratación JEP</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/Custodias">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Registro y custodia de documentos físicos</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>     
                    <v-list-tile to="/home/Biblioteca">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Biblioteca de Documentos</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>                    
                    <!-- <v-list-tile to="/home/abogados">
                        <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Abogados SAAD</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/abogados_confianza"> -->
                    <!-- <v-list-tile to="/home/abogados_confianza" v-if="!$auth.hasRole('Persona')"> -->
                        <!-- <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Abogados de confianza</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile to="/home/atencion_victimas" > -->
                    <!-- <v-list-tile to="/home/atencion_victimas" v-if="!$auth.hasRole('Persona')"> -->
                        <!-- <v-list-tile-action>
                            <v-icon>person</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>Atención a victimas (Registro)</v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile> -->
                    <v-list-group no-action>
                        <v-list-tile slot="activator">
                            <v-list-tile-action>
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Usuario Administrador</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <v-list-tile to="/home/users">
                            <v-list-tile-action>
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Usuarios</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <v-list-tile to="/home/roles">
                            <v-list-tile-action>
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Perfiles</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <!-- <v-list-tile to="/home/permissions">
                            <v-list-tile-action>
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Permisos</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile> -->
                    </v-list-group>



                </v-list>

            </v-navigation-drawer>

            <v-toolbar app fixed clipped-left>
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <v-toolbar-title>{{app_name}}</v-toolbar-title>
                <v-spacer></v-spacer>

                <!-- <v-menu @input="markAsRead" offset-y origin="center center" class="elevation-1" :nudge-bottom="14" transition="scale-transition">
                    <v-btn icon flat slot="activator">
                        <v-badge color="red" overlap>
                            <span slot="badge">{{unreadNotifications.length}}</span>
                            <v-icon medium>notifications</v-icon>
                        </v-badge>
                    </v-btn>
                    <v-list>
                        <v-list-tile   v-for="notification in unreadNotifications"  :key="notification.id">
                            <v-list-tile-content>
                              <v-list-tile-title>{{notification.notification}}</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>

                </v-menu> -->
                <v-menu offset-y origin="center center" :nudge-bottom="10" transition="scale-transition">
                    <v-btn icon large flat slot="activator">
                        <v-avatar size="30px">
                            <img src="https://via.placeholder.com/150" alt=""/>

                        </v-avatar>
                    </v-btn>
                    <v-list class="pa-0">
                        <v-list-tile
                                ripple="ripple"
                                rel="noopener"
                        >
                            <v-list-tile-content>
                                <v-list-tile-title>{{$auth.user.name}}</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>

                    <v-list class="pa-0">
                        <v-list-tile
                                @click="logout()"
                                ripple="ripple"
                                rel="noopener"
                        >
                            <v-list-tile-action >
                                <v-icon>account_circle</v-icon>
                            </v-list-tile-action>
                            <v-list-tile-content>
                                <v-list-tile-title>Salir</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>
                    </v-list>
                </v-menu>
            </v-toolbar>


            <v-content>
                <v-container fluid fill-height>
                    <v-layout justify-center>
                        <v-flex >
                            <router-view></router-view>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
            <v-footer app fixed>
                <v-flex

                    py-2
                    text-xs-center
                    white--text
                    xs12
                  >
               Sistema de Gestión de Procesos de Contratación - JEP &copy; {{ new Date().getFullYear() }}
                </v-flex>
            </v-footer>
        </v-app>
    </div>
</template>

<script>

 import { EventBus } from './EventBus'
  export default {

    props:['app_name'],
    data: () => ({
      drawer: null,
      allNotifications:[]
    }),

    created(){


        //     Echo.private('App.Models.Usuario.'+this.$auth.getId() )
        //         .notification((notification) => {
        //
        //             this.allNotifications.push(notification);
        //             EventBus.$emit("nueva_notificacion");
        //
        //
        //
        //         });
        //
        // if(this.$auth.user.user.notifications) this.allNotifications=this.$auth.notifications();

    },

    computed:{

        unreadNotifications:{

            //getter
            get: function () {

                return this.allNotifications.filter(notification=>{
                      return notification.read_at==null;

                })
            },

            // setter
            set: function (newValue) {

            }
        }

    },

    methods:{

        markAsRead(active){
            if (active) {
                return false;
            }
            axios.get('api/mark-all-notifications-as-read/'+this.$auth.getId()).then(response=>{

                    this.allNotifications=[];

            });

        },

       logout(){

        //console.log('entra a logout');

          axios.post('/logout')
                .then(response=>{
                   console.log('logout en server side ok!');
                   //this.$router.push('/');

                    window.location.replace("/login");
                })
                .catch((error)=>{
                console.log(error);
            });
        }
    }
  };
</script>
