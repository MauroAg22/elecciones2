// Obtenemos la altura del header
const header = document.getElementById("miHeader");
const alturaHeader = getComputedStyle(header).height;

const footer = document.getElementById("miFooter");
const alturaFooter = getComputedStyle(footer).height;

// Asignamos la altura a la variable CSS personalizada
document.documentElement.style.setProperty('--altura-header', alturaHeader);
document.documentElement.style.setProperty('--altura-footer', alturaFooter);