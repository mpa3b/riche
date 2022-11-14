Vue.component('todo-list', {
    template: '#todo-list',
    data: function () {
        return {
            todos: [
                {text: 'Изучить JavaScript'},
                {text: 'Изучить Vue'},
                {text: 'Создать что-нибудь классное'}
            ]
        }
    }
})
