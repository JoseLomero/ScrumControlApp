newProject(tipoUsuario);

/**
 * Permite saber qué tipo de usuario se ha logeado
 * @param {number} user Esto dice el permiso que tiene el usuario logeado 
 */
function newProject(user) {
	if (user == 2) {
		var parent = document.querySelector(".Project-table");
		addElement(parent, "a", "Add Project", ["onclick=showForm();", "name=addProject", "class=btn showerForm"])
	}
}

/**
 * Funcion que creará el proyecto pasando los parametros indicados al php
 * Finalmente destruirá el formulario entero y volverá a activar el formulario
 */
function createProject() {
	enableButton("showerForm");
}