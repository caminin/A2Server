function switch_pdf(url,id_pdf_viewer,id_category) {
    var result = null;
    $.ajax({
        url: url,
        type: 'post',
        data: { id_category:id_category},
        dataType:"json",
        async: false,
        success: function(data) {
            result = data;
        }
    });

    document.getElementById[id_pdf_viewer].src = url;
}
