window.addEventListener('load', function () {
    dd("#loading_cover").fadeOut(500);
    

    dd("#submit_number_top .next_button").select().addEventListener('click', (e)=> {
        e.preventDefault();
        dd("#submit_number_top .next_button").fadeOut(500, ()=>{
                
            dd("#submit_number_top [name='full_name']").fadeIn(500);
            dd("#submit_number_top [name='submit_button']").fadeIn(500);
        })
    });

});
