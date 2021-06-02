/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( elements:codecSelector ):void {
  elements.button.style.border = 'rgb(127, 127, 127) solid thin';
  elements.form.style.display  = 'flex';
}

function expandResultArea():void {
  const element:HTMLElement = document.getElementById( 'sectionResultArea' );
  if ( element != null ) {
    element.style.height = '14.0rem';
  }
}

function hideCodecTiles( elements:codecSelector ):void {
  elements.button.style.border = 'hidden';
  elements.form.style.display  = 'none';
}

function exceptionLog( identifier:any ):void {
  console.log( identifier.name + ' : ' + identifier.message );
}

function callEachCodec():void {
  const processType:String = sessionStorage.getItem( 'processType' );

  const base64:codecSelector = {
    button: document.getElementById( 'buttonProcessBase64' ),
    form:   document.getElementById( 'formBase64Codec' )
  }
  const hash:codecSelector = {
    button: document.getElementById( 'buttonProcessHash' ),
    form:   document.getElementById( 'formHashGenerator' )
  }
  const uuencode:codecSelector = {
    button: document.getElementById( 'buttonProcessUuencode' ),
    form:   document.getElementById( 'formUuencodeCodec' )
  }

  switch ( processType ) {
    case 'base64':
      dispalyCodecTiles( base64 );
      hideCodecTiles( hash );
      hideCodecTiles( uuencode );
      break;
    case 'hash':
      dispalyCodecTiles( hash );
      hideCodecTiles( base64 );
      hideCodecTiles( uuencode );
      break;
    case 'uuencode':
      dispalyCodecTiles( uuencode );
      hideCodecTiles( base64 );
      hideCodecTiles( hash );
      break;
    default:
      dispalyCodecTiles( base64 );
      hideCodecTiles( hash );
      hideCodecTiles( uuencode );
      break;
  } 
}

/** actions when click elements */
document.getElementById( 'buttonProcessBase64' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'base64' );
  } catch ( identifier:any ) { 
    exceptionLog( identifier );
  }
  callEachCodec();
}, false );

document.getElementById( 'buttonProcessHash' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'hash' );
  } catch ( identifier ) {
    exceptionLog( identifier );
  }
  callEachCodec();
}, false );

document.getElementById( 'buttonProcessUuencode' ).addEventListener( 'click', () => {
  try {
    sessionStorage.setItem( 'processType', 'uuencode' );
  } catch ( identifier ) {
    exceptionLog( identifier );
  }
  callEachCodec();
}, false );

/** for css transition of result area */
window.addEventListener( 'load', expandResultArea );

/** initialization of expression */
window.addEventListener( 'load', callEachCodec );

/** a module file is end up here. : index/_script.js */