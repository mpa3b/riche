function underscore(el, items){
    const element = document.getElementById(el),
          template = element.innerHTML,
          templateEl = document.createElement('div');

    templateEl.innerHTML = _.template(template,{items:items})();
    element.parentNode.insertBefore(templateEl, element);
    element.parentNode.removeChild(element);
}