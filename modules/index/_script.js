"use strict";
/**
 * module file: _script.js
 * description:
 */
class codecSwitch {
    constructor() {
        var _a;
        this.codecForms = {
            base64: document.getElementById('formBase64Codec'),
            hash: document.getElementById('formHashGenerator'),
            uuencode: document.getElementById('formUuencodeCodec')
        };
        this.sectionResult = document.getElementById('sectionResultArea');
        this.selectorDiv = document.getElementById('divProcessSelector');
        this.selectorLabels = {
            base64: document.getElementById('labelProcessBase64'),
            hash: document.getElementById('labelProcessHash'),
            uuencode: document.getElementById('labelProcessUuencode')
        };
        this.targetForm = document.getElementById('formBase64Codec');
        this.targetProcess = (_a = sessionStorage.getItem('processType')) !== null && _a !== void 0 ? _a : 'base64';
    }
    prepareClickEvents() {
        Object.values(this.selectorLabels).forEach((label) => {
            if (label instanceof HTMLElement) {
                label.addEventListener('click', () => {
                    var _a, _b;
                    const codecName = (_b = (_a = label.querySelector('input')) === null || _a === void 0 ? void 0 : _a.value) !== null && _b !== void 0 ? _b : 'base64';
                    try {
                        sessionStorage.setItem('processType', codecName);
                    }
                    catch (identifier) {
                        console.log(identifier.message);
                    }
                    this.hideAllCodecForm();
                    this.displayCodecForm(codecName);
                }, false);
            }
        });
    }
    prepareLoadEvents() {
        window.addEventListener('load', () => {
            if (this.selectorDiv instanceof HTMLElement) {
                const input = this.selectorDiv
                    .querySelector('input[value="' + this.targetProcess + '"]');
                if (input instanceof HTMLInputElement) {
                    input.checked = true;
                }
            }
            if (this.sectionResult instanceof HTMLElement) {
                this.sectionResult.style.height = '14.0rem';
            }
            this.hideAllCodecForm();
            this.displayCodecForm(this.targetProcess);
        }, false);
    }
    hideAllCodecForm() {
        Object.values(this.codecForms).forEach((form) => {
            if (form instanceof HTMLElement) {
                form.style.display = 'none';
            }
        });
    }
    displayCodecForm(codecName) {
        switch (codecName) {
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
        if (this.targetForm instanceof HTMLElement) {
            this.targetForm.style.display = 'flex';
        }
    }
}
const codecSwitchInstance = new codecSwitch;
codecSwitchInstance.prepareClickEvents();
codecSwitchInstance.prepareLoadEvents();
/** a module file is end up here. : index/_script.js */ 
