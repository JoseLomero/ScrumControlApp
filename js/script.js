newProject(tipoUsuario);

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

function showForm(){
	document.querySelector("[name='addProject']").disabled = true;
	document.querySelector(".new-Project-box").style.display = "block";
	var parent = document.querySelector(".new-Project-box");
	var form = addElement(parent,"form",undefined,["action=insert.php","method=post","id=createProject"]);
	var div = addElement(form,"div",undefined,["class=card-content container"]);
	addElement(div,"span","Añadir nuevo Proyecto",["class=card-title"]);
	var divrow = addElement(div,"div",undefined,["class=row"]);
	
	createText(divrow,"Nombre del Proyecto: ","Name");
	createText(divrow,"Descripción del Proyecto: ","descripcion");

	createSelect(divrow,"Scrum Master del Proyecto: ","scrumMaster");
	createSelect(divrow,"Product Owner del Proyecto: ","productOwner");
	createGroup(divrow,"Grupos del Proyecto: ","grupos");

	addElement(form,"div","Crear",["class=button","onclick=checkNulls()"]);
}

function createText(parent,labelText,name){
	var divcol = addElement(parent, "div", undefined, ["class=input-field col s12"]);
	addElement(divcol,"label",labelText,["for="+name]);
	addElement(divcol,"input",undefined,["type=text","name="+name]);
}

function createSelect(parent,labelText,name){
	var divcol = addElement(parent, "div", undefined, ["class=col s12"]);
	addElement(divcol,"label",labelText,undefined);
	addElement(divcol,"br",labelText,undefined);
	var select = addElement(divcol,"select",undefined,["name="+name]);
	addElement(select,"option",undefined,["selected=selected","disabled=true","value="]).text = "Selecciona una opción";
	createDropDown(select,name);
	initSelect();
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

function createGroup(parent,labelText,name){
	var divcol = addElement(parent, "div", undefined, ["class=col s12"]);
	addElement(divcol,"label",labelText,undefined);
	addElement(divcol,"br",labelText,undefined);
	var select = addElement(divcol,"select",undefined,["name="+name+"[]","multiple=true"]);
	addElement(select,"option",undefined,["disabled=true","value="]).text = "Selecciona una opción";
	insertGroup(select,name);
	initSelect();
}
function insertGroup(select){
	grupos.forEach(function(element){
		var option = addElement(select,"option");
		option.text = element.name;
		option.value = element.id;
		select.add(option);
	});
}