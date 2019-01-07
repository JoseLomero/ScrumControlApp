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
 * Función que crea un formulario para crear nuevos proyectos
 */
function showCreateForm() {
	disableButton("showerForm");
	document.querySelector(".new-Project-box").style.display = "block";
	var parent = document.querySelector(".new-Project-box");
	var form = addElement(parent,"form", undefined, ["action=proyectos.php","method=post","id=createProject"]);
	var div = addElement(form,"div",undefined,undefined);

	// Titulo del formulario
	addElement(div,"span","AÑADIR PROYECTO", ["class=card-title"]);
	var divrow = addElement(div,"div",undefined,undefined);

	// Creamos el campo del nombre del proyecto
	addElement(divrow,"span","Nombre del Proyecto: ",undefined);
	var inputNom = addElement(divrow,"input",undefined,["name=nom"]);

	// Creamos el campo del formulario -descripcion-
	var div = addElement(form,"div", undefined, undefined);
	var descr = addElement(div,"span","Descripción: ",undefined);
	var inputDescr = addElement(descr,"input",undefined,["name=descr"]);
	
	// Creamos los ComboBox
	crearComboBox(form, "Elige Scrum Master: ", nombresSM, ["name=scrumMaster"]);
	crearComboBox(form, "Elige Product Owner: ", nombresPO, ["name=productOwner"]);
	crearComboBox(form, "Elige el Grupo de Developers: ", nombresGD, ["name=developers"]);

	// Creamos el boton que creará el proyecto y destruirá el formulario
	addElement(parent, "a", "Crear Proyecto", ["onclick=createProject();", "name=createProject", "class=btn destroyForm"])
}

/**
 * Checkea si es posible crear el formulario, y de ser el caso lo crea. Si no, saltará un error
 */
function createForm() {
	if (!checkGroup(nombresSM)) {
		createErrorWindow("No hay Scrum Master disponible!");
	} else if (!checkGroup(nombresPO)) {
		createErrorWindow("No hay Product Owner disponible!");	
	} else if (!checkGroup(nombresGD)) {
		createErrorWindow("No hay Developers disponibles!");
	} else {
		// Creamos el formulario
		showCreateForm();
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
}