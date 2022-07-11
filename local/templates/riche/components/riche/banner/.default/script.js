
const App = {
    name: 'Banner',
    template: "",
    data: function () {
        return {
            banners: [],
        }
    },
    methods: {
        addData: data =>{
            this.banners = JSON.parse(data);
        },
        imageUrl: (banner) => {
            return banner.PREVIEW_PICTURE;
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
    }
}


