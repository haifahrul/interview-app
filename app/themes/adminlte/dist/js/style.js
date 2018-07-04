/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.setTimeout(function() { $(".alert").alert('close'); }, 500000);

$('.closeToggleFullScreen').hide();
$('.openToggleFullScreen').click(function () {
    $('body').fullscreen();
    $(this).hide();
    $('.closeToggleFullScreen').show();
    return false;
});

$('.closeToggleFullScreen').click(function () {
    $(this).hide();
    $('.openToggleFullScreen').show();
    $.fullscreen.exit();
    return false;
});