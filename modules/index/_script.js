/**
 * module file: _script.js
 * description:
 */
/** functions */
function dispalyCodecTiles(elements) {
    elements.form.style.display = 'flex';
}
function expandResultArea() {
    var element = document.getElementById('sectionResultArea');
    if (element != null) {
        element.style.height = '14.0rem';
    }
}
function hideCodecTiles(elements) {
    elements.button.style.backgroundColor = 'none';
    elements.form.style.display = 'none';
}
function exceptionLog(identifier) {
    console.log(identifier.name + ' : ' + identifier.message);
}
function callEachCodec() {
    var processType = sessionStorage.getItem('processType');
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
            dispalyCodecTiles(base64);
            hideCodecTiles(hash);
            hideCodecTiles(uuencode);
            break;
        case 'hash':
            dispalyCodecTiles(hash);
            hideCodecTiles(base64);
            hideCodecTiles(uuencode);
            break;
        case 'uuencode':
            dispalyCodecTiles(uuencode);
            hideCodecTiles(base64);
            hideCodecTiles(hash);
            break;
        default:
            dispalyCodecTiles(base64);
            hideCodecTiles(hash);
            hideCodecTiles(uuencode);
            break;
    }
}
function changeButtonColor(eventTarget) {
    if (eventTarget instanceof HTMLElement) {
        console.log(eventTarget);
        eventTarget.style.background = 'rgb(239, 239, 239)';
        eventTarget.addEventListener('mouseout', function () {
            eventTarget.style.background = 'rgb(255, 255, 255)';
        });
    }
}
function mouseoverButton() {
    document.getElementById('buttonProcessBase64')
        .addEventListener('mouseover', function (event) {
        changeButtonColor(event.target);
        event.target.addEventListener('click', function () {
            try {
                sessionStorage.setItem('processType', 'base64');
            }
            catch (identifier) {
                exceptionLog(identifier);
            }
            callEachCodec();
        }, false);
    }, false);
    document.getElementById('buttonProcessHash')
        .addEventListener('mouseover', function (event) { return changeButtonColor(event.target); }, false);
    document.getElementById('buttonProcessUuencode')
        .addEventListener('mouseover', function (event) { return changeButtonColor(event.target); }, false);
}
mouseoverButton();
/** actions when click elements */
document.getElementById('buttonProcessHash').addEventListener('click', function () {
    try {
        sessionStorage.setItem('processType', 'hash');
    }
    catch (identifier) {
        exceptionLog(identifier);
    }
    callEachCodec();
}, false);
document.getElementById('buttonProcessUuencode').addEventListener('click', function () {
    try {
        sessionStorage.setItem('processType', 'uuencode');
    }
    catch (identifier) {
        exceptionLog(identifier);
    }
    callEachCodec();
}, false);
/** for css transition of result area */
window.addEventListener('load', expandResultArea);
/** initialization of expression */
window.addEventListener('load', callEachCodec);
/** a module file is end up here. : index/_script.js */ 
