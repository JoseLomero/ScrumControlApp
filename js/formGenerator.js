/**
 * Crea las opciones dentro del select que se le pase. Si la array no tiene id, le asigna uno automaticamente
 * @param {object} select Select al que se le añadirán las opciones 	
 * @param {array} arrayCombo Array con objetos que pasan un nombre e id
 */
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
 * @param {attributes} attributes Atributos que se añadirán a nuestro elemento
 */
function crearComboBox(form, eleccion, nombres, attributes) {
	var div = addElement(form,"div", undefined, undefined);
	addElement(div,"span", eleccion,undefined);
	var select = addElement(div,"select",undefined,attributes);
	addElement(select,"option",undefined,["selected=selected","disabled=true","value="]).text = "Selecciona una opción";
	dropDownGenerator(select, nombres);
	$(select).formSelect();
}