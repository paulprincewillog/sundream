<div class="form">   

    <div class="flex paragraph">
        <p>Fill in your phone number to receive a call from us</p>
        <span class="down_pointer"> <i class="pe-7s-angle-down"></i> </span>
    </div> 

    <form id="submit_number_top" dd_submit="yes" action="app/index/submit_number" method="POST">
        <input type="text" placeholder="Your phone number" name="phone_number" minlength="11" required>
        <button class="next_button" type="button"> Next <i class="pe-7s-angle-right"></i> </button>     
        <input type="text" placeholder="Your full name" name="full_name" minlength="3" required>
        <button type="submit" name="submit_button"> Done <i class="pe-7s-angle-right"></i> </button>
    </form>

</div>