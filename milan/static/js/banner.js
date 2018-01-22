$(function(){
    let img = document.querySelectorAll('.banna');
    let dian = document.querySelectorAll('.radio>li');
    let banna = document.querySelector('.img');
    let sum = 0;
    let t = setInterval(move,2000)
    function move(){
        if(sum == img.length){
            sum = 0;
        }
        img.forEach(function(e,i){
            e.style.opacity = 0;
            dian[i].style.background = '#fff';
        });
        img[sum].style.opacity = 1;
        dian[sum].style.background = '#ae2422';
        sum++
    }

    dian.forEach(function(ele,index){

        ele.onclick = function(){
            img.forEach(function(e,i){
                e.style.opacity = 0;
                dian[i].style.background = '#fff';
            });
            img[index].style.opacity = 1;
            ele.style.background = '#ae2422';
            sum = index;
        }
    });

    banna.onmouseover = function(){
        clearInterval(t)
    };
    banna.onmouseout = function(){
        t = setInterval(move,2000)
    }


});