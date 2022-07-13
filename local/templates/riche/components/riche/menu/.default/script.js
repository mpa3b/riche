const MenuComponent = {
    name    : 'MenuComponent',
    template: '#menu--template',
    props: {
        items: Array
    },
    data    : function () {
        return {
            menuItems: []
        };
    },
    created(){
        this.menuItems = this.items;
    }
};
