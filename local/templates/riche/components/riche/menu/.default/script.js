const Menu = {
    name :     'Menu',
    template : '',
    data :     function () {
        return {
            menuItems : []
        };
    },
    methods :  {},
    mounted() {
        this.menuItems = this.$attrs.data;
    }
};
