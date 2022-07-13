const MenuComponent = {
    name    : 'MenuComponent',
    template: '',
    data    : function () {
        return {
            menuItems: []
        };
    },
    methods : {},
    mounted() {
        this.menuItems = this.$attrs.data;
    }
};
