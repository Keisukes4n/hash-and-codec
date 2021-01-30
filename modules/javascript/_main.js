/**
 * _main.js
 */

const elementFormHashGeneration = document.getElementById( 'formHashGeneration' );
const elementFormBase64Codec    = document.getElementById( 'formBase64Codec' );

const elementDivCTH = document.getElementById( 'divCTH' );
const elementDivCTB = document.getElementById( 'divCTB' );

elementDivCTH.addEventListener( 'click', () => {
  elementFormBase64Codec.style.display = 'none';
  elementFormHashGeneration.style.display = 'block';
}, false );

elementDivCTB.addEventListener( 'click', () => {
  elementFormBase64Codec.style.display = 'block';
  elementFormHashGeneration.style.display = 'none';
}, false );