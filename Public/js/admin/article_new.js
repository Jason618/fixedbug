/**
 * Created by lichengjun on 16/11/17.
 */
;(function(){
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
})();