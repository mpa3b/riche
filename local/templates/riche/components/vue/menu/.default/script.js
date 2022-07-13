Page.component(
    'Menu',
    {
        name    : 'Menu component',
        template: '#menu--default--template',
        props   : {
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
);

