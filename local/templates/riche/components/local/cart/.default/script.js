$(() => {

    const element = $('.cart--default');

    let data = $.bxajax(element.data('component'));

    console.debug(data);

});
