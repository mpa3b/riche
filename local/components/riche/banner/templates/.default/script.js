new Vue({
    el: '#banner',
    data() {
        return {
            banners: []
        }
    },
    mounted() {
        fetch('/api/riche/main/banner/get/', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                select: [
                    'ID',
                    'NAME',
                    'PREVIEW_TEXT',
                    'DETAIL_TEXT',
                ]
            })
        })
        .then(async response => {
            const data = await response.json();
            this.banners = data.data.data;
        })
        .catch(error => {
            console.error('There was an error!', error);
        });
    },
})