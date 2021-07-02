/**
 * module file: _script.js
 * description: 
 */

class codecSwitch {
  private codecForms:     codecForms;
  private sectionResult:  HTMLElement|null;
  private selectorDiv:    HTMLElement|null;
  private selectorLabels: selectorLables;
  private targetForm:     HTMLElement|null;
  private targetProcess:  string;

  constructor() {
    this.codecForms ={
      base64:   document.getElementById( 'formBase64Codec' ),
      hash:     document.getElementById( 'formHashGenerator' ),
      uuencode: document.getElementById( 'formUuencodeCodec' )
    }
    this.sectionResult  = document.getElementById( 'sectionResultArea' );
    this.selectorDiv    = document.getElementById( 'divProcessSelector' );
    this.selectorLabels = {
      base64:   document.getElementById( 'labelProcessBase64' ),
      hash:     document.getElementById( 'labelProcessHash' ),
      uuencode: document.getElementById( 'labelProcessUuencode' )
    };
    this.targetForm    = document.getElementById( 'formBase64Codec' );
    this.targetProcess = sessionStorage.getItem( 'processType' ) ?? 'base64';

    this.prepareClickEvents();
    this.prepareLoadEvents();
  }

  public prepareClickEvents(): void {
    Object.values( this.selectorLabels ).forEach( ( label: HTMLElement|null ) => {
      if ( label instanceof HTMLElement ) {
        label.addEventListener( 'click', () => {
          this.targetProcess = label.querySelector( 'input' )?.value ?? 'base64';
          try {
            sessionStorage.setItem( 'processType', this.targetProcess );
          } catch ( identifier: any ) {
            console.log( identifier.message );
          }
          this.hideAllCodecForm();
          this.displayCodecForm();
        }, false );
      }
    })
  }

  public prepareLoadEvents(): void {
    window.addEventListener( 'load', () => {
      if ( this.selectorDiv instanceof HTMLElement ) {
        const input: HTMLInputElement|null = this.selectorDiv
          .querySelector( 'input[value="' + this.targetProcess + '"]' );
        if ( input instanceof HTMLInputElement ) {
          input.checked = true;
        }
      }
      if ( this.sectionResult instanceof HTMLElement ) {
        this.sectionResult.style.height = '14.0rem';
      }
      this.hideAllCodecForm();
      this.displayCodecForm();
    }, false );
  }

  public hideAllCodecForm(): void {
    Object.values( this.codecForms ).forEach( ( form: HTMLElement|null) => {
      if ( form instanceof HTMLElement ) {
        form.style.display = 'none';
      }
    });
  }

  public displayCodecForm(): void {
    switch ( this.targetProcess ) {
      case 'base64':
        this.targetForm = this.codecForms.base64;
        break;
      case 'hash':
        this.targetForm = this.codecForms.hash;
        break;
      case 'uuencode':
        this.targetForm = this.codecForms.uuencode;
        break;
      default:
        this.targetForm = this.codecForms.base64;
    }
    if ( this.targetForm instanceof HTMLElement ) {
      this.targetForm.style.display = 'flex';
    }
  }
}

const codecSwitchInstance:codecSwitch = new codecSwitch;

/** a module file is end up here. : index/_script.js */