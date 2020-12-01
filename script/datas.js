//READY
$(document).ready(function() {
    $("#datas").on("change", function() {
        let selected = $("#datas :selected").val()
        if (selected == "CedMicro" || selected == "SELECT") {
            $("#luggages").prop("disabled", true)
            $("#luggages").val(0)
        } else {
            $("#luggages").prop("disabled", false)
        }
    })

    //VALIDATIONS
    $("#current").on("change", function() {
        console.log("ok")
        var current = $("#current :selected").val()
        $("#destination option[value=" + current + "]").prop("disabled", true).siblings()
            .removeAttr("disabled");
    })
    $("#destination").on("change", function() {
        var current = $("#destination :selected").val()
        $("#current option[value=" + current + "]").prop("disabled", true).siblings()
            .removeAttr("disabled");
    })
    $("#luggages").on("keyup", function() {
        var a = $("#luggages").val();
        if (isNaN(a)) {
            $("#Price").html("ENTER Luggage In number")
        } else {
            $("#Price").html("Entered Weight IS :" + $("#luggages").val())
        }
    })



    //AJAX VALUE
    $("#submit").on("click", function(ev) {
        ev.preventDefault();
        var current = $("#current :selected").val()
        var destination = $("#destination :selected").val()
        var selected = $("#datas :selected").val()
        var luggages = $("#luggages").val()
        if (isNaN(luggages)) {
            console.log("ok")
            $("#Price").html("ENTER Luggage In number")
        } else if (current == "SELECT" || destination == "SELECT" || selected == "SELECT") {
            alert("PLEASE SELECT ALL FIELD FIRST")

        } else {
            console.log("done");
            $.ajax({
                url: './user/data.php',
                type: 'POST',
                data: { current: current, destination: destination, selected: selected, luggages: luggages },
                success: function(response) {
                    $("#books").css("display", "block");
                    $("#Price").css("display", "block");
                    $("#fare").css("display", "inline");
                    $("#Price").val(response)
                    console.log("inside");

                }
            });
        }
    })


})