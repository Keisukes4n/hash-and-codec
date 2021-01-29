/**
 * _main.js
 */

const elementDivHashGeneration = document.getElementById( 'divHashGeneration' );
const elementDivBase64Codec    = document.getElementById( 'divBase64Codec' );

const elementDivToolsHash = document.getElementById( 'divToolsHash' );
const elementDivToolsBase64 = document.getElementById( 'divToolsBase64' );

elementDivToolsHash.addEventListener( 'click', () => {
  elementDivBase64Codec.style.display = 'none';
  elementDivHashGeneration.style.display = 'block';
}, false );

elementDivToolsBase64.addEventListener( 'click', () => {
  elementDivBase64Codec.style.display = 'block';
  elementDivHashGeneration.style.display = 'none';
}, false );