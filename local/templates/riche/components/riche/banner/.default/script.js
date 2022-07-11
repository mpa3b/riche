
const App = {
    name: 'Banner',
    template: "",
    data: function () {
        return {
            banners: [],
        }
    },
    methods: {
        imageUrl: (banner) => {
            return 'upload/' + banner.P_PICTURE_SUBDIR + '/' + banner.P_PICTURE_FILE_NAME;
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


