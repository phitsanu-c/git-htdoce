$(".memu_sel").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').show();
    $("#pills-selectHome").hide();
});
$(".memu_dash").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").show();
});