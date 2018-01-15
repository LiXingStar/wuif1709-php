$(function(){
   let uls = $('.left > h3');
   uls.on('click',function(){
       $(this).next('ul').slideToggle();
   })
});