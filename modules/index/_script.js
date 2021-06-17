/**
 * module file: _script.js
 * description:
 */
/** functions */
function dispalyCodecTiles(form) {
    form.style.display = 'flex';
}
function hideCodecTiles(form) {
    form.style.display = 'none';
}
function exceptionLog(identifier) {
    console.log(identifier.name + ' : ' + identifier.message);
}
function callCodec(processType) {
    var base64 = {
        form: document.getElementById('formBase64Codec')
    };
    var hash = {
        form: document.getElementById('formHashGenerator')
    };
    var uuencode = {
        form: document.getElementById('formUuencodeCodec')
    };
    switch (processType) {
        case 'base64':
            dispalyCodecTiles(base64.form);
            hideCodecTiles(hash.form);
            hideCodecTiles(uuencode.form);
            break;
        case 'hash':
            dispalyCodecTiles(hash.form);
            hideCodecTiles(base64.form);
            hideCodecTiles(uuencode.form);
            break;
        case 'uuencode':
            dispalyCodecTiles(uuencode.form);
            hideCodecTiles(base64.form);
            hideCodecTiles(hash.form);
            break;
        default:
            dispalyCodecTiles(base64.form);
            hideCodecTiles(hash.form);
            hideCodecTiles(uuencode.form);
            break;
    }
}
function selectorBehavior(eventTarget, processType) {
    if (eventTarget instanceof HTMLElement) {
        var element = eventTarget;
        element.addEventListener('click', function () {
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
    /** selector initirazetion*/
    window.addEventListener('load', function () {
        var processType = sessionStorage.getItem('processType');
        var selector = document.getElementById('divProcessSelector');
        try {
            var input = selector.querySelector('input[value="' + processType + '"]');
            input.checked = true;
        }
        catch (identifier) {
            var input = selector.querySelector('input[value="base64"]');
            input.checked = true;
            exceptionLog(identifier);
        }
    });
}
function mouseoverEvents() {
    document.getElementById('labelProcessBase64')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'base64'); }, false);
    document.getElementById('labelProcessHash')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'hash'); }, false);
    document.getElementById('labelProcessUuencode')
        .addEventListener('mouseover', function (event) { return selectorBehavior(event.target, 'uuencode'); }, false);
}
loadEvents();
mouseoverEvents();
/** a module file is end up here. : index/_script.js */ 
