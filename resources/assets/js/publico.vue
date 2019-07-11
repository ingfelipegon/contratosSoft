<template>
    <div >
        <v-app id="inspire" dark class="estilo_jep">


            <v-toolbar app fixed clipped-left>
              <!-- <v-img max-width="250px" position="center" :src="image_src"></v-img> -->
              <!-- <v-img  max-width="250px" src="https://www.jep.gov.co/PublishingImages/svgfiles/horizontal.svg" ></v-img> -->
              <v-img  max-width="250px" src="/images/logo.png" ></v-img>
              <!-- <img src="../logo.png"> -->
                <v-toolbar-title>Formulario Online de Solicitud de Acreditación como víctima del caso 01</v-toolbar-title>
                <v-spacer></v-spacer>



            </v-toolbar>


            <v-content>
                <v-container >
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
               JEP &copy; {{ new Date().getFullYear() }}
                </v-flex>
            </v-footer>
        </v-app>
    </div>
</template>

<script>

 import { EventBus } from './EventBus'
  export default {

    props:['app_name'],
    data() {
    return {
      image_src: require("../logo.png"),
      };
    },
    // data: () => ({
    //   drawer: null,
    //   allNotifications:[],
    //     image_src: require("../assets/logo.png"),
    //
    // }),

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
<style lang="css" scoped>
  .estilo_jep{
    background-color: #0b121f;
  }
</style>
