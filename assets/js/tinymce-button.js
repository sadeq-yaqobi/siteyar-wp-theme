// Encapsulate the code within an immediately-invoked function expression (IIFE) for better encapsulation

(function () {

    // Create TinyMCE plugin for the shortcodes button
    tinymce.create('tinymce.plugins.custom.btn',{
        init: function (ed, url) {

           /* // Add 'video' button to the editor
            ed.addButton(
                'video',
                {
                    title: 'افزودن شورت کد ویدیو', // Set a descriptive title for the button
                    image:url+'/tinymce-icon-img/video.png', // Set the button icon
                    // icon: 'remove',
                    onclick: function () {
                        // Execute command to insert video shortcode into the editor
                        ed.execCommand("mceInsertContent", false, "[video-link src=\"\"]");
                    },
                }
            );

            // Add 'quote' button to the editor
            ed.addButton(
                'quote',
                {
                    title: 'افزودن شورت کد نقل قول', // Set a descriptive title for the button
                    image:url+'/tinymce-icon-img/quotation.png', // Set the button icon
                    onclick: function () {
                        // Execute command to insert qoute shortcode into the editor
                        ed.execCommand("mceInsertContent", false, "[quote text=\"\" name=\"\" ]");
                    },
                }
            );*/

            // Add 'drop-down' button to the editor
            ed.addButton(
                'shortcodes',
                {
                    classes :'listbox',
                    type: 'menubutton',
                    text: 'شورت‌کدهای اختصاصی قالب',
                    menu: [
                        {
                            icon: 'none',
                            image:url+'/tinymce-icon-img/video.png',// Set the button icon
                            text:'افزودن لینک ویدیو',// Set a descriptive title for the button
                            onclick: function () {
                                // Execute command to insert video shortcode into the editor
                                ed.execCommand("mceInsertContent", false, "[video-link src=\"\"]");
                            },
                        },
                        {

                            image:url+'/tinymce-icon-img/quotation.png',// Set the button icon
                            text: 'افزودن باکس نقل قول',// Set a descriptive title for the button
                            onclick: function () {
                                // Execute command to insert qoute shortcode into the editor
                                ed.execCommand("mceInsertContent", false, "[quote text=\"\" name=\"\" ]");
                            },
                        }
                    ],

                }
            );
        },
    });

/*    // Add the 'video' plugin to the TinyMCE PluginManager
    tinymce.PluginManager.add('video',tinymce.plugins.custom.btn);

    // Add the 'quote' plugin to the TinyMCE PluginManager
    tinymce.PluginManager.add('quote',tinymce.plugins.custom.btn);*/

    // Add the 'shortcodes' plugin to the TinyMCE PluginManager
    tinymce.PluginManager.add('shortcodes',tinymce.plugins.custom.btn);
})();