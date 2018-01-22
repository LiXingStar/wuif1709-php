$(function(){
   let tmpBtn = $('#exampleInputTmp') ,
       tmpShow = $('input:hidden');
   tmpBtn.on('change',function(){
      tmpShow.attr('value',this.files[0].name);
   })
});