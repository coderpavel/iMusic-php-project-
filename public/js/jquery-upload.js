function _(el){
    return document.getElementById(el);
}

function uploadFile() {
    var file = _("file1").files[0];
    var formadata = new FormData();
    formadata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "file_upload_parser.php");
    ajax.send(formadata);
}

function progressHandler(event){
    _("loaded_and_total").innerHTML = "Uploaded " + event.loaded/1000000 + " Megabytes of " + event.total/1000000;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% loading.....";
}

function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
}

function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}

function abortHandler(event){
    _("status").innerHTML = "Upload Failed";
}
