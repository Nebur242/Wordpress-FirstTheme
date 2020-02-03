//This comes from js/helpers/strip-tags - start
const strip_tags = (input, allowed) => {
    allowed = (((allowed || '') + '')
    .toLowerCase()
    .match(/<[a-z][a-z0-9]*>/g) || [])
    .join(''); // making sure the allowed arg is a string containing only tags in lowercase (<a><b><c>)
    var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi,
    commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi;
    return input.replace(commentsAndPhpTags, '')
    .replace(tags, function($0, $1) {
      return allowed.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 : '';
    });
}
//This comes from js/helpers/strip-tags - end



wp.customize('blogname' , (value) => {
    value.bind( (to) => {
        jQuery('.header__blogname').html(strip_tags(to , '<a>'));
    });
});

wp.customize('firsttheme_accent_color' , (value) => {
    value.bind( (to) => {
        let inline_css = '';
        let inline_css_obj = firsttheme_js_variable['inline-css'];
        for(let selector in inline_css_obj){
            inline_css += selector + " { ";
                for(let prop in inline_css_obj[selector]){
                    let val = inline_css_obj[selector][prop];
                    inline_css += prop + " : " + wp.customize(val).get();
                }
            inline_css += " } ";
        }
        console.log(inline_css);
        jQuery('#firsttheme-stylesheet-inline-css').html(inline_css);
    });
});


wp.customize('firsttheme_site_info' , (value) => {
    value.bind( (to) => {
        jQuery('.site_info__text').html(strip_tags(to , '<a>'));
    });
});