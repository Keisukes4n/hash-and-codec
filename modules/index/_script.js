/**
 * module file: _script.js
 * description:
 */
class codecSwitch {
    constructor() {
        var _a;
        this.selector = document.getElementById('divProcessSelector');
        this.codecForms = {
            base64: document.getElementById('formBase64Codec'),
            hash: document.getElementById('formHashGenerator'),
            uuencode: document.getElementById('formUuencodeCodec')
        };
        this.selectorLabels = {
            base64: document.getElementById('labelProcessBase64'),
            hash: document.getElementById('labelProcessHash'),
            uuencode: document.getElementById('labelProcessUuencode')
        };
        this.initCodecType = (_a = sessionStorage.getItem('processType')) !== null && _a !== void 0 ? _a : 'base64';
        this.targetForm = document.getElementById('formBase64Codec');
        this.targetLable = this.selectorLabels.base64;
        this.targetProcess = this.initCodecType;
        this.sectionResult = document.getElementById('sectionResultArea');
    }
    prepareClickEvents() {
        Object.values(this.selectorLabels).forEach((label) => {
            label === null || label === void 0 ? void 0 : label.addEventListener('click', () => {
                var _a, _b;
                this.targetLable = label;
                this.targetProcess = (_b = (_a = label.querySelector('input')) === null || _a === void 0 ? void 0 : _a.value) !== null && _b !== void 0 ? _b : 'base64';
                try {
                    sessionStorage.setItem('processType', this.targetProcess);
                }
                catch (identifier) {
                    console.log(identifier.message);
                }
                this.hideAllCodec();
                this.displayTargetCodec();
            }, false);
        }); // end: forEach()
    }
    prepareLoadEvents() {
        window.addEventListener('load', () => {
            if (this.selector instanceof HTMLElement) {
                let input;
                input = this.selector.querySelector('input[value="' + this.initCodecType + '"]');
                if (input instanceof HTMLInputElement) {
                    console.log(input);
                    input.checked = true;
                }
            }
            if (this.sectionResult instanceof HTMLElement) {
                this.sectionResult.style.height = '14.0rem';
            }
            this.hideAllCodec();
            this.displayTargetCodec();
        }, false);
    }
    hideAllCodec() {
        Object.values(this.codecForms).forEach((form) => {
            if (form instanceof HTMLElement) {
                form.style.display = 'none';
            }
        });
    }
    displayTargetCodec() {
        console.log(this.targetProcess);
        switch (this.targetProcess) {
            case 'base64':
                this.targetForm = this.codecForms.base64;
                break;
            case 'hash':
                this.targetForm = this.codecForms.hash;
                break;
            case 'uuencode':
                this.targetForm = this.codecForms.uuencode;
        }
        if (this.targetForm instanceof HTMLElement) {
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
const codecSwitchInstance = new codecSwitch;
codecSwitchInstance.prepareClickEvents();
codecSwitchInstance.prepareLoadEvents();
/** a module file is end up here. : index/_script.js */ 
