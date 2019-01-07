/**
 * Crea un mensaje de error que se le pase junto al icono correspondiente
 * @param {string} texto String que indica qué error ha sucedido
 */
function createErrorWindow(texto) {
	
	var parent = document.querySelector("#errores");
	var div = addElement(parent,"div",undefined,["class=image-error"]);
	addElement(div,"img",undefined,["src=img/exclamation.png", "class=basicError-icon"]);
	addElement(div,"span",texto,["class=error-message"]);

    document.querySelector(".window-message").style.display = "block";
	resetAnimation(parent);
	setTimer();
}

/**
 * Se le pasa el div de los errores y clona y reemplaza el objeto, reseteando la animación
 * @param {element} error Elemento que contendrá el error
 */
function resetAnimation(error) {
	var newElement = error.cloneNode(true);
	error.parentNode.replaceChild(newElement,error);
}

/**
 * Función que crea un timer que tras 10 segundos eliminará los mensajes de error y ocultará la ventana
 */
function setTimer() {
	clearTimeout(global_countTime);
	global_countTime =	setTimeout(function (){
		document.querySelector(".window-message").style.display = "none";
		var parent = document.querySelector("#errores");
		var childs = document.querySelectorAll(".image-error");
		childs.forEach(function(element){
			parent.removeChild(element);
		});
	}, 10000);
}