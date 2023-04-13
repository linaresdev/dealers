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

			"access.resources.empty"	=> "Su posee recursos asignado para esta solicitud",

			"auth.0"				=> "Cuenta desabilitada",
			"auth.2"				=> "Cuenta bloqueada",
			"auth.3"				=> "Cuenta enviada a legales",

			"admin.groups"			=> "Gestionar grupos",
			"admin.users"			=> "Administrar usuarios",
			"admin.slug"			=> "Admin",

			"account.update"		=> "Actualizar cuenta",
			"account.remove"		=> "Remover cuenta",
			"credential.update"		=> "Actualizar credenciales",
			"client.address"		=> "Dirección del cliente",
			"client.contact"		=> "Información de contacto",
			'client.location'		=> "Localización",
			"client.update"			=> "Actualizar cliente",
			"client.name"			=> "Nombre del cliente",
			"client.email"			=> "Correo electrónico del cliente",
			"client.rnc"			=> "RNC del cliente",
			"client.cellphone"		=> "Numero de telefono celular del cliente",
			"client.sector"			=> "Sector",
			'close.eyelash'			=> "Puede cerrar esta pestaña",
			"content.empty"			=> "Sin contenido",

			"customer.name"			=> "Nombre del cliente",

			"delete.org"			=> "Organización eliminada",
			"delete.error"			=> "Error al tratar de eliminar el recurso",

			"dealer.new"			=> "Registrar dealer",
			"dealer.add"			=> "Agregar dealer",
			"dealer.manager"		=> "Administrar dealers",
			"dealer.update"			=>"Actualizar dealer",
			"dealer.search"			=> "Buscar dealers",
			"description.short"		=> "Descripción corta",

			"domain.new"			=> "Nuevo dominio",

			"edit.credentials"		=> "Editar cedenciales",
			"edit.password"			=> "Editar contraseña",

			"entity.add"			=> "Agregar entidad",
			"entity.edit"			=> "Actualizar entidad",
			"entity.name"			=> "Nombre de la entidad",
			"entity.new"			=> "Nueva Entidad",
			"entity.meta"			=> "Meta data de la entidad",
			"entity.work"			=> "Entitdades de trabajo",

			"empty.data"			=> "Sin datos para mostrar",

			"form.user"				=> "Registrar ususario desde un formulario",

			"filter.by"				=> "Filtrar busqueda por",
			"filter.user.fullname"	=> "Fitrar por nómbre",
			"filter.user.email"		=> "Fitrar por correo electrónico",			
			"filter.user.user"		=> "Fitrar por usuario",
			"filter.user.rnc"		=> "Fitrar por RNC",
			"filter.warranty"		=> "Filtrar garantía",

			"form.error.exists"		=> "El campo :attribute no existe en nuestros registros",
			"form.error.required"	=> "El campo :attribute es requerido",
			"form.error.unique"		=> "El :attribute suministrado existe en nuestro registros",

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

			"membership.mailship"	=> "Enviar solicitud de registro por correo electrónico.",
			"membership.register.successfull"	=> "Membresía registrada correctamente",

			"membership.register.error"	=> "Ocurrió un error; No fue posible registrar su membresía",

			"upload.logo"		=> "Subir logo",	
			"update.account"		=> "Actualizar cuenta",
			"update.error"			=> "Error al tratar de aucalizar los datos",
			"update.credentials"	=> "Actualizar credenciales",
			"update.logo"			=> "Actualizar logo",
			"update.rol"			=> "Actulizar permiso",
			"update.successfull" 	=> "Actualización realizada correctamente",
			"update.password"		=> "Actualizar contraseña",

			"user.add"			=> "Agregar usuario",
			"user.create"		=> "Crear usuario",
			"user.form"			=> "Formulario de usuario",
			"user.groups"		=> "Mis grupos de usuarios",
			"user.new"			=> "Nuevo usuario",
			"user.ongroup"		=> "Usuarios inscritos",
			"user.password"		=> "Contraseña de acceso",
			"user.passconfirm"	=> "Confirmar contraseña",
			"user.register" 	=> "Registro de usuarios",
			"user.rol"			=> "Permiso de usuarios",
			"user.state.0"		=> "Inactivo",
			"user.state.1"		=> "Activo",
			"user.state.2"		=> "Suspención temporal",
			"user.state.3"		=> "Bloqueado",
			"user.state.4"		=> "Eliminado",
			"user.search"		=> "Buscar usuarios",

			"new.password"				=> "Nueva contraseña",
			"new.confirm.password"		=> "Confirmar su nueva contraseña",

			"register.form"			=> "Formulario de registro",
			"register.membership"	=> "Solicitud de registro",
			"register.successfull" 	=> "Registro realizado correctamente",
			"register.error"		=> "Error al tratar de registrar los datos",
			"register.sendmail"		=> "Enviar solicitud de registro",


			"request.edit-password" => "Solicitar cambio de contraseña",

			"request.membership.corrupted"	=> "Esta solicitud esta corrupta o fue alterada",
			"request.membership.deprecated" => "Esta solicitud expiro.",
			"request.membership.empty"		=> "Esta solicitud no existe",
			"request.membership.error"		=> "Solicitud con errores",

			"required.all"			=> "Todos los campos son requeridos",

			"rol.form"					=> "Formulario de funciones",
			"rol.update.error"			=> "Error al tratar de actualizar lso permisos",
			"rol.update.successfull"	=> "Permisos actualizados correctamente", 
			"old.password"			=> "Contraseña actual",
			"organization.new"		=> "Nueva organización",
			"organization.name"		=> "Nombre de la organización",
			"organization.update"	=> "Actualizar organización",

			"password.update"		=> "Actualizar contraseña",
			"password.confirm"		=> "Confirmar contraseña",
			"password.old.bad"		=> "Contraseña actual invalida",
			"password.same.bad"		=> "Contraseñas no coinciden",

			"words.administration" 	=> "Adminstración",

			"warranty.add"			=> "Nueva garantía",
			"words.aplications"		=> "Aplicaciones",
			"warranty.empty"		=> "No existen garantía registradas para mostrar",
			"warranty.form"		=> "Formulario de garantía",
			"warranty.update"	=> "Actualizar garantía",
			"warranty.manager"	=> "Gestionar garantias",
			"warranty.register"	=> "Registrar garantía",
			"warranty.search"	=> "Buscar garantía",

			"words.admin"		=> "Administrador",
			"words.add"			=> "Agregar",
			"words.account"		=> "Cuenta",
			"words.access"		=> "Accesos",
			"words.authorize"	=> "Permisos",
			"words.address"		=> "Dirección",
			"words.domain"		=> "Dominio",
			"words.to-access"	=> "Acceder",
			"words.actions"		=> "Acciones",
			"words.activate"	=> "Activar",
			"words.back"		=> "Regresar",
			"words.contacts"	=> "Contactos",
			"words.config"		=> "Configuración",
			"words.companies"	=> "Empresas",
			"words.corporations"	=> "Corporaciones",
			"words.cellphone"		=> "Teléfono Celular",
			"words.customer"	=> "Cliente",
			"words.client"		=> "Cliente",
			"words.clients"		=> "Clientes",
			"words.close"     	=> "Cerrar",
			"words.credentials"	=> "Credenciales",
			"words.create"		=> "Crear",
			"words.date"		=> "Fecha",
			"words.dealer"		=> "Dealer",			
			"words.dealers"		=> "Dealers",
			"words.delete"		=> "Eliminar",
			"words.description"	=> "Descripción",
			"words.edit"		=> "Editar",
			"words.email"     	=> "Correo Electrónico",
			"words.entity"		=> "Entidad",
			"words.entities"	=> "Entidades",
			"words.form"		=> "Formulario",
			"words.finder"		=> "Buscar",
			"words.firstname"	=> "Nombre",
			"words.functions"	=> "Funciones",
			"words.fullname"	=> "Nombre completo",
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
			"words.membership"	=> "Membresía",
			"words.name"		=> "Nombre",
			"words.new"			=> "Nuevo",
			"words.organization"	=> "Organización",
			"words.organizations"	=> "Organizaciones",
			"words.phone"		=> "Teléfono",
			"words.password"  	=> "Contraseña",
			"words.pwd"  		=> "Contraseña",
			"words.rpwd"		=> "Confirmar contraseña",
			"words.public"		=> "Público",
			"words.publicname"	=> "Nombre publico",
			"words.private"		=> "Privado",
			"words.profile"		=> "Perfil",
			"words.rols"		=> "Funciones",
			"words.receptionist" => "Recepcionista",
			"words.remove"		=> "Remover",		
			"words.rnc"			=> "RNC",
			"words.reference"	=> "Referencia",
			"words.register"	=> "Registrar",
			"words.retrieve"  	=> "Recuperar",
			"words.remember"  	=> "Recuerda",
			"words.user"      	=> "Usuario",
			"words.users"      	=> "Usuarios",
			"words.update"		=> "Actualizar",
			"words.upload"		=> "Subir",
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
			"words.see"			=> "Ver",
			"words.search"		=> "Buscar",

			"works.group"		=> "Grupo de trabajo",

			"send.edit-password"	=> "Enviar cambio de contraseña.",
			"search.users"			=> "Buscar usuarios",
			"search.empty"			=> "Búsqueda sin resultados",
			"search.zone"			=> "Buscar zona o sector",
			"send.membership"		=> "Enviar membresía",

			"success.delete" => "",
			"seller.membership.validate.bad" => "Solicitud ",

			'validation.email' => 'El campo :attribute debe ser una dirección de correo válida.',
			'validation.required'  => 'El campo :attribute es obligatorio.',
			'validation.unique'    => 'El valor del campo :attribute ya está en uso.',

    	];
	}
}