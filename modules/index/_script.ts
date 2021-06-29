/**
 * module file: _script.js
 * description: 
 */

class codecSwitch {
  private selector: HTMLElement|null;

  private selectorLabels: selectorLables;
  private codecForms: codecForms;

  private targetForm: HTMLElement|null;
  private targetLable: HTMLElement|null;
  private targetProcess: string;

  private initCodecType: string;

  private sectionResult: HTMLElement|null;

  constructor() {
    this.selector = document.getElementById( 'divProcessSelector' );
    
    this.codecForms ={
      base64:   document.getElementById( 'formBase64Codec' ),
      hash:     document.getElementById( 'formHashGenerator' ),
      uuencode: document.getElementById( 'formUuencodeCodec' )
    }

    this.selectorLabels = {
      base64:   document.getElementById( 'labelProcessBase64' ),
      hash:     document.getElementById( 'labelProcessHash' ),
      uuencode: document.getElementById( 'labelProcessUuencode' )
    };

    this.initCodecType = sessionStorage.getItem( 'processType' ) ?? 'base64';

    this.targetForm    = document.getElementById( 'formBase64Codec' );
    this.targetLable   = this.selectorLabels.base64;
    this.targetProcess = this.initCodecType;

    this.sectionResult = document.getElementById( 'sectionResultArea' );
  }

  public prepareClickEvents(): void {
    Object.values( this.selectorLabels ).forEach( ( label: HTMLElement|null ) => {
      label?.addEventListener( 'click', () => {
        this.targetLable   = label;
        this.targetProcess = label.querySelector( 'input' )?.value ?? 'base64';
        try {
          sessionStorage.setItem( 'processType', this.targetProcess );
        } catch ( identifier: any ) {
          console.log( identifier.message );
        }

        this.hideAllCodec();
        this.displayTargetCodec();
      }, false );
    }) // end: forEach()
  }

  public prepareLoadEvents(): void {
    window.addEventListener( 'load', () => {
      if ( this.selector instanceof HTMLElement ) {
        let input: HTMLInputElement|null;
        input = this.selector.querySelector( 'input[value="' + this.initCodecType + '"]' );
        if ( input instanceof HTMLInputElement ) {
          console.log( input);
          input.checked = true;
        }
      }

      if ( this.sectionResult instanceof HTMLElement ) {
        this.sectionResult.style.height = '14.0rem';
      }

      this.hideAllCodec();
      this.displayTargetCodec();
    }, false );
  }

  public hideAllCodec(): void {
    Object.values( this.codecForms ).forEach( ( form: HTMLElement|null) => {
      if ( form instanceof HTMLElement ) {
        form.style.display = 'none';
      }
    });
  }

  public displayTargetCodec(): void {
    console.log( this.targetProcess );
    switch ( this.targetProcess ) {
      case 'base64':
        this.targetForm = this.codecForms.base64;
        break;
      case 'hash':
        this.targetForm = this.codecForms.hash;
        break;
      case 'uuencode':
        this.targetForm = this.codecForms.uuencode;
    }
    if ( this.targetForm instanceof HTMLElement ) {
      this.targetForm.style.display = 'flex';
    }
  }
}


/** functions */
/*
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
/
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
*/

const codecSwitchInstance:codecSwitch = new codecSwitch;
codecSwitchInstance.prepareClickEvents();
codecSwitchInstance.prepareLoadEvents();

/** a module file is end up here. : index/_script.js */