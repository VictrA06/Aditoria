const tarjeta = document.querySelector('#tarjeta'),
numeroTarjeta = document.querySelector('#tarjeta .numero'),
nombreTarjeta = document.querySelector('#tarjeta .nombre');

tarjeta.addEventListener('click',() => {
    tarjeta.classList.toggle('active');
});

formulario.inputNumero.addEventListener('keyup',(e) => {
    let valorInput = e.target.value;

    formulario.inputNumero.value = valorInput
    .replace(/\s/g, '')
    .replace(/\D/g, '')
    .trim();

    numeroTarjeta.textContent = valorInput;

    if(valorInput == ''){
        numeroTarjeta.textContent = '########'
    }
});

formulario.inputNombre.addEventListener('keyup',(e) => {
    let valorInput = e.target.value;

    formulario.inputNombre.value = valorInput
    .replace(/[0-9]/g, '')
    .trim();

    nombreTarjeta.textContent = valorInput;

    if(valorInput == ''){
        nombreTarjeta.textContent = 'Nombre Apellido'
    }
});
