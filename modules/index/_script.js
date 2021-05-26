/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( styleButton, styleForm ) {
  styleButton.border = 'rgb(127, 127, 127) solid thin';
  styleForm.display  = 'flex';
}

function expandResultArea() {
  const element = document.getElementById( 'sectionResultArea' );
  if ( element != null ) {
    element.style.height = '14.0rem';
  }
}

function hideCodecTiles( styleButton, styleForm ) {
  styleButton.border = 'hidden';
  styleForm.display  = 'none';
}

function callEachCodec() {
  const processType = sessionStorage.getItem( 'processType' );

  const styleBase64 = {
    button: document.getElementById( 'buttonProcessBase64' ).style,
    form:   document.getElementById( 'formBase64Codec' ).style
  }
  const styleHash = {
    button: document.getElementById( 'buttonProcessHash' ).style,
    form:   document.getElementById( 'formHashGenerator' ).style
  }
  const styleUuencode = {
    button: document.getElementById( 'buttonProcessUuencode' ).style,
    form:   document.getElementById( 'formUuencodeCodec' ).style
  }

  switch ( processType ) {
    case 'base64':
      dispalyCodecTiles( styleBase64.button, styleBase64.form );
      hideCodecTiles( styleHash.button, styleHash.form );
      hideCodecTiles( styleUuencode.button, styleUuencode.form );
      break;
    case 'hash':
      dispalyCodecTiles( styleHash.button, styleHash.form );
      hideCodecTiles( styleBase64.button, styleBase64.form );
      hideCodecTiles( styleUuencode.button, styleUuencode.form );
      break;
    case 'uuencode':
      dispalyCodecTiles( styleUuencode.button, styleUuencode.form );
      hideCodecTiles( styleBase64.button, styleBase64.form );
      hideCodecTiles( styleHash.button, styleHash.form );
      break;
    default:
      dispalyCodecTiles( styleBase64.button, styleBase64.form );
      hideCodecTiles( styleHash.button, styleHash.form );
      hideCodecTiles( styleUuencode.button, styleUuencode.form );
      break;
  } 
}

/** actions when click elements */
document.getElementById( 'buttonProcessBase64' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'base64' );
  } catch ( error ) {
    console.log( error );
  }
  callEachCodec();
}, false );

document.getElementById( 'buttonProcessHash' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'hash' );
  } catch ( error ) {
    console.log( error );
  }
  callEachCodec();
}, false );

document.getElementById( 'buttonProcessUuencode' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'uuencode' );
  } catch ( error ) {
    console.log( error );
  }
  callEachCodec();
}, false );

/** for css transition of result area */
window.addEventListener( 'load', expandResultArea );

/** initialization of expression */
window.addEventListener( 'load', callEachCodec );

/** a module file is end up here. : index/_script.js */