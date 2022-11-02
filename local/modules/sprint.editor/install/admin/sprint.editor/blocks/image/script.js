sprint_editor.registerBlock('image', function ($, $el, data) {

    data = $.extend({
        file: {},
        desc: ''
    }, data);

    this.getData = function () {
        return data;
    };

    this.collectData = function () {
        data.desc = $el.find('.sp-item-text').val();
        return data;
    };

    this.afterRender = function () {

        renderfiles();

        var $btn = $el.find('.sp-file');
        var $btninput = $btn.find('input[type=file]');
        var $label = $btn.find('strong');
        var labeltext = $label.text();

        $btninput.fileupload({
            dropZone: $el,
            url: sprint_editor.getBlockWebPath('image') + '/upload.php',
            dataType: 'json',
            done: function (e, result) {
                deletefiles();

                $.each(result.result.file, function (index, file) {
                    data.file = file;
                });

                renderfiles();

                togglepanel();
            },
            progressall: function (e, result) {
                var progress = parseInt(result.loaded / result.total * 100, 10);

                $label.text('Загрузка: ' + progress + '%');

                if (progress >= 100) {
                    $label.text(labeltext);
                }
            }
        }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');


        $el.find('.sp-download-url').bindWithDelay('input', function () {
            var $urltext = $(this);

            var urlvalue = $.trim(
                $urltext.val()
            );

            if (urlvalue.length <= 0) {
                return false;
            }


            $.ajax({
                url: sprint_editor.getBlockWebPath('image') + '/download.php',
                type: 'post',
                data: {
                    url: urlvalue
                },
                dataType: 'json',
                success: function (result) {
                    if (result.image) {

                        deletefiles();

                        data.file = result.image;

                        renderfiles();

                        togglepanel();
                    }

                    $urltext.val('');


                }
            });
        }, 500);

        $el.on('click', '.sp-item-del', function () {
            deletefiles();

            data.file = {};

            renderfiles();
        });

        $el.on('click', '.sp-image-toggle', function () {
            togglepanel();
        });

        if (!data.file || !data.file.SRC) {
            togglepanel();
        }

    };

    var togglepanel = function () {
        if ($el.hasClass('sp-show')) {
            $el.find('.sp-panel').hide(250);
            $el.removeClass('sp-show');
        } else {
            $el.find('.sp-panel').show(250);
            $el.addClass('sp-show');
        }
    }

    var renderfiles = function () {
        $el.find('.sp-result').html(
            sprint_editor.renderTemplate('image-image', data)
        );
    };

    var deletefiles = function () {
        var uid = sprint_editor.makeUid();
        var items = {};
        items[uid] = {
            file: data.file
        };

        sprint_editor.markImagesForDelete(items);
    };

    this.beforeDelete = function () {
        deletefiles();
    }


});
