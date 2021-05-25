/**
 * module file: _script.js
 * description: 
 */

/** functions */
function displayBase64() {
  elementButtonProcessBase64.style.border   = 'rgb(127, 127, 127) solid thin';
  elementButtonProcessHash.style.border     = 'hidden';
  elementButtonProcessUuencode.style.border = 'hidden';
  elementFormBase64Codec.style.display      = 'flex';
  elementFormHashGeneration.style.display   = 'none';
  elementFormUuencodeCodec.style.display    = 'none';
  try {
    sessionStorage.setItem( 'processType', 'base64' );
  } catch ( error ) {
    console.log( error );
  }
}

function displayHash() {
  elementButtonProcessBase64.style.border   = 'hidden';
  elementButtonProcessHash.style.border     = 'rgb(127, 127, 127) solid thin';
  elementButtonProcessUuencode.style.border = 'hidden';
  elementFormBase64Codec.style.display      = 'none';
  elementFormHashGeneration.style.display   = 'flex';
  elementFormUuencodeCodec.style.display    = 'none';
  try {
    sessionStorage.setItem( 'processType', 'hash' );
  } catch ( error ) {
    console.log( error );
  }
}

function displayUuencode() {
  elementButtonProcessBase64.style.border   = 'hidden';
  elementButtonProcessHash.style.border     = 'hidden';
  elementButtonProcessUuencode.style.border = 'rgb(127, 127, 127) solid thin';
  elementFormBase64Codec.style.display      = 'none';
  elementFormHashGeneration.style.display   = 'none';
  elementFormUuencodeCodec.style.display    = 'flex';
  try {
    sessionStorage.setItem( 'processType', 'uuencode' );
  } catch ( error ) {
    console.log( error );
  }
}

/** actions when click elements */
const elementButtonProcessBase64   = document.getElementById( 'buttonProcessBase64' );
const elementButtonProcessHash     = document.getElementById( 'buttonProcessHash' );
const elementButtonProcessUuencode = document.getElementById( 'buttonProcessUuencode' );
const elementFormBase64Codec       = document.getElementById( 'formBase64Codec' );
const elementFormHashGeneration    = document.getElementById( 'formHashGeneration' );
const elementFormUuencodeCodec     = document.getElementById( 'formUuencodeCodec' );

elementButtonProcessHash.addEventListener( 'click', () => {
  displayHash();
});
elementButtonProcessBase64.addEventListener( 'click', () => {
  displayBase64();
});
elementButtonProcessUuencode.addEventListener( 'click', () => {
  displayUuencode();
});

/** for css transition of result area */
window.addEventListener( 'load', () => {
  const elementSectionResultArea = document.getElementById( 'sectionResultArea' );
  elementSectionResultArea.style.height = '14.0rem';
});

const processType = sessionStorage.getItem( 'processType' );
switch ( processType ) {
  case 'base64':
    displayBase64();
    break;
  case 'hash':
    displayHash();
    break;
  case 'uuencode':
    displayUuencode();
    break;
  default:
    displayBase64();
    break;
}

/** A module file is end up here. : index/_script.js */