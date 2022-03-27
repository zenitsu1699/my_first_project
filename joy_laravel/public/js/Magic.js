$(document).ready(function() {
    
    $surface = $('.surface');
    $car = $('.car');
    $img = $('.car img');
    let flag = true;

    const cars = ['../img/assets/Img_05.png', '../img/assets/Img_06.png'];

    $(document).on('keypress', function(e) {
        console.log(e.which);
        // if (e.which == 13) {
        //     $($surface).toggleClass('move-right');
        //     $($car).toggleClass('suspentation');
        // }
    })

    // $(document).on('keypress', function(e) {
    //     if (e.which == 119) {
    //         if (flag) {
    //             flag = false;
    //             $img.attr('src', cars[0]);
    //         } else {
    //             flag = true;
    //             $img.attr('src', cars[1]);
    //         }
    //     }
    // })
});