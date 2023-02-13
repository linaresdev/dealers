<?php
namespace Delta\Locale;
/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


class esDO {
	
	function header() {
		return [
         "slug"         => "es",
         "name"         => "es_DO",
         "description"  => "Español República Dominicana"
      ];
	}

	function lines() {
		return [

			"access.0"				=> "Público",
			"access.1" 				=> "Privado",
			"access.deny"			=> "Acceso denegado",

			"admin.groups"			=> "Gestionar grupos",
			"admin.users"			=> "Administrar usuarios",
			"admin.slug"			=> "Admin",

			"account.update"		=> "Actualizar cuenta",

			"client.address"		=> "Dirección del cliente",
			"client.contact"		=> "Información de contacto",
			'client.location'		=> "Localización",
			"client.update"			=> "Actualizar cliente",
			"client.name"			=> "Nombre del cliente",
			"client.email"			=> "Correo electrónico del cliente",
			"client.rnc"			=> "RNC del cliente",
			"client.cellphone"		=> "Numero de telefono celular del cliente",
			"client.sector"			=> "Sector",
			"content.empty"			=> "Sin contenido",

			"dealer.new"			=> "Nuevo dealer",
			"dealer.add"			=> "Agregar dealer",
			"dealer.manager"		=> "Administrar dealers",
			"dealer.update"			=>"Actualizar dealer",
			"description.short"		=> "Descripción corta",

			"domain.new"			=> "Nuevo dominio",

			"edit.credentials"		=> "Editar cedenciales",
			"edit.password"			=> "Editar contraseña",

			"entity.add"			=> "Agregar entidad",
			"entity.edit"			=> "Actualizar entidad",
			"entity.name"			=> "Nombre de la entidad",
			"entity.new"			=> "Nueva Entidad",
			"entity.meta"			=> "Meta data de la entidad",

			"filter.by"				=> "Filtrar busqueda por",
			"filter.user.fullname"	=> "Fitrar por nómbre",
			"filter.user.email"		=> "Fitrar por correo electrónico",			
			"filter.user.user"		=> "Fitrar por usuario",
			"filter.user.rnc"		=> "Fitrar por RNC",

			"form.error.exists"		=> "El campo :attribute no existe en nuestros registros",
			"form.error.required"	=> "El campo :attribute es requerido",
			"form.error.unique"		=> "La infomrción suministrada en el campo :attribute existe en nuestro registros",

			"group.new"			=> "Nuevo grupo",
			"group.data"		=> "Información del grupo",
			"group.domain"		=> "Organización o Grupo",
			"group.meta"		=> "Meta data del grupo",
			"group.remove"		=> "Remover del grupo",
			"group.rols"		=> "Grupo de trabajo",
			"group.type"		=> "Tipo de grupo",

			"icon.mdi"			=> "Icon Material Dedesing",

			"last.access"		=> "Último acceso",
			"load.logo"			=> "Cargar logo",

			"upload.logo"		=> "Subir logo",	

			"update.error"			=> "Error al tratar de aucalizar los datos",
			"update.logo"			=> "Actualizar logo",
			"update.rol"			=> "Actulizar permiso",
			"update.successfull" 	=> "Actualización realizada correctamente",

			"user.add"			=> "Agregar usuario",
			"user.create"		=> "Crear usuario",
			"user.form"			=> "Formulario de usuario",
			"user.groups"		=> "Mis grupos de usuarios",
			"user.new"			=> "Nuevo usuario",
			"user.password"		=> "Contraseña de acceso",
			"user.passconfirm"	=> "Confirmar contraseña",
			"user.register" 	=> "Registro de usuarios",
			"user.state.0"		=> "Inactivo",
			"user.state.1"		=> "Activo",
			"user.state.2"		=> "Suspención temporal",
			"user.state.3"		=> "Bloqueado",
			"user.state.4"		=> "Eliminado",

			"register.successfull" 	=> "Registro realizado correctamente",

			"request.edit-password" => "Solicitar cambio de contraseña",

			"rol.form"				=> "Formulario de funciones",

			"organization.new"		=> "Nueva organización",
			"organization.name"		=> "Nombre de la organización",
			"organization.update"	=> "Actualizar organización",

			"words.administration" 	=> "Adminstración",
			"warranty.add"			=> "Nueva garantía",
			"warranty.empty"		=> "No existen garantía registradas para mostrar",
			"warranty.form"		=> "Formulario de Garantía",
			"warranty.update"	=> "Actualizar garantía",

			"words.add"			=> "Agregar",
			"words.access"		=> "Accesos",
			"words.authorize"	=> "Permisos",
			"words.address"		=> "Dirección",
			"words.domain"		=> "Dominio",
			"words.to-access"	=> "Acceder",
			"words.actions"		=> "Acciones",
			"words.activate"	=> "Activar",
			"words.cellphone"	=> "Teléfono Celular",
			"words.client"		=> "Cliente",
			"words.clients"		=> "Clientes",
			"words.close"     	=> "Cerrar",
			"words.credentials"	=> "Credenciales",
			"words.create"		=> "Crear",
			"words.dealer"		=> "Dealer",			
			"words.dealers"		=> "Dealers",
			"words.delete"		=> "Eliminar",
			"words.description"	=> "Descripción",
			"words.edit"		=> "Editar",
			"words.email"     	=> "Correo Electrónico",
			"words.entity"		=> "Entidad",
			"words.entities"	=> "Entidades",
			"words.finder"		=> "Buscar",
			"words.firstname"	=> "Nombre",
			"words.functions"	=> "Funciones",
			"words.group"		=> "Grupo",
			"words.groups"		=> "Grupos",
			"words.home"		=> "Inicio",
			"words.icon"		=> "Icono",
			"words.information"	=> "Información",
			"words.insert"		=> "Insertar",
			"words.last-access"	=> "Último acceso",
			"words.lastname"	=> "Apellidos",	
			"words.login"     	=> "Acceso",
			"words.logo"		=> "Logo",
			"words.location"	=> "Localización",
			"words.manager"		=> "Administrar",
			"words.mantenance"	=> "Mantenimiento",
			"words.name"		=> "Nombre",
			"words.organization"	=> "Organización",
			"words.organizations"	=> "Organizaciones",
			"words.phone"		=> "Teléfono",
			"words.password"  	=> "Contraseña",
			"words.public"		=> "Público",
			"words.private"		=> "Privado",
			"words.rols"		=> "Funciones",
			"words.receptionist" => "Recepcionista",	
			"words.rnc"			=> "RNC",
			"words.reference"	=> "Referencia",
			"words.register"	=> "Registrar",
			"words.retrieve"  	=> "Recuperar",
			"words.remember"  	=> "Recuerda",
			"words.user"      	=> "Usuario",
			"words.users"      	=> "Usuarios",
			"words.update"		=> "Actualizar",
			"words.view"		=> "Vista",
			"words.sector"		=> "Sector",
			"words.send"      	=> "Enviar",
			"words.state"		=> "Estado",
			"words.warranty"	=> "Garantía",
			"words.warranties"	=> "Garantías",
			"words.save"		=> "Guardar",
			"words.security"	=> "Seguridad",
			"words.slug"		=> "Nombre amigable",
			"words.seller"		=> "Vendedor",

			"works.group"		=> "Grupo de trabajo",

			"send.edit-password"	=> "Enviar cambio de contraseña.",
			"search.users"			=> "Buscar usuarios",


    	];
	}
}