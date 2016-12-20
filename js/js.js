/**
 * Created by lara on 12/19/16.
 */
function pagination(elemnto) {
    var $this = $(elemnto);
    $('ul li a').removeClass('active');
    $this.addClass('active');
    call_api($this.data('page'))
}

function convert_name(name) {
    return name.toLowerCase().replace(/ /g, "-");
}

function add_info(url) {
    $('#modal_body').empty();
    $.ajax({
        url: url,
        method: "get",
        success: function (response) {

            var html = '<div class="row"> ' +
                '<div class="row"><label class="name_tag">Manufacturer: </label> <label class="value_tag">' + response['manufacturer'] + '</label></div>' +
                '<div class="row"><label class="name_tag">Starship Class: </label><label class="value_tag">' + response['starship_class'] + '</label></div>' +
                '<div class="row"><label class="name_tag">Hyperdrive Rating: </label><label class="value_tag">' + response['hyperdrive_rating'] + '</label></div>' +
                '<div class="row"><label class="name_tag">Cargo Capacity: </label><label class="value_tag">' + response['cargo_capacity'] + '</label></div>' +
                '<div class="row"><label class="name_tag">Cost in Credits: </label><label class="value_tag">' + response['cost_in_credits'] + '</label></div>' +
                '<div class="row"><label class="name_tag">Max Atmosphering Speed: </label><label class="value_tag">' + response['max_atmosphering_speed'] + '</label></div>' +
                '<div class="row"><label class="name_tag">MGLT: </label><label class="value_tag">' + response['MGLT'] + '</label></div>' +
                '</div>';
            $('#modal_body').append(html);
            // $(html).html('#modal_body');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}
function call_api(page) {
    $('#body').empty();
    $.ajax({
        url: "http://swapi.co/api/starships/?page=" + page,
        method: "get",
        success: function (response) {
            var data = response['results'];

            $.each(data, function (i, item) {
                var name = data[i].name;
                var name_image = convert_name(name);
                var length = data[i].length;
                var crew = data[i].crew;
                var passengers = data[i].passengers;
                var det_url = data[i].url;

                var html = '<div class="row"> ' +
                    '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>' +
                    '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> ' +
                    '<div class="row"><h1>' + name + '</h1> </div>' +
                    '<div class="row"><label class="name_tag">Length: </label> <label class="value_tag">' + length + '</label></div>' +
                    '<div class="row"><label class="name_tag">Crew: </label><label class="value_tag">' + crew + '</label></div>' +
                    '<div class="row"><label class="name_tag">Passengers: </label><label class="value_tag">' + passengers + '</label></div>' +
                    '</div>' +
                    '<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="/dev-test/img/starships/' + name_image + '.png"></div>' +
                    '<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>' +
                    '</div>';

                $("#body").append($(html));
                var html = '<div class="row"> <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div><div class="col-lg-9 col-md-9 col-sm-9 col-xs-9"><div class="row"><button data-target="#details_modal" onclick="add_info(\'' + det_url + '\');" data-toggle="modal" class="btn btn-default btn-md" type="button">More Info »</button></div><div class="row"><hr/></div></div><div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div></div>';
                $("#body").append($(html));


            });

            // console.log(response['results']);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
}

$(function () {

    $(document).ajaxStart(function () {
        $.LoadingOverlay("show", {
            image: "/dev-test/img/loading.gif"
        });
    });
    $(document).ajaxStop(function () {
        $.LoadingOverlay("hide");
    });
    call_api(1);
});