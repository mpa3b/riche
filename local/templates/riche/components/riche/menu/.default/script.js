const selector = 'catalog-items',
      el = document.getElementById('catalog-items'),
      items = JSON.parse(el.dataset.items),
      template = $('#'+selector+'--template');


$('#'+selector).append(_.template($(template).html(),{items:items})());
