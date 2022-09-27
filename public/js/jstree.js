var jsTree = $('#js_tree').jstree();

jsTree.on('changed.jstree', function(e, data) {
    
    $('input[name="classification"]').val(data.instance.get_path(data.instance.get_selected(), ' > ').replace(/\s+/g, ' ').trim());
    
    $("#modalJSTree .close").click();
});