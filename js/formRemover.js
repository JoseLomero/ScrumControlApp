/**
 * Busca el elemento padre que se le da y borra el formulario que contiene como childNode
 * @param {class} parent clase padre que contiene el formulario
 * @param {id} form id del formulario a borrar 
 */
function deleteForm(parent, form) {
    parentNode = document.querySelector("."+parent);
    matches = document.querySelector("#"+form);
    parentNode.removeChild(matches);
}