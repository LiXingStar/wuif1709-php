$(function(){
    let filebtn = $(':file');
    let imgs = $('.img-thumbnail');
    filebtn.on('change',function(){
        let data = this.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(data);
        reader.onload = function(e){
            imgs.attr('src',e.currentTarget.result);
        }
    })
});