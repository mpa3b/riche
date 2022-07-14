const template = document.getElementById('menu--template').innerHTML,
      items = [
          {
              name: "Лицо",
              link: "/face"
          }
      ];

document.getElementById('menu--template-element').innerHTML = _.template(template,{items:items})();