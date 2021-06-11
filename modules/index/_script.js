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
        button: document.getElementById('labelProcessBase64'),
        form: document.getElementById('formBase64Codec')
    };
    var hash = {
        button: document.getElementById('labelProcessHash'),
        form: document.getElementById('formHashGenerator')
    };
    var uuencode = {
        button: document.getElementById('labelProcessUuencode'),
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
/** actions when click elements */
document.getElementById('labelProcessBase64').addEventListener('click', function () {
    try {
        sessionStorage.setItem('processType', 'base64');
    }
    catch (identifier) {
        exceptionLog(identifier);
    }
    callEachCodec();
}, false);
document.getElementById('labelProcessHash').addEventListener('click', function () {
    try {
        sessionStorage.setItem('processType', 'hash');
    }
    catch (identifier) {
        exceptionLog(identifier);
    }
    callEachCodec();
}, false);
document.getElementById('labelProcessUuencode').addEventListener('click', function () {
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
