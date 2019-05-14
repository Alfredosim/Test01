
require('./bootstrap');

window.Vue = require('vue');


new Vue({
	el: '#main',
	created: function() {
		this.getClientes();
	},
	data: {
		clientes: [],
		pagination: {},
	},
	methods: {
		getClientes(page_url) {
			var urlClientes = page_url || 'api/clientes';
    		axios.get(urlClientes).then(response => {
    			if (response.data.total > 0) {
    				this.clientes = response.data.data;					
    				this.makePagination(response.data);
    			} else {
    				this.clientes = [];					
    				this.pagination = {};
    			}
				
    		});
        },
        makePagination(data) {
			let pagination = {
				current_page: data.current_page,
				last_page: data.last_page,
				next_page_url: data.next_page_url,
				prev_page_url: data.prev_page_url,
				total: data.total
			}
			this.pagination = pagination;
		},
		changeStatus: function(cliente, page) {
			
			var url = 'api/clientes/' + cliente.id;
			console.log("Pagina: " + page);
			axios.put(url, cliente).then(response => { //eliminamos

				this.getClientes('api/clientes?page='+page); //listamos
				});
			}
	}
});
