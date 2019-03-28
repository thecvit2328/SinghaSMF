<script type="text/javascript" src="js/texteditor/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript">
    $().ready(function() {
        $('textarea.tinymce').tinymce({
            // Location of TinyMCE script
            script_url : 'js/texteditor/tiny_mce/tiny_mce.js',

            // General options
            theme : "advanced",
            plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

            // Theme options
//         theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
//        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
//        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
//        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            
            theme_advanced_buttons1 : "code,|,cut,copy,paste,pastetext,pasteword,|,undo,redo,|,bold,italic,underline,strikethrough,|,tablecontrols",
            theme_advanced_buttons2 : "outdent,indent,|,justifyleft,justifycenter,justifyright,justifyfull,|,fontsizeselect,bullist,numlist,|,link,unlink,|,forecolor,backcolor,|,media,image,preview,anchor",

            paste_remove_styles : true, 
                
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            plugin_preview_width : "940",
            plugin_preview_height : "600",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            force_br_newlines : true,
            force_p_newlines : false,
            forced_root_block : '', // Needed for 3.x
            // Example content CSS (should be your site CSS)
            content_css : "http://27.254.67.174:84/backoffice/css/texteditor.css",
            mode:'textareas',
            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
            relative_urls : false,
            remove_script_host : false,
            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            },
            
            file_browser_callback : 'elFinderBrowser'
        });





    });
    
function elFinderBrowser (field_name, url, type, win) {
  var elfinder_url = 'js/texteditor/elfinder/elfinder.html';    // use an absolute path!
  tinyMCE.activeEditor.windowManager.open({
        file: elfinder_url,
        title: 'Files Management',
        width: 1024,  
        height: 500,
        resizable: 'yes',
        inline: 'yes',    // This parameter only has an effect if you use the inlinepopups plugin!
        popup_css: false, // Disable TinyMCE's default popup CSS
        close_previous: 'no'
    }, {
        window: win,
        input: field_name
    });
  return false;
}   

</script>