/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(function() {
    var pgurl = window.location.href.substr(window.location.href
            .lastIndexOf("/") + 1);
    console.log(pgurl);
    $("#menu ul li a").each(function() {
        if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
            $(this).parent().addClass("active");
       // $(this).parent().addClass('selected');
    });

});
   // $('.thesubmenu ul li.subcat-active').parent().closest('li').addClass('cat-active');

