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
 * Función que crea un formulario para crear nuevos proyectos
 */
function showForm() {
	disableButton("showerForm");
	document.querySelector("[name='addProject']").disabled = true;
	document.querySelector(".new-Project-box").style.display = "block";
	var parent = document.querySelector(".new-Project-box");
	var form = addElement(parent,"form", undefined, ["action=insert.php","method=post","id=createProject"]);
	var div = addElement(form,"div",undefined,undefined);

	// Titulo del formulario
	addElement(div,"span","AÑADIR PROYECTO", ["class=card-title"]);
	var divrow = addElement(div,"div",undefined,undefined);

	// Creamos el campo del nombre del proyecto
	addElement(divrow,"span","Nombre del Proyecto: ",undefined);
	var inputNom = addElement(divrow,"input",undefined,undefined);

	// Creamos el campo del formulario -descripcion-
	var div = addElement(form,"div", undefined, undefined);
	var descr = addElement(div,"span","Descripción: ",undefined);
	var inputDescr = addElement(descr,"input",undefined,undefined);
	
	// Creamos los ComboBox
	crearComboBox(form, "Elige Scrum Master: ", nombresSM);
	crearComboBox(form, "Elige Product Owner: ", nombresPO);
	crearComboBox(form, "Elige el Grupo de Developers: ", nombresGD);

	// Creamos el boton que creará el proyecto y destruirá el formulario
	addElement(parent, "a", "Crear Proyecto", ["onclick=createProject();", "name=createProject", "class=btn destroyForm"])
}


function dropDownGenerator(select, arrayCombo) {
	var opt = null;
	if (arrayCombo[0] == undefined) {
		return false;
	}

	for (i = 0; i < arrayCombo.length; i++) {
		opt = document.createElement('option');
		
		if (arrayCombo[i].id == undefined) {
			opt.value = i+1;
		} else {
			opt.value = arrayCombo[i].id;
		}

		opt.innerHTML = arrayCombo[i].name;
		select.appendChild(opt);
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

/**
 * Añade a un formulario un combobox generado dinamicamente, pasandole de qué es el formulario y las opciones que contendrá
 * @param {object} form Formulario al que vas a agregar el combobox
 * @param {text} eleccion Indicador en una string que indicará qué seleccionará
 * @param {array} nombres Array con los nombres para insertar en el comboBox 
 */
function crearComboBox(form, eleccion, nombres) {
	var div = addElement(form,"div", undefined, undefined);
	addElement(div,"span", eleccion,undefined);
	var select = addElement(div,"select",undefined,undefined);
	addElement(select,"option",undefined,["selected=selected","disabled=true","value="]).text = "Selecciona una opción";
	dropDownGenerator(select, nombres);
	$(select).formSelect();
}