let Menu = Page.component(
    'Menu',
    {
        name : 'Menu component',
        mount: '#menu--default',
        data : () => {
            return {
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