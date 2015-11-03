+function ($) {

  $(function(){
 
      // nav
      
 var cc = 0;
    $('#orderAction').click(function () {        
        cc++;
        if (cc == 2) {
            $(this).change();
            cc = 0;
        }         
    }).change (function () {
       $('#proforma-popup').click();
        cc = -1;
    });   
   }); 

$('input').filter('.Datepicker').datepicker({
    changeMonth: true,
    changeYear: true,
   });
  
}(jQuery);