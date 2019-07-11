export default  {

    methods: {

        fetchTiposDocumentos(){

          axios.get('/api/tipo_documentos')
                .then(response=>{
                    this.tipo_documentos=response.data
                    console.log("Resultado =  ".response);
                    this.tipo_documentos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchDepartmentos(){

          axios.get('departamentos')
                .then(response=>{
                    this.departamentos=response.data
                    this.departamentos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },

      fetchMunicipios(){

          if(this.formParams.selected_departamento){

            if(this.formParams.selected_departamento.id=="")
            {
             this.municipios=[];
             this.municipios.unshift({id:"",nombre:"Seleccione un valor.."})
            }
            else
            {
             axios.get('municipios/'+this.formParams.selected_departamento.id)
                          .then(response=>{
                              //console.log(response.data);
                              this.municipios= response.data

                          })
                          .catch((error)=>{
                          console.log(error);
                      });
                }

              }
        },


      fetchDepartmentos_r(){

          axios.get('departamentos')
                .then(response=>{
                    this.departamentos_r=response.data
                    this.departamentos_r.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchMunicipios_r(){

          if(this.formParams.selected_departamento_r){
            if(this.formParams.selected_departamento_r.id=="")
            {
             this.municipios_r=[];
             this.municipios_r.unshift({id:"",nombre:"Seleccione un valor.."})
            }
            else
            {

            axios.get('municipios/'+this.formParams.selected_departamento_r.id)
                          .then(response=>{
                              //console.log(response.data);
                              this.municipios_r= response.data
                          })
                          .catch((error)=>{
                          console.log(error);
                      });
              }
           }
        },

        fetchSexos(){

          axios.get('sexos')
                .then(response=>{
                    this.sexos=response.data
                    this.sexos.unshift({id:"",nombre:"Seleccione un valor.."})

                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchIdentidadGenero(){

          axios.get('identidad_genero')
                .then(response=>{
                    this.identidad_genero=response.data
                    this.identidad_genero.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchOrientacionSexual(){

          axios.get('orientacion_sexual')
                .then(response=>{
                    this.orientacion_sexual=response.data
                    this.orientacion_sexual.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchestadosCiviles(){

          axios.get('estados_civiles')
                .then(response=>{
                    this.estados_civiles=response.data
                    this.estados_civiles.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchNivelEducativo(){

          axios.get('nivel_educativo')
                .then(response=>{
                    this.nivel_educativo=response.data
                    this.nivel_educativo.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchTipoPersona(){

          axios.get('tipo_persona')
                .then(response=>{
                    this.tipo_persona=response.data
                    this.tipo_persona.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },

         fetchDiscapacidades(){

          axios.get('discapacidades')
                .then(response=>{
                    this.discapacidades=response.data
                    this.discapacidades.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },

        fetchEtnias(){

          axios.get('etnias')
                .then(response=>{
                    this.etnias=response.data
                    this.etnias.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },

        fetchTerritorios(){

          axios.get('territorios')
                .then(response=>{
                    this.territorios=response.data
                    this.territorios.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchFuentes(){

          axios.get('fuentes')
                .then(response=>{
                    this.fuentes=response.data;
                    // console.log(this.fuentes);
                    // this.fuentes.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchLenguas(){

          axios.get('lenguas')
                .then(response=>{
                    this.lenguas=response.data
                    this.lenguas.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        cargar_victimas(){

         axios.get('listar_victimas')
        .then(response =>{(this.victimas = response.data)
          })
         .catch(error => {console.log(error)});

        },
        cargar_presuntos_autores(){
         axios.get('listar_presuntos_autores')
        .then(response =>{(this.autores = response.data)


          })
            .catch(error => {console.log(error)});

        },
        cargar_hechos_generales(){
         axios.get('listar_hechos_generales')
        .then(response =>{(this.hechos_generales = response.data)
        // alert(JSON.stringify(response.data));
        // alert(JSON.stringify(response.data.nombres));

          })
            .catch(error => {console.log(error)});

        },
        cargar_hechos_personas(){

         axios.get('listar_hechos_personas')
        .then(response =>{(this.hechos_personas = response.data)
          })
         .catch(error => {console.log(error)});

        },
        fetchRangos(){

          axios.get('rangos')
                .then(response=>{
                    this.rangos=response.data
                    this.rangos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchTiposAutores(){

          axios.get('tipos_autores')
                .then(response=>{
                    this.tipos_autores=response.data
                    this.tipos_autores.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchRangosGrupoArmado(){

            axios.get('rangos_grupo_armado')
                  .then(response=>{
                      this.rangosGrupoArmado=response.data
                      this.rangosGrupoArmado.unshift({id:"",nombre:"Seleccione un valor.."})
                  })
                  .catch((error)=>{
                  console.log(error);
              });
        },
        fetchSubestructuras(){

          axios.get('subestructuras')
                .then(response=>{
                    this.subestructuras=response.data
                    this.subestructuras.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchSubestructuras_fuerza(){

          axios.get('subestructuras_fuerza')
                .then(response=>{
                    this.subestructuras=response.data
                    this.subestructuras.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchHoras(){

          axios.get('horas')
                .then(response=>{
                    this.horas=response.data
                    this.horas.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEscenarios(){

          axios.get('escenarios')
                .then(response=>{
                    this.escenarios=response.data
                    // this.escenarios.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchZonas(){

          axios.get('zonas')
                .then(response=>{
                    this.zonas=response.data
                    this.zonas.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
         listar_victimas_sl(row_id){
            // alert("Mix"+row_id);
         axios.get('listar_victimas_select/'+row_id+'/listar_victimas_select')
        .then(response =>{(this.victimas_sl = response.data)
        // alert(JSON.stringify(response.data));

          })
            .catch(error => {console.log(error)});

        },
        listar_autores_sl(row_id){
            // alert("Mix"+row_id);
         axios.get('listar_autores_select/'+row_id+'/listar_autores_select')
        .then(response =>{(this.autores_sl = response.data)
        // alert(JSON.stringify(response.data));

          })
            .catch(error => {console.log(error)});

        },
        fetchAfrontamientos(){

          axios.get('afrontamientos')
                .then(response=>{
                    this.afrontamientos=response.data
                    this.afrontamientos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEntidades(){

          axios.get('entidades')
                .then(response=>{
                    this.entidades=response.data
                    // this.entidades.unshift({id:"",nombre:"Seleccione un valor.."})

                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchVulnerabilidades(){

          axios.get('vulnerabilidades')
                .then(response=>{
                    this.vulnerabilidades=response.data

                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchAgresiones(){

          axios.get('agresiones')
                .then(response=>{
                    this.agresiones=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchPresuntosAutores(){

          axios.get('presuntos')
                .then(response=>{
                    this.presuntos=response.data
                    this.presuntos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchTransportes(){

          axios.get('transportes')
                .then(response=>{
                    this.transportes=response.data
                    this.transportes.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchFisicos(){

          axios.get('fisicos')
                .then(response=>{
                    this.fisicos=response.data
                    this.fisicos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchImpactoPsico(){

          axios.get('impacto_psico')
                .then(response=>{
                    this.impacto_psico=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchImpactoCultural(){

          axios.get('impacto_cult')
                .then(response=>{
                    this.impacto_cult=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEmbarazo(){

          axios.get('embarazos')
                .then(response=>{
                    this.embarazos=response.data
                    this.embarazos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchOpciones(){

            axios.get('opciones')
                  .then(response=>{
                      this.opciones=response.data
                      this.opciones.unshift({id:"",nombre:"Seleccione un valor.."})
                  })
                  .catch((error)=>{
                  console.log(error);
              });
          },
        fetchAutoridades(){

          axios.get('autoridades')
                .then(response=>{
                    this.autoridades=response.data
                    this.autoridades.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchParticipaciones(){

          axios.get('participaciones')
                .then(response=>{
                    this.participaciones=response.data
                    this.participaciones.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchOcupaciones(){

          axios.get('ocupaciones')
                .then(response=>{
                    this.ocupaciones=response.data
                    this.ocupaciones.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEntornos(){

          axios.get('entornos')
                .then(response=>{
                    this.entornos=response.data
                    this.entornos.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchHechosVictimizantes(){

          axios.get('hechos_victimizantes')
                .then(response=>{
                    this.hechos_victimizantes=response.data
                    // this.hechos_victimizantes.unshift({id:"",nombre:"Seleccione un valor.."})
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchMedidasReparar(){

          axios.get('medidas_reparacion')
                .then(response=>{
                    this.medidas_reparacion=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEntidadesProteccion(){

          axios.get('entidades_proteccion')
                .then(response=>{
                    this.entidades_proteccion=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchRangosEdades(){

          axios.get('rangos_edades')
                .then(response=>{
                    this.rangos_edades=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
       listar_victimas_hechos(row_id){
            // alert("Mix"+row_id);
         axios.get('listar_hechos_v/'+row_id+'/listar_hechos_v')
        .then(response =>{(this.hechos_victimas_md = response.data)
        // alert(JSON.stringify(response.data));

          })
            .catch(error => {console.log(error)});

        },
        cargar_victimas_hecho(row_id){


         axios.get('victimas_hecho/'+row_id+'/victimas_hecho')
        .then(response =>{(this.victimas_h = response.data)
        // alert(JSON.stringify(this.victimas_h));
          })
            .catch(error => {console.log(error)});

        },

        cargar_autores_hecho(row_id){


         axios.get('autores_hecho/'+row_id+'/autores_hecho')
        .then(response =>{(this.autores_h = response.data)
        // alert(JSON.stringify(this.victimas_h));
          })
            .catch(error => {console.log(error)});

        },
        fetchlistar_items_menu(){

          axios.get('listar_items_menu')
                .then(response=>{
                    this.items=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchHechosDaninos(){

          axios.get('hechos_daninos')
                .then(response=>{
                    this.hechos_daninos=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchEscenariosAtaques(){

          axios.get('escenarios_ataques')
                .then(response=>{
                    this.escenarios_ataques=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },
        fetchFinalidades(){

          axios.get('finalidades')
                .then(response=>{
                    this.finalidades=response.data
                })
                .catch((error)=>{
                console.log(error);
            });
        },









    }
}
