const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	dni: /^\d{8,11}$/, // 8 a 11 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	nickname: /^[a-zA-Z0-9\_\-]{4,16}$/ // 7 a 14 numeros.
}

const campos = {
	nombre: false,
	dni: false,
	correo: false,
	nickname: false
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "dni":
			validarCampo(expresiones.dni, e.target, 'dni');
			validardni2();
		break;
		case "dni2":
			validardni2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "nickname":
			validarCampo(expresiones.nickname, e.target, 'nickname');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validardni2 = () => {
	const inputdni1 = document.getElementById('dni');
	const inputdni2 = document.getElementById('dni2');

	if(inputdni1.value !== inputdni2.value){
		document.getElementById(`grupo__dni2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__dni2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__dni2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__dni2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__dni2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['dni'] = false;
	} else {
		document.getElementById(`grupo__dni2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__dni2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__dni2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__dni2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__dni2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['dni'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if(campos.nombre && campos.dni && campos.correo && campos.nickname && terminos.checked ){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});