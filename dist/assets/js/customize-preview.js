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


wp.customize('firsttheme_site_info' , (value) => {
    value.bind( (to) => {
        jQuery('.site_info__text').html(strip_tags(to , '<a>'));
    });
});