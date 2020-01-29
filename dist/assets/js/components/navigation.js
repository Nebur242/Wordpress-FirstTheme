

jQuery(document).ready(function(){

    jQuery('nav.header-nav').on( 'mouseenter' , '.menu-item-has-children', (e) => {
        if(!jQuery(e.currentTarget).parents('.sub-menu').length){
            jQuery('.menu > .menu-item.open').find('> a > .menu-button').trigger('click');
        }
        jQuery(e.currentTarget).addClass('open');
    });

    jQuery('nav.header-nav').on( 'mouseleave' , '.menu-item-has-children', function(){
        jQuery('.menu-item-has-children').removeClass('open');
    });

    jQuery('nav.header-nav').on( 'click' , 'button.menu-button', (e) =>{
        e.preventDefault();
        e.stopPropagation();

        let menu_button = jQuery(e.currentTarget);
        let menu_link = menu_button.parent();
        let menu_item = menu_link.parent();

        if(menu_item.hasClass('open')){
            menu_item.add(menu_item.find('.menu-item.open')).removeClass('open');
            menu_link.add(menu_item.find('a')).attr('aria-expanded' , 'false');
            menu_button.find('.menu-button-show').attr('aria-hidden' , 'false');
            menu_button.find('.menu-button-hide').attr('aria-hidden' , 'true');

        } else {
            menu_item.siblings('.open').find('>a>.menu-button').trigger('click');
            menu_item.addClass('open');
            menu_link.attr('aria-expanded' , 'true');
            menu_button.find('.menu-button-show').attr('aria-hidden' , 'true');
            menu_button.find('.menu-button-hide').attr('aria-hidden' , 'false');

        }

    });


    jQuery(document).click((e) =>{
        if(jQuery('.menu-item.open').length){
            jQuery('.menu > .menu-item.open > a > .menu-button').trigger('click');
        }
    });

});