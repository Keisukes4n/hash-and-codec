/**
 * module file: _script.js
 * description:
 */
/** functions */
function dispalyCodecTiles(button, form) {
    form.style.display = 'flex';
}
function hideCodecTiles(button, form) {
    button.style.background = 'none';
    form.style.display = 'none';
}
function exceptionLog(identifier) {
    console.log(identifier.name + ' : ' + identifier.message);
}
function callCodec(processType) {
    var base64 = {
        button: document.getElementById('buttonProcessBase64'),
        form: document.getElementById('formBase64Codec')
    };
    var hash = {
        button: document.getElementById('buttonProcessHash'),
        form: document.getElementById('formHashGenerator')
    };
    var uuencode = {
        button: document.getElementById('buttonProcessUuencode'),
        form: document.getElementById('formUuencodeCodec')
    };
    switch (processType) {
        case 'base64':
            dispalyCodecTiles(base64.button, base64.form);
            hideCodecTiles(hash.button, hash.form);
            hideCodecTiles(uuencode.button, uuencode.form);
            break;
        case 'hash':
            dispalyCodecTiles(hash.button, hash.form);
            hideCodecTiles(base64.button, base64.form);
            hideCodecTiles(uuencode.button, uuencode.form);
            break;
        case 'uuencode':
            dispalyCodecTiles(uuencode.button, uuencode.form);
            hideCodecTiles(base64.button, base64.form);
            hideCodecTiles(hash.button, hash.form);
            break;
        default:
            dispalyCodecTiles(base64.button, base64.form);
            hideCodecTiles(hash.button, hash.form);
            hideCodecTiles(uuencode.button, uuencode.form);
            break;
    }
}
function selectorBehavior(eventTarget, processType) {
    if (eventTarget instanceof HTMLElement) {
        var element_1 = eventTarget;
        element_1.style.background = 'rgb(239, 239, 239)';
        element_1.addEventListener('mouseout', function () {
            element_1.style.background = 'none';
        });
        element_1.addEventListener('click', function () {
            try {
                sessionStorage.setItem('processType', processType);
                callCodec(processType);
            }
            catch (identifier) {
                exceptionLog(identifier);
            }
        }, false);
    }
}
function loadEvents() {
    /** for css transition of result area */
    window.addEventListener('load', function () {
        var element = document.getElementById('sectionResultArea');
        if (element != null) {
            element.style.height = '14.0rem';
        }
    }, false);
    /** initialization of expression */
    window.addEventListener('load', function () {
        var processType = sessionStorage.getItem('processType');
        callCodec(processType);
    });
}
function mouseoverEvents() {
    document.getElementById('buttonProcessBase64')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'base64'); }, false);
    document.getElementById('buttonProcessHash')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'hash'); }, false);
    document.getElementById('buttonProcessUuencode')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'uuencode'); }, false);
}
loadEvents();
mouseoverEvents();
/** a module file is end up here. : index/_script.js */ 
