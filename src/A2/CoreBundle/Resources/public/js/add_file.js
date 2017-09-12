/*global $:true swal:true*/

function getCategoriesInside(url,category) {
    var result = null;
    $.ajax({
        url: url,
        type: 'post',
        data: { category:category},
        dataType:"json",
        async: false,
        success: function(data) {
            result = data;
        }
    });
    return result;
}

function get_id(id){
    return parseInt(id.replace("theme_",""));
}

function empty_select(id){
    var complete_id='#theme_'+id;
    var complete_id_without_hashtag = 'theme_'+id;
    if(typeof $(complete_id).val() !== "undefined"){
        $(complete_id).empty();
        $(complete_id).prop("disabled",true);
        var option = document.createElement('option');
        option.id="title_theme_1";
        option.value = option.text = "Choisir un thème";
        document.getElementById(complete_id_without_hashtag).add( option );
        empty_select(parseInt(id)+1);
    }
}

function refresh_select(id_parent,id_select){
    var select_id='#theme_'+id_select;
    var select_id_without_hashtag = 'theme_'+id_select;
    if(typeof $(select_id).val() !== "undefined"){
        $(select_id).empty();
        $(select_id).prop("disabled",false);
        var list = getCategoriesInside("ajax/categories/list_with_parent",id_parent);

        if(list.categories.length !== 0){
            var option = document.createElement('option');
            option.id="title_theme_"+id_select;
            option.value = "stop";
            option.text = "Choisir un thème";
            option.setAttribute("disabled",true);
            option.setAttribute("selected",true);
            document.getElementById(select_id_without_hashtag).add( option );
            for ( var i = 0; i < list.categories.length; i += 1 ) {
                option = document.createElement('option');
                option.value =  list.categories[i].id;
                option.text = list.categories[i].categoriesName;
                document.getElementById(select_id_without_hashtag).add( option );
                option.onclick =function(){
                    my_id=jQuery(this).val();
                    var child_select = jQuery(this).parent().attr('id');
                    refresh_select(my_id,get_id(child_select)+1);
                };

            }
        }
        empty_select(parseInt(id_select)+1);
    }
}


window.onload = function () {

    $("#category").change(function() {
        $("#theme_1").prop("disabled",false);
        refresh_select($("#category").val(),"1");
    });

    $("#option_tmp").click(function() {
        $("#boxCalendar").prop("style","display: block;");
        $("#boxVersion").prop("style","display: none;");
    });


    function cb(start, end) {
        $('#daterange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
        document.getElementById("a2_corebundle_files_DatePicker").value = start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY');
    }

    //  Bind the event handler to the "submit" JavaScript event
    $('form').submit(function () {

        var last_category=$("#category option:selected").val();
        var i=1;
        var tmp_last_category=$("#theme_"+i);
        var selected_value=$("#theme_"+i+" option:selected").val();

        while(tmp_last_category.length && typeof selected_value !== "undefined"){
            if(selected_value === "stop"){
                swal("Veuillez choisir une catégorie");
                return false;
            }
            last_category=selected_value;
            i++;
            tmp_last_category=$("#theme_"+i);
            selected_value=$("#theme_"+i+" option:selected").val();
        }
        alert(last_category);

        $('#a2_corebundle_files_filesCategory').val(last_category);

    });

    var start;
    var end;

    start = moment();
    end = moment().add('days',30);


    //Date range as a button
    $('#daterange').daterangepicker(
        {
            ranges: {
                '1 Mois': [moment(), moment().add('days', 30)],
                '2 Mois': [moment(), moment().add('days',60)],
                '1 An': [moment(), moment().add('days',365)]
            },
            startDate:start,
            endDate:end,
            "locale": {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Valider",
                "cancelLabel": "Annuler",
                "fromLabel": "De",
                "toLabel": "à",
                "customRangeLabel": "Durée libre",
                "daysOfWeek": [
                    "Dim",
                    "Lun",
                    "Mar",
                    "Mer",
                    "Jeu",
                    "Ven",
                    "Sam"
                ],
                "monthNames": [
                    "Janvier",
                    "Février",
                    "Mars",
                    "Avril",
                    "Mai",
                    "Juin",
                    "Juillet",
                    "Août",
                    "Septembre",
                    "Octobre",
                    "Novembre",
                    "Décembre"
                ],
                "firstDay": 1
            }
        },
        cb
    );

    cb(start,end);

};



