/**
 * module file: _script.js
 * description: 
 */

/** functions */
function dispalyCodecTiles( form:HTMLElement ):void {
  form.style.display = 'flex';
}

function hideCodecTiles( form:HTMLElement ):void {
  form.style.display = 'none';
}

function exceptionLog( identifier:any ):void {
  console.log( identifier.name + ' : ' + identifier.message );
}

function callCodec( processType:string ):void {
  const base64:codecSelector = {
    form: document.getElementById( 'formBase64Codec' )
  }
  const hash:codecSelector = {
    form: document.getElementById( 'formHashGenerator' )
  }
  const uuencode:codecSelector = {
    form: document.getElementById( 'formUuencodeCodec' )
  }

  switch ( processType ) {
    case 'base64':
      dispalyCodecTiles( base64.form );
      hideCodecTiles( hash.form );
      hideCodecTiles( uuencode.form );
      break;
    case 'hash':
      dispalyCodecTiles( hash.form );
      hideCodecTiles( base64.form );
      hideCodecTiles( uuencode.form );
      break;
    case 'uuencode':
      dispalyCodecTiles( uuencode.form );
      hideCodecTiles( base64.form );
      hideCodecTiles( hash.form );
      break;
    default:
      dispalyCodecTiles( base64.form );
      hideCodecTiles( hash.form );
      hideCodecTiles( uuencode.form );
      break;
  }
}

function selectorBehavior( eventTarget:EventTarget, processType:string ):void {
  if ( eventTarget instanceof HTMLElement) {
    const element:HTMLElement = eventTarget;

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

  /** selector initirazetion*/
  window.addEventListener( 'load', () => {
    const processType:string     = sessionStorage.getItem( 'processType' );
    const selector:HTMLElement   = document.getElementById( 'divProcessSelector' );
    try {
      const input:HTMLInputElement = selector.querySelector( 'input[value="' + processType + '"]' );
      input.checked = true;
    } catch ( identifier:any ) {
      const input:HTMLInputElement = selector.querySelector( 'input[value="base64"]' );
      input.checked = true;
      exceptionLog( identifier );
    }
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