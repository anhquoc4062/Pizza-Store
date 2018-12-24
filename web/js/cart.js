var iid = [];
var iname = [];
var iqty = [];
var iprice = [];

jQuery(document).ready(function($) {
   

    $(".minus").click(function(event) {
        /* Act on the event */
        var button = $(this);
        var id = button.attr("id");
        var vitri = id.substr(3,id.length-3);
        var numbid="numb"+vitri;
        var giatri = parseInt(document.getElementById(numbid).value);
        if(giatri>1){
            document.getElementById(numbid).value=giatri-1;
        }

    });

    $(".plus").click(function(event) {
        /* Act on the event */
        var button = $(this);
        var id = button.attr("id");
        var vitri = id.substr(3,id.length-3);
        var numbid="numb"+vitri;
        var giatri = parseInt(document.getElementById(numbid).value);

        document.getElementById(numbid).value=giatri+1;

    });


    $("#clear-all").click(function(event) {
        /* Act on the event */
        document.cookie="";
        location.reload();
    });
});

