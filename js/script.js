/**
 * Permite saber qué tipo de usuario se ha logeado
 * @param {number} user Esto dice el permiso que tiene el usuario logeado 
 */
function newProject(user) {
	if (user == 2) {
		var parent = document.querySelector(".Project-table");
		addElement(parent, "a", "Add Project", ["onclick=createForm();", "name=addProject", "class=btn showerForm"])
	}
}

/**
 * Funcion que creará el proyecto pasando los parametros indicados al php
 * Finalmente destruirá el formulario entero y volverá a activar el formulario
 */
function createProject() {
	document.getElementById("createProject").submit();
	elementRemover("destroyForm");
	deleteForm("new-Project-box", "createProject");
	enableButton("showerForm");
}

/**
 * Comprueba si hay elementos en el grupo. De no haberlos, devuelve false
 * @param {array} groupName Array que contiene valores del grupo
 */
function checkGroup(groupName) {
	if (groupName[0] == undefined) {
		return false;
	}
	return true;
}