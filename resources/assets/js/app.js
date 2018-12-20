/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
   	msg: 'Make Post:',
   	content: '', updatedContent:'',
   	posts: [],
   	postId: '',
   	successMsg: '',
   	commentData:{},
   	commentSeen: false,
   	image:'',
   	bUrl: 'http://localhost/laravelDemo/public',
},

ready: function(){
  	this.created();
},

created(){
   	axios.get(this.bUrl +'/posts')
        .then(response => {
          	console.log(response); // show if success
          	this.posts = response.data; //we are putting data into our posts array
          	Vue.filter('myOwnTime', function(value){
            	return moment(value).fromNow();
          	});
        })
        .catch(function (error) {
          	console.log(error); // run if we have error
        });
},

 methods:{

   addPost(){

    	axios.post(this.bUrl +'/addPost', {
        	content: this.content
        })
        .then( (response) =>{
            this.content="";
            console.log('saved successfully'); // show if success
            if(response.status===200){
              	app.posts = response.data;
            }
        })
        .catch(function (error) {
            console.log(error); // run if we have error
        });
    },
   openModal(id){
     //console.log(id);
    	axios.get(this.bUrl +'/posts/' + id)
        .then(response => {
            console.log(response); // show if success
            this.updatedContent = response.data; //we are putting data into our posts array
        })
      	.catch(function (error) {
        	console.log(error); // run if we have error
      	});
    },
   updatePost(id){
     	axios.post(this.bUrl +'/updatePost/' + id, {
            updatedContent: this.updatedContent
        })
        .then( (response) =>{
            this.content="";
            console.log('Changes saved successfully'); // show if success
            if(response.status===200){
              	app.posts = response.data;
            }
        })
        .catch(function (error) {
            console.log(error); // run if we have error
        });
   	},

   	deletePost(id){
     //alert(id);
    axios.get(this.bUrl +'/deletePost/' + id)
        .then(response => {
        	console.log(response); // show if success
            this.posts = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
            console.log(error); // run if we have error
        });

   	},
   	likePost(id){
		axios.get(this.bUrl +'/likePost/' + id)
        .then(response => {
            console.log(response); // show if success
            this.posts = response.data; //we are putting data into our posts array
        })
          	.catch(function (error) {
            console.log(error); // run if we have error
        });
   	},
   	removeLikePost(id){
		axios.get(this.bUrl +'/removeLikePost/' + id)
        .then(response => {
            console.log(response); // show if success
            this.posts = response.data; //we are putting data into our posts array
        })
          	.catch(function (error) {
            console.log(error); // run if we have error
        });
   	},
   	addComment(post,key){

	    axios.post(this.bUrl +'/addComment', {
            comment: this.commentData[key],
			id: post.id
        })
        .then(function (response) {
	        console.log('saved successfully'); // show if success
	        if(response.status===200){
	            app.posts = response.data;
	        }
        })
        .catch(function (error) {
        	console.log(error); // run if we have error
        });

    },

 }
});
