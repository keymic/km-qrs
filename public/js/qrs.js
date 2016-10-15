/**
 * Created by keymic on 15.10.16.
 */
$('#app-layout .panel-heading i.omg, #app-layout .panel-heading i.wtf').click(function () {
    $id = $(this).parent().parent().attr("id");
    $clicked = $(this);
    if ($clicked.hasClass("omg")) {
        $url = "/omg/";
    }
    if ($clicked.hasClass("wtf")) {
        $url = "/wtf/";
    }
    $.ajax({
        url: $url + $id
    }).done(function (data) {
        $clicked.tooltip({
            title: data.message,
            delay: {show: 100, hide: 500},
            trigger: 'manual'
        });
        $clicked.tooltip("show");
        $clicked.parent().find("span").text(data.rate);
        setTimeout(function () {
            $clicked.tooltip("destroy")
        }, 3000);
    });
});