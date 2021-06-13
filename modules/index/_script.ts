/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( button:HTMLElement, form:HTMLElement ):void {
  form.style.display  = 'flex';
}

function hideCodecTiles( button:HTMLElement, form:HTMLElement ):void {
  button.style.background = 'none';
  form.style.display      = 'none';
}

function exceptionLog( identifier:any ):void {
  console.log( identifier.name + ' : ' + identifier.message );
}

function callCodec( processType:string ):void {
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
      dispalyCodecTiles( base64.button, base64.form );
      hideCodecTiles( hash.button, hash.form );
      hideCodecTiles( uuencode.button, uuencode.form );
      break;
    case 'hash':
      dispalyCodecTiles( hash.button, hash.form );
      hideCodecTiles( base64.button, base64.form );
      hideCodecTiles( uuencode.button, uuencode.form );
      break;
    case 'uuencode':
      dispalyCodecTiles( uuencode.button, uuencode.form );
      hideCodecTiles( base64.button, base64.form );
      hideCodecTiles( hash.button, hash.form );
      break;
    default:
      dispalyCodecTiles( base64.button, base64.form );
      hideCodecTiles( hash.button, hash.form );
      hideCodecTiles( uuencode.button, uuencode.form );
      break;
  } 
}

function selectorBehavior( eventTarget:EventTarget, processType:string ) {
  if ( eventTarget instanceof HTMLElement) {
    const element:HTMLElement = eventTarget;
    
    element.style.background = 'rgb(239, 239, 239)';

    element.addEventListener( 'mouseout', () => {
      element.style.background = 'none';
    });

    element.addEventListener( 'click', () => {
      try {
        sessionStorage.setItem( 'processType', processType );
        callCodec( processType );
      } catch ( identifier:any ) { 
        exceptionLog( identifier );
      }
    }, false );
  }
}

function loadEvents() {
  /** for css transition of result area */
  window.addEventListener( 'load', () => {
    const element:HTMLElement = document.getElementById( 'sectionResultArea' );
    if ( element != null ) {
      element.style.height = '14.0rem';
    }
  }, false);

  /** initialization of expression */
  window.addEventListener( 'load', () => {
    const processType:string = sessionStorage.getItem( 'processType' );
    callCodec( processType );
  });
}

function mouseoverEvents() {
  document.getElementById( 'buttonProcessBase64' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'base64' ), false );
  document.getElementById( 'buttonProcessHash' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'hash' ), false );
  document.getElementById( 'buttonProcessUuencode' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'uuencode' ), false );
}

loadEvents();
mouseoverEvents();

/** a module file is end up here. : index/_script.js */