newProject(tipoUsuario);
var SM = [];
/**
 * 
 * @param {number} user Esto dice el permiso que tiene el usuario logeado 
 */
function newProject(user){
	if(user == 2){
		var parent = document.querySelector(".Project-table");
		addElement(parent,"button","Add Project",["onclick=showForm();","name=addProject"])
	}
}

/*     ------------------------------------------   */

/**
 * 
 * Función que crea un formulario para crear nuevos proyectos
 * 
 */
function showForm() {
	document.querySelector("[name='addProject']").disabled = true;
	document.querySelector(".new-Project-box").style.display = "block";
	var parent = document.querySelector(".new-Project-box");
	var form = addElement(parent,"form", undefined, ["action=insert.php","method=post","id=createProject"]);
	var div = addElement(form,"div",undefined,undefined);
	addElement(div,"span","AÑADIR PROYECTO", ["class=card-title"]);
	var divrow = addElement(div,"div",undefined,undefined);

	addElement(divrow,"span","Nombre del Proyecto: ",undefined);
	var inputNom = addElement(divrow,"input",undefined,undefined);
	br(div);
	var div = addElement(form,"div", undefined, undefined);
	var descr = addElement(div,"span","Descripción: ",undefined);
	var inputDescr = addElement(descr,"input",undefined,undefined);
	var div = addElement(form,"div", undefined, undefined);
	var sm = addElement(div,"span","Elige ScrumMaster: ",undefined);
	var comboSM = addElement(sm,"select",undefined,undefined);
	addElement(comboSM,"option",undefined,["selected=selected","disabled=true","value="]).text = "Selecciona una opción";
	createDropDown(comboSM,name);
	var div = addElement(form,"div", undefined, undefined);
	var po = addElement(div,"span","Elige ProductOwner: ",undefined);
	var comboPO = addElement(po,"input",undefined,["class = select"]);
	addElement(comboPO,"option",undefined,["selected=selected","disabled=true","value="]).text = "Selecciona una opción";
	createDropDown(comboPO,name);

}

function createDropDown(select,tipoUsuario){
	personas.forEach(function(element){
		if(element.tipo == tipoUsuario){
			var option = addElement(select,"option");
			option.text = element.name;
			option.value = element.id;
			select.add(option);
		}
	});
}




/**
 * 
 * @param {HTMLCollection} parent Padre en el cual se creará el elemento
 * @param {HTMLCollection} child Tipo de elemento que queremos crear
 * @param {Text} text Texto que se le añadirá al elemento creado
 * @param {attributes} attributes Atributos que se añadirán a nuestro elemento
 */
function addElement(parent, child, text,attributes){
	var childElement = document.createElement(child);
	if(text != undefined){
		var contenido = document.createTextNode(text);
		childElement.appendChild(contenido);
	}

	if(attributes != undefined && attributes instanceof Array){
		for(var i=0;i<attributes.length;i++){
			var attrName = attributes[i].split("=")[0];
			var attrValue = attributes[i].split("=")[1];
			childElement.setAttribute(attrName,attrValue);
		}
	}
	parent.appendChild(childElement);
	return childElement;
}

/**
 * 
 * @param {HTMLCollection} parent se le pasa un elemento y añade un salto de linea
 */
function br(parent){
	var br = addElement(parent,"br",undefined,undefined);
}





function initSelect(){
	$(document).ready(function(){
    $('select').formSelect();
  });
}


var personas = [];

class Persona{
	constructor(id,name,tipo){
		this.id = id;
		this.name = name;
		this.tipo = tipo;
	}
}

var grupos = [];

class Grupo{
	constructor(id,name){
		this.id = id;
		this.name = name;
	}
}

