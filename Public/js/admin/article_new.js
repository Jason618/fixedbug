/**
 * Created by lichengjun on 16/11/17.
 */
;(function(){
    /*
    * @desc  markdown语法编辑即使效果查看
    *
    * */
    function Editor(textare,input, preview) {
        this.update = function () {
            var content = Markdown.toHTML(textare.value);
            preview.innerHTML = content;
            input.value = content;
        };
        textare.editor = this;
        this.update();
    }
    var $ = function (id) {
        return document.getElementById(id);
    };
    var textarea = $('textInput');
    var input = $('submitInput');
    var preview = $('preview');
    var editor = new Editor(textarea,input, preview);


    /*
    * @desc 文件异步上传
    *
    * */

    function AjaxUpload(containerSelector,url,method){
        this.elementSelecotr = containerSelector;
        this.url = url;
        this.method = method;
        this.init();
    }
    AjaxUpload.prototype.init = function(){
        var self = this;
        this.fileInput  = document.querySelectorAll(this.elementSelecotr + ' input[type=file]');
        this.resultContainer = document.querySelector(this.elementSelecotr + ' #uploadedUrl');
        var button = document.querySelector(this.elementSelecotr + ' button');
        button.onclick = function(e){
            self.upload();
        };
    }
    AjaxUpload.prototype.getXHR = function(){
        var xmlhttp=null;
        if (window.XMLHttpRequest)
        {// code for all new browsers
            xmlhttp=new XMLHttpRequest();
        }
        else if (window.ActiveXObject)
        {// code for IE5 and IE6
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        return xmlhttp;
    }
    AjaxUpload.prototype.upload = function(){
        var self = this;
        console.info("upload");
        var xhr = this.getXHR();
        var fileInputs = this.fileInput;
        var formData = new FormData();
        for(var i=0;i<fileInputs.length;i++){
            //data.push(fileInputs[i].files);
            formData.append("afile", fileInputs[i].files[0]);
        }


        if(xhr){
            xhr.open(this.method,this.url,true);
            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                    var percentComplete = (e.loaded / e.total) * 100;
                    console.log(percentComplete + '% uploaded');
                }
            };

            xhr.onload = function() {
                if (this.status == 200) {
                   // var resp = JSON.parse(this.response);
                    var result = JSON.parse(this.response);
                    self.resultContainer.innerHTML += result.name + ":" +result.imageUrl + "\n";
                }else{
                    alert("上传失败");
                }
            };

            xhr.send(formData);

        }else{
            alert("your browser not support xhr");
        }
    }

    new AjaxUpload('.uploads','http://127.0.0.1/index.php/Admin/Article/upload','POST');

})();