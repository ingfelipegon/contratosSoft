import Vue from 'vue'
import Router from 'vue-router'
import Users from '../pages/Users'
import Roles from '../pages/Roles'
import Permissions from '../pages/Permissions'
import Abogados from '../pages/Abogados'
import AbogadosConfianza from '../pages/AbogadosConfianza'
import AtencionVictimas from '../pages/AtencionVictimas'
import AtencionVictimasRegistro from '../pages/AtencionVictimasRegistro'
import Adquisiciones from '../pages/Adquisiciones'
import Solicitudes from '../pages/Solicitudes'
import SolicitudesPostcontractual from '../pages/Postcontractual'
import Procesos from '../pages/Procesos'
import ProcesoAbogado from '../pages/ProcesoAbogado'
import ProcesoAbogadoPost from '../pages/ProcesoAbogadoPost'
import Custodias from '../pages/Custodias'
import Biblioteca from '../pages/Biblioteca'

Vue.use(Router)

export default new Router({
	mode: 'history',
	  routes: [
	  //  {
	  //     path: '/home',
	  //     component: Tramites
	  // },
	  {
	      path: '/home/users',
	      component: Users
	  },
		{
			 path: '/home/roles',
			 component: Roles
	 },
	 {
			 path: '/home/permissions',
			 component: Permissions
	 },
	 {
			 path: '/home/abogados',
			 component: Abogados
	 },
	 {
			 path: '/home/abogados_confianza',
			 component: AbogadosConfianza
	 },
	 {
			 path: '/publico/atencion_victimas',
			 component: AtencionVictimasRegistro
	 },
	 {
			 path: '/home/atencion_victimas',
			 component: AtencionVictimas
	 },
	 {
			 path: '/home/adquisiciones',
			 component: Adquisiciones
	 },
	 {
			 path: '/home/solicitudes',
			 component: Solicitudes
	 },
	 {
			 path: '/home/Postcontractual',
			 component: SolicitudesPostcontractual
	 },	 
	 {
			 path: '/home/procesos',
			 component: Procesos
	 },
	 {
			 path: '/home/procesoAbogado/:id',
			 name: 'procesoAbogado',
			 component: ProcesoAbogado
	 },
	 {
			 path: '/home/procesoAbogadoPost/:id',
			 name: 'procesoAbogadoPost',
			 component: ProcesoAbogadoPost
	 },	 
	 {
			 path: '/home/custodias', 
			 component: Custodias
	 },
	 {
			 path: '/home/biblioteca', 
			 component: Biblioteca
	 }
 ]
})
