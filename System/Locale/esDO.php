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

			"admin.slug"		=> "Admin",

			"client.address"	=> "Dirección del cliente",
			"client.contact"	=> "Información de contacto",
			'client.location'	=> "Localización",
			"client.update"		=> "Actualizar cliente",
			"client.name"		=> "Nombre del cliente",
			"client.email"		=> "Correo electrónico del cliente",
			"client.rnc"		=> "RNC del cliente",
			"client.cellphone"	=> "Numero de telefono celular del cliente",
			"client.sector"		=> "Sector",

			"filter.by"				=> "Filtrar busqueda por",
			"filter.user.fullname"	=> "Fitrar por nómbre",
			"filter.user.email"		=> "Fitrar por correo electrónico",			
			"filter.user.user"		=> "Fitrar por usuario",
			"filter.user.rnc"		=> "Fitrar por RNC",

			"form.error.exists"		=> "El campo :attribute no existe en nuestros registros",
			"form.error.required"	=> "El campo :attribute es requerido",
			"form.error.unique"		=> "La infomrción suministrada en el campo :attribute existe en nuestro registros",

			"user.create"		=> "Crear usuario",
			"user.form"			=> "Formulario de usuario",
			"user.group"		=> "Grupo de usuarios",
			"user.new"			=> "Nuevo usuario",
			"user.password"		=> "Contraseña de acceso",
			"user.passconfirm"	=> "Confirmar contraseña",
			"user.register" 	=> "Registro de usuarios",
			"user.state.0"		=> "Inactivo",
			"user.state.1"		=> "Activo",
			"user.state.2"		=> "Suspención temporal",
			"user.state.3"		=> "Bloqueado",
			"user.state.4"		=> "Eliminado",

			"last.access"	=> "Último acceso",

			"words.administration" => "Adminstración",
			"warranty.add"		=> "Nueva garantía",
			"warranty.empty"	=> "No existen garantía registradas para mostrar",
			"warranty.form"		=> "Formulario de Garantía",
			"warranty.update"	=> "Actualizar garantía",

			"words.address"		=> "Dirección",
			"words.to-access"	=> "Acceder",
			"words.actions"		=> "Acciones",
			"words.activate"	=> "Activar",
			"words.cellphone"	=> "Teléfono Celular",
			"words.client"		=> "Cliente",
			"words.clients"		=> "Clientes",
			"words.close"     	=> "Cerrar",
			"words.credentials"	=> "Credenciales",
			"words.dealer"		=> "Dealer",
			"words.delete"		=> "Eliminar",
			"words.edit"		=> "Editar",
			"words.email"     	=> "Correo Electrónico",
			"words.finder"		=> "Buscar",
			"words.firstname"	=> "Nombre",
			"words.home"		=> "Inicio",
			"words.information"	=> "Información",
			"words.last-access"	=> "Último acceso",
			"words.lastname"	=> "Apellidos",	
			"words.login"     	=> "Acceso",
			"words.mantenance"	=> "Mantenimiento",
			"words.name"		=> "Nombre",
			"words.phone"		=> "Teléfono",
			"words.password"  	=> "Contraseña",
			"words.rnc"			=> "RNC",
			"words.reference"	=> "Referencia",
			"words.register"	=> "Registrar",
			"words.retrieve"  	=> "Recuperar",
			"words.remember"  	=> "Recuerda",
			"words.user"      	=> "Usuario",
			"words.users"      	=> "Usuarios",
			"words.update"		=> "Actualizar",
			"words.sector"		=> "Sector",
			"words.send"      	=> "Enviar",
			"words.state"		=> "Estado",
			"words.warranty"	=> "Garantía",
			"words.warranties"	=> "Garantías",

    	];
	}
}