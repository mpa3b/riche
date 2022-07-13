const BannerComponent = {
    name    : 'BannerComponent',
    template: '#banner--template',
    props: {
        items: Array
    },
    data    : () => {
        return {
            banners: []
        };
    },
    methods : {
        image: (banner) => {
            return {
                mobile : banner.PREVIEW_PICTURE,
                desktop: banner.DETAIL_PICTURE
            };
        }
    },
    created(){
        this.banners = this.items;
    },
    mounted() {

        // this.banners = this.$attrs.data;

        fetch(
            '/api/riche/main/banner/get/',
            {
                method : 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body   : JSON.stringify(
                    {
                        select: [
                            'ID',
                            'NAME',
                            'PREVIEW_TEXT',
                            'DETAIL_TEXT'
                        ]
                    }
                )
            }
        )
            .then(
                async response => {
                    const data = await response.json();
                    this.banners = data.data.data;
                }
            )
            .catch(
                error => {
                    console.error('There was an error!', error);
                }
            );
    }
}