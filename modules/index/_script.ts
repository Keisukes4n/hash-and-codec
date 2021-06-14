/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( label:HTMLElement, form:HTMLElement ):void {
  //label.style.background = 'rgb(239, 239 ,239)';
  form.style.display      = 'flex';
}

function hideCodecTiles( label:HTMLElement, form:HTMLElement ):void {
  //label.style.background = 'rgb(255,255,255)';
  form.style.display      = 'none';
}

function exceptionLog( identifier:any ):void {
  console.log( identifier.name + ' : ' + identifier.message );
}

function callCodec( processType:string ):void {
  const base64:codecSelector = {
    label: document.getElementById( 'labelProcessBase64' ),
    form:   document.getElementById( 'formBase64Codec' )
  }
  const hash:codecSelector = {
    label: document.getElementById( 'labelProcessHash' ),
    form:   document.getElementById( 'formHashGenerator' )
  }
  const uuencode:codecSelector = {
    label: document.getElementById( 'labelProcessUuencode' ),
    form:   document.getElementById( 'formUuencodeCodec' )
  }

  switch ( processType ) {
    case 'base64':
      dispalyCodecTiles( base64.label, base64.form );
      hideCodecTiles( hash.label, hash.form );
      hideCodecTiles( uuencode.label, uuencode.form );
      break;
    case 'hash':
      dispalyCodecTiles( hash.label, hash.form );
      hideCodecTiles( base64.label, base64.form );
      hideCodecTiles( uuencode.label, uuencode.form );
      break;
    case 'uuencode':
      dispalyCodecTiles( uuencode.label, uuencode.form );
      hideCodecTiles( base64.label, base64.form );
      hideCodecTiles( hash.label, hash.form );
      break;
    default:
      dispalyCodecTiles( base64.label, base64.form );
      hideCodecTiles( hash.label, hash.form );
      hideCodecTiles( uuencode.label, uuencode.form );
      break;
  }
}

function selectorBehavior( eventTarget:EventTarget, processType:string ):void {
  if ( eventTarget instanceof HTMLElement) {
    const element:HTMLElement = eventTarget;
    /*
    
    if ( sessionStorage.getItem( 'processType' ) != processType ) {
      element.style.background = 'rgb(223, 223, 223)';

      element.addEventListener( 'mouseout', () => {
        element.style.background = 'none';
      });
    }
    */

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
  document.getElementById( 'labelProcessBase64' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'base64' ), false );
  document.getElementById( 'labelProcessHash' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'hash' ), false );
  document.getElementById( 'labelProcessUuencode' )
    .addEventListener( 'mouseover', ( event:Event ) => selectorBehavior( event.target, 'uuencode' ), false );
}

loadEvents();
mouseoverEvents();

/** a module file is end up here. : index/_script.js */