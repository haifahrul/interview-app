/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 * haifahrul <haifahrul@gmail.com>
 */

function clearForm(idForm) {
    $(idForm).modal("hide");
    $(idForm).on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });
}

function log(param) {
    console.log(param);
}

$("#print").on('click', function () {
    window.print();
    window.close();
});

$(document).on('click', '#modal-btn-view', function (e) {
    var url = $(this).attr("href");
    $("#modalform").modal("show").find("#modalContent").load(url);
    $('.modal-title').text(" $this->title ");
    e.preventDefault();
});

function deleteItems(url, confirmText, notif, alertText) {
    $(document).on("click", "#btn-delete-items", function () {
        var keys = $("#gridView").yiiGridView("getSelectedRows");
//        log(keys);
        if (keys != "") {
            if (confirm(confirmText)) {
                var keys = $("#gridView").yiiGridView("getSelectedRows");
                $.ajax({
                    type: "post",
                    url: url,
                    data: {keys},
                    success: function (data) {
                        // $.pjax.reload({container: "#grid"});
                        location.reload();
                    }
                });
                return false;
            }
        } else {
            alert(alertText);
        }
    });
}

function drops(url, confirmText, notif, alertText) {
    $("#select-all").click(function () {
        $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    });

    $(document).on("click", "#btn-drops", function () {
        var selected = [];

        $("input[name='select']:checked").each(function () {
            selected.push($(this).val());
        });

        if (selected == '') {
            alert(alertText);
        } else if (confirm(confirmText)) {
            $.ajax({
                type: "post",
                url: url,
                data: {selected},
                success: function (data) {
//                    console.log(data);
//                    if (data == 1) {
//                        $.pjax.reload({container: "#grid"});
                    location.reload();
//                        $.session.set('danger', notif);
//                    }
                },
            });

            return false;
        }
    });
}

function btnModal(id, title) {
    $(document).on('click', id, function (e) {
        var url = $(this).attr("href");
        $("#modal-form").modal("show").find("#modalContent").load(url);
        $('.modal-title').text(title);
        e.preventDefault();
    });
}

function dropdownEmpty(selector) {
    selector.empty();
}

function enabledDropdown(selector) {
    selector.attr('disabled', false);
}

function disabledDropdown(selector) {
    selector.attr('disabled', true);
}

$(document).ready(function () {
    function btnModal(id, title) {
        $(document).on('click', id, function (e) {
            var url = $(this).attr("href");
            $("#modal-form").modal("show").find("#modalContent").load(url);
            $('.modal-title').text(title);
            e.preventDefault();
        });
    }

    /* File Input */
    $("[type=file]").on("change", function () {
        // Name of file and placeholder
        var file = this.files[0].name;
        var dflt = $(this).attr("placeholder");
        if ($(this).val() != "") {
            $(this).next().text(file);
        } else {
            $(this).next().text(dflt);
        }
    });

    /*
     Go Back
     */

    function goBack() {
        window.history.go(-1);
    }

    function goBack2() {
        window.history.go(-2);
    }

    function uppercase() {
        $('input[type=text]').val(function () {
            return this.value.toUpperCase();
        })
    }

    function gridViewScrollToFixed() {
        $('#box-header-fixed').scrollToFixed({
            marginTop: 49,
        });
    }

    function gridViewScrollToFixedMobile() {
        $('#box-header-fixed').scrollToFixed({
            marginTop: 50,
            maxWidth: 767
        });
    }

    // When the user clicks on the button, scroll to the top of the document
    function paginationScrollTop() {
        $(".prev, .next").click(function () {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });

        $("#select_page").change(function () {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });
    }

    gridViewScrollToFixed();
    gridViewScrollToFixedMobile();
    paginationScrollTop();
//    viewNavTabs();

    $(document).on('pjax:end', function () {
        gridViewScrollToFixed();
        gridViewScrollToFixedMobile();
        paginationScrollTop();
//        viewNavTabs();
    });
});

function getListInterviewer() {
    $("#jadwalwawancara-user_calon_id").change(function () {
        var id = $(this).val();
        
        $.ajax({
            type: "POST",
            url: '/jadwal-wawancara/ajax-get-list-interviewer',
            data: {calon_id: id},
            success: function (data) {
                $('#jadwalwawancara-user_interviewer_id').find('option').remove().end().append('<option value=""></option>').val('');
                $.each(JSON.parse(data), function (key, value) {
                    $("#jadwalwawancara-user_interviewer_id").append('<option value="' + key + '">' + value + '</option>');
                });
            },
        });

        return false;
    });

    // var apps_id = $("#logdata1search-apps_id, #logdata2search-apps_id, #logdata3search-apps_id").val();
    // if (apps_id !== '') {
    //     $.ajax({
    //         type: "POST",
    //         url: '/area/ajax-get-area-list',
    //         data: {apps_id: apps_id},
    //         success: function (data) {
    //             $('#logdata1search-area, #logdata2search-area, #logdata3search-area').find('option').remove().end().append('<option value=""></option>').val('');
    //             var appsName = $("#logdata1-value-area, #logdata2-value-area, #logdata3-value-area").val();
    //             $.each(JSON.parse(data), function (key, value) {

    //                 if (appsName === key) {
    //                     $("#logdata1search-area, #logdata2search-area, #logdata3search-area").append('<option value="' + key + '" selected>' + key + '</option>');
    //                 } else {
    //                     $("#logdata1search-area, #logdata2search-area, #logdata3search-area").append('<option value="' + key + '">' + key + '</option>');
    //                 }
    //             });
    //         },
    //     });

    //     return false;
    // }
}
