newProject(tipoUsuario);

/**
 * Crea un elemento hijo y se lo añade al padre que se le pasa. Se le puede añadir texto y atributos
 * @param {HTMLCollection} parent Padre en el cual se creará el elemento
 * @param {HTMLCollection} child Tipo de elemento que queremos crear
 * @param {Text} text Texto que se le añadirá al elemento creado
 * @param {attributes} attributes Atributos que se añadirán a nuestro elemento
 */
function addElement(parent, child, text, attributes) {
	var childElement = document.createElement(child);
	if (text != undefined) {
		var contenido = document.createTextNode(text);
		childElement.appendChild(contenido);
	}

	if (attributes != undefined && attributes instanceof Array) {
		for (var i = 0; i < attributes.length; i++) {
			var attrName = attributes[i].split("=")[0];
			var attrValue = attributes[i].split("=")[1];
			childElement.setAttribute(attrName, attrValue);
		}
	}
	parent.appendChild(childElement);
	return childElement;
}

/**
 * Añade un salto de linea
 * @param {HTMLCollection} parent se le pasa un elemento y añade un salto de linea
 */
function br(parent) {
	var br = addElement(parent, "br", undefined, undefined);
}


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
 * Desactiva un boton
 * @param {class} name Le pasamos la clase del boton para localizarlo y lo desactiva
 */
function disableButton(name) {
	var element = document.getElementsByClassName(name)[0];
	element.classList.add("disabled");
}

/**
 * Activa un boton desactivado
 * @param {class} name Le pasamos la clase del boton para localizarlo y lo activa
 */
function enableButton(name) {
	var element = document.getElementsByClassName(name)[0];
	element.classList.remove("disabled");
}


/**
 * Funcion que creará el proyecto pasando los parametros indicados al php
 * Finalmente destruirá el formulario entero y volverá a activar el formulario
 */
function createProject() {
	enableButton("showerForm");
}