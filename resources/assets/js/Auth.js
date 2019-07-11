export default class Auth{

	constructor(user){
		this.user=user;
	}

	

	getId(){
		return this.user.user.id;
	}

	genero(){
		return this.user.user.genero;
	}

	roles(){
		return (this.user.user.roles ? this.user.user.roles.map(role=>role.name) : []);
	}

	permissions(){
		return (this.user.user.permissions ? this.user.user.permissions.map(permission=>permission.name):[]);
	}

	notifications(){
        return this.user.user.notifications;
	}

	// despachos(){
  //       return this.user.user.corporacion.despachos;
	// }
	//
	// abogados(){
  //       return this.user.abogados;
  // }

	isAdmin(){
		return  (this.roles().includes("Admin") || this.roles().includes("Super Administrador"));
	}

	hasRole(role_name){
		return  this.roles().includes(role_name);
	}

	can(permissionName){
		return  this.permissions().includes(permissionName);
	}

}
