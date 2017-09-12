/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/
"use strict";

$(function () {

  //Activate the iCheck Plugin
  $('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });
  //Make the dashboard widgets sortable Using jquery UI
  $(".connectedSortable").sortable({
    placeholder: "sort-highlight",
    connectWith: ".connectedSortable",
    handle: ".box-header, .nav-tabs",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
  //jQuery UI sortable for the todo list
  $(".todo-list").sortable({
    placeholder: "sort-highlight",
    handle: ".handle",
    forcePlaceholderSize: true,
    zIndex: 999999
  });

  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();

  /* jQueryKnob */
  $(".knob").knob();

  


  //The Calender
  $("#calendar").datepicker();

   /* Morris.js Charts */
  //BAR CHART
        var bar = new Morris.Bar({
          element: 'bar-chart',
          resize: true,
          data: [
            {y: 'Mai', a: 100, b: 90},
            {y: 'Juin', a: 75, b: 65},
            {y: 'Juillet', a: 50, b: 40},
            {y: 'Aout', a: 75, b: 65},
            {y: 'Septembre', a: 50, b: 40},
            {y: 'Octobre', a: 75, b: 65},
            {y: 'Novembre', a: 100, b: 90}
          ],
          barColors: ['#00c0ef', '#f56954'],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Nombre de Visiteurs', 'Nombre de Fichiers'],
          hideHover: 'auto'
        });


  //Fix for charts under tabs
  $('.box ul.nav a').on('shown.bs.tab', function (e) {
    area.redraw();
    donut.redraw();
  });


  


});
