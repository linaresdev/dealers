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

			"auth.0"				=> "Cuenta deshabilitada",
			"auth.1"				=> "Cuenta activada",
			"auth.2"				=> "Cuenta bloqueada",
			"auth.3"				=> "Cuenta enviada a legales",

			"admin.groups"			=> "Gestionar grupos",
			"admin.users"			=> "Administrar usuarios",
			"admin.slug"			=> "Admin",

			"api.new"				=> "Nueva api",

			"apps.form"				=> "Foumulario de aplicaciones",

			"bay.date"				=> "Fecha de la venta",

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
			"delete.forever"		=>"Eliminado permanente",
			"delete.successfull"	=> "Recurso eliminado correctamente",

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
			"info.warranty"		=> "Información de la garantía",

			"last.access"		=> "Último acceso",
			"load.logo"			=> "Cargar logo",

			"upload.logo"		=> "Subir logo",	
			"update.account"		=> "Actualizar cuenta",
			"update.error"			=> "Error al tratar de aucalizar los datos",
			"update.credentials"	=> "Actualizar credenciales",
			"update.logo"			=> "Actualizar logo",
			"update.rol"			=> "Actulizar permiso",
			"update.successfull" 	=> "Actualización realizada correctamente",
			"update.password"		=> "Actualizar contraseña",

			"url.base"			=> "Url base",
			"user.add"			=> "Agregar usuario",

			"user.st0.successfull"		=> "Cueta deshabilitada correctamente",
			"user.st1.successfull"		=> "Cueta activada correctamente",
			"user.st2.successfull"		=> "Cueta bloqueada correctamente",

			"user.st0.error"		=> "Error al tratar de deshabilitada la cuenta",
			"user.st1.error"		=> "Error al tratar de activar la cuenta",
			"user.st2.error"		=> "Error al tratar de bloquear la cuenta",

			"user.create"		=> "Crear usuario",
			"user.delete.successfull" => "Cuenta :account eliminada",
			"user.delete.error" => "Error al trata de liminara laCuenta :account",
			"user.delete.forever" => "Cuenta destruida",

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

			"membership.mailship"	=> "Enviar solicitud de registro por correo electrónico.",
			"membership.register.successfull"	=> "Membresía registrada correctamente",

			"membership.register.error"	=> "Ocurrió un error; No fue posible registrar su membresía",

			"new.password"				=> "Nueva contraseña",
			"new.confirm.password"		=> "Confirmar su nueva contraseña",

			"news.add.user" 			=> "Se agrego un usuario en :path",
			"news.user.remove"			=> "Se quitó el usuario de :path", 
			"news.delete.warranty"		=> "Garantía :warranty eliminda correctamente",
			"news.update.warranty" 		=> "Actualización de la garantía :warranty",
			"news.update.user"			=> "Se actualizo los datos de la cuenta :name",
			"news.register.warranty" 	=> "Registro de la garantía :warranty",
			
			"news.create.user"			=> "Se Registro la cuenta :name nueca en la base de datos",
			"news.delete.user"			=> "Cuenta eliminada de los registros",
			"news.create.org"			=> "Registro de la organización :org",
			"news.delete.org"			=> "Se elimino la organización :org",	
			"news.update.org"			=> "Actualización de la organización :org",
			"news.expire.password"		=> "Expirar contraseña",
			"news.validity.programmer"	=> "Programador de tiempo de vijencia",

			"register.date" 		=> "Fecha de registro",
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

			"retrieve.password"		=> "Recuperación de contraseña",
			"retrieve.unknown"		=> "No fui yo, Reporta",

			"report.retrieve"		=> "Reporte de recupración",

			"rol.form"					=> "Formulario de funciones",
			"rol.update.error"			=> "Error al tratar de actualizar lso permisos",
			"rol.update.successfull"	=> "Permisos actualizados correctamente", 
			"old.password"			=> "Contraseña actual",
			"organization.new"		=> "Nueva organización",
			"organization.name"		=> "Nombre de la organización",
			"organization.update"	=> "Actualizar organización",

			"password.update"				=> "Actualizar contraseña",
			"password.updated.successfull" 	=> "Contraseña actualizada",
			"password.updated.programmer" 	=> "Actualización de contraseña programada",
			"password.updated.required"		=> "Actualización de contraseña requerida",

			"password.expired.deleted"		=> "Actualización de contraseña programada desactivada",

			"password.confirm"				=> "Confirmar contraseña",
			"password.old.bad"				=> "Contraseña actual invalida",
			"password.same.bad"				=> "Contraseñas no coinciden",

			"programmer.change.password" 	=> "Programador de cambio de contraseña",

			"words.action"			=> "Acción",
			"words.actions"			=> "Acciones",
			"words.administration" 	=> "Adminstración",

			"warranty.add"			=> "Nueva garantía",
			"words.aplications"		=> "Aplicaciones",
			"warranty.empty"		=> "No existen garantía registradas para mostrar",
			"warranty.form"		=> "Formulario de garantía",
			"warranty.update"	=> "Actualizar garantía",
			"warranty.manager"	=> "Gestionar garantias",
			"warranty.register"	=> "Registrar garantía",
			"warranty.search"	=> "Buscar garantía",
			"warranty.confirmed"	=> "Garantía registrada el :date",
			"warranty.bad-confirm" => "Garantía no fue registrada, verifique los datos suministrados",

			"words.admin"		=> "Administrador",
			"words.add"			=> "Agregar",
			"words.account"		=> "Cuenta",
			"words.access"		=> "Accesos",
			"words.authorize"	=> "Permisos",
			"words.address"		=> "Dirección",
			"words.app"			=> "Aplicaciones",
			"words.domain"		=> "Dominio",
			"words.to-access"	=> "Acceder",
			"words.actions"		=> "Acciones",
			"words.activate"	=> "Activar",
			"words.activated"	=> "{1} Activos|{2} Activas",
			"words.back"		=> "Regresar",
			'words.block'		=> "Bloquear",
			"words.contacts"	=> "Contactos",
			"words.config"		=> "Configuración",
			"words.connect"		=> "Conectar",
			"words.companies"	=> "Empresas",
			"words.comment"		=> "Comentario",
			"words.corporations"	=> "Corporaciones",
			"words.controller"		=> "Controlador",
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
			"words.disable"		=> "Deshabilitar",
			"words.edit"		=> "Editar",
			"words.email"     	=> "Correo Electrónico",
			"words.entity"		=> "Entidad",
			"words.entities"	=> "Entidades",
			'words.disconnect'	=> "Desconectar",
			"words.any"			=> "Cualquiera",
			"words.form"		=> "Formulario",
			"words.finder"		=> "Buscar",
			"words.firstname"	=> "Nombre",
			'words.filter'		=> "Filtrar",
			"words.functions"	=> "Funciones",
			"words.fullname"	=> "Nombre completo",
			"words.group"		=> "Grupo",
			"words.groups"		=> "Grupos",
			"words.home"		=> "Inicio",
			'words.hour'		=> "Hora",
			"words.handler"		=> "Manejador",
			"words.icon"		=> "Icono",
			"words.inactive"	=> "{1} Inactivos|{2} Inactivas",
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
			"words.method"		=> "Método",
			"words.name"		=> "Nombre",
			"words.niv"			=> "NIV",
			"words.new"			=> "Nuevo",
			"words.organization"	=> "Organización",
			"words.organizations"	=> "Organizaciones",
			"words.path"		=> "Ruta",
			"words.phone"		=> "Teléfono",
			"words.password"  	=> "Contraseña",
			"words.pwd"  		=> "Contraseña",
			"words.rpwd"		=> "confirmar contraseña",
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
			"words.registered"	=> "Registrados",
			"words.retrieve"  	=> "Recuperar",
			"words.remember"  	=> "Recuerda",
			"words.return"		=> "Retornar",
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
			"words.time"		=> "Tiempo",

			"works.group"		=> "Grupo de trabajo",

			"send.edit-password"	=> "Enviar cambio de contraseña.",
			"send.password.reset"	=> "Enviar solicitud de actualización de contraseña",
			"search.users"			=> "Buscar usuarios",
			"search.empty"			=> "Búsqueda sin resultados",
			"search.zone"			=> "Buscar zona o sector",
			"send.membership"		=> "Enviar membresía",
			"send.retrieve"			=> "Envio de recuperación exitoso",

			"success.delete" => "",
			"seller.membership.validate.bad" => "Solicitud ",
			"seller.state.0" => "Inactiva",
			"seller.state.1" => "En proceso",
			"seller.state.2" => "Registrada",
			"seller.state.3" => "Error",

			"security.department"	=> "Departamento de seguridad",
			"security.notification"	=> "Notificación de seguridad",

			"toggle.set.0"	=> ":name desactivada correctamente",
			"toggle.set.1"	=> ":name activada correctamente",

			'validation.email' 		=> 'El campo :attribute debe ser una dirección de correo válida.',
			'validation.required'  	=> 'El campo :attribute es obligatorio.',
			'validation.unique'    	=> 'El valor del campo :attribute ya está en uso.',

			"verify.credentials"	=> "Verifique las credenciales suministradas",

    	];
	}
}