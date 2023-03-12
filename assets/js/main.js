
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
            hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }

    });


})(jQuery);

const popupButtons = document.querySelectorAll('.popup-button');
const popupMenus = document.querySelectorAll('.popup-menu');

let activeMenu = null;

for (let i = 0; i < popupButtons.length; i++) {
    const popupButton = popupButtons[i];
    const popupMenu = popupMenus[i];

    popupButton.addEventListener('click', () => {
        if (activeMenu !== popupMenu) {
            if (activeMenu !== null) {
                activeMenu.style.display = 'none';
            }
            popupMenu.style.display = 'block';
            activeMenu = popupMenu;
        } else {
            popupMenu.style.display = 'none';
            activeMenu = null;
        }
    });

    const deleteButton = popupMenu.querySelector('a:last-of-type');
    deleteButton.addEventListener('click', (event) => {
        const card = event.target.closest('.card');
        const id = card.getAttribute('data-id');
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../tech/rem-v1010.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                console.log(this.responseText);
                card.remove();
                activeMenu = null;
            }
        };
        xhr.send('id=' + encodeURIComponent(id));
    });
    document.addEventListener('click', (event) => {
        const isClickInside = popupButton.contains(event.target) || popupMenu.contains(event.target);
        if (!isClickInside) {
            popupMenu.style.display = 'none';
            activeMenu = null;
        }
    });
}
