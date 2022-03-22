var tiny = tinymce.init({
    selector: '#myTextareaLesson',
    init_instance_callback: function (editor) {
      editor.on('Change', function (e) {
        console.log('hello')
      });
    }
  });