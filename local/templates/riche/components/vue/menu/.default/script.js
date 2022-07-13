const MenuComponent = Page.component(
    'MenuComponent',
    {
        name    : 'MenuComponent',
        template: '#menu--default',
        data    : () => {

            return {
                title: 'Menu default component',
                items: [
                    {
                        href: '/',
                        icon: 'root',
                        name: 'Главная'
                    },
                    {
                        href: '/shop/',
                        icon: 'shop',
                        name: 'Магазин'
                    }
                ]
            }

        }
    }
);