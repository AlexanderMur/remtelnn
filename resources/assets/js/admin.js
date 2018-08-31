import './sb-admin-2.js'
import 'jquery.repeater'
import * as Sortable from 'sortablejs'

$(function () {
    let csrf_token = document.querySelector('meta[name="csrf_token"]').content
    $('#side-menu').metisMenu();

    /*$('#dataTables-example').DataTable({
        responsive: true
    });*/


    $('.repeater').repeater({
        show: function () {
            $(this).show();
            $(this).find('select').prop('disabled', false);
            $(this).find('.no-repeat').prop('disabled', true);
        }
    });

    $('.sortable').each(function () {
        let $this = $(this)
        new Sortable(this, {
            animation: 150,
            handle: ".sort-handle",
            onUpdate: function (e) {
                $this.prev().find('.d-none').removeClass('d-none');
                console.log($this);
                const arr = [];
                $(e.from.children).each(function (i) {
                    let id = $(this).data('device-id')
                    arr.push([id, i])
                });
                $.ajax(window.rootUrl + '/admin/devices/set_order', {
                    method: 'post',
                    data: {
                        _token: csrf_token,
                        data: arr,
                    },
                    success: function () {
                        $this.prev().find('.loading').addClass('d-none');
                    }
                })
            }
        });
    });
    $('.sortable-list').each(function () {
        new Sortable(this, {
            animation: 150,
            handle: ".sort-handle",
        });
    });


    $('#lfm').filemanager('image',{prefix: window.rootUrl + '/laravel-filemanager'});


});