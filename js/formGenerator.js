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