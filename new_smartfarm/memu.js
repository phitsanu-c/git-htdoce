$(".memu_sel").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').show();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").hide();
});
$(".memu_dash").click(function() {
    $(this).addClass('mm-active');
    $('#pills-selectSite').hide();
    $("#pills-selectHome").show();
    $("#pills-selectReport").hide();
});
$(".memu_report").click(function() {
    $('#pills-selectSite').hide();
    $("#pills-selectHome").hide();
    $("#pills-selectReport").show();
});