/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( elements ) {
  elements.button.style.border = 'rgb(127, 127, 127) solid thin';
  elements.form.style.display  = 'flex';
}

function expandResultArea() {
  const element = document.getElementById( 'sectionResultArea' );
  if ( element != null ) {
    element.style.height = '14.0rem';
  }
}

function hideCodecTiles( elements ) {
  elements.button.style.border = 'hidden';
  elements.form.style.display  = 'none';
}

function callEachCodec() {
  const processType = sessionStorage.getItem( 'processType' );

  const elementsBase64 = {
    button: document.getElementById( 'buttonProcessBase64' ),
    form:   document.getElementById( 'formBase64Codec' )
  }
  const elementsHash = {
    button: document.getElementById( 'buttonProcessHash' ),
    form:   document.getElementById( 'formHashGenerator' )
  }
  const elementsUuencode = {
    button: document.getElementById( 'buttonProcessUuencode' ),
    form:   document.getElementById( 'formUuencodeCodec' )
  }

  switch ( processType ) {
    case 'base64':
      dispalyCodecTiles( elementsBase64 );
      hideCodecTiles( elementsHash );
      hideCodecTiles( elementsUuencode );
      break;
    case 'hash':
      dispalyCodecTiles( elementsHash );
      hideCodecTiles( elementsBase64 );
      hideCodecTiles( elementsUuencode );
      break;
    case 'uuencode':
      dispalyCodecTiles( elementsUuencode );
      hideCodecTiles( elementsBase64 );
      hideCodecTiles( elementsHash );
      break;
    default:
      dispalyCodecTiles( elementsBase64 );
      hideCodecTiles( elementsHash );
      hideCodecTiles( elementsUuencode );
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