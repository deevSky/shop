<template>
<span id="products">
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row" v-for="product in getAllProducts" :key="product.id">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                        <h3><a href="#">{{ product.title}}</a></h3>
                    </div>
                    <img style="height: 300px" :src="`../images/${product.image}`" alt=""/>
                  </div>
                  <p>
                   {{ product.description }}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-calendar"></i><a href="#"> {{ getHumanDate(product.created_at) }} </a></li>
                      <li v-for="category in getAllProducts.categories">
                          <i class="icon-user"></i>
                          <a href="#">{{ category.category_name }}</a>
                      </li>
                      <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                      <li @click="showComment = !showComment" class="product-comment"><i class="icon-comments"></i>Comments</li>
                    </ul>
                    <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                  </div>
                     <div class="row" v-if="showComment">
                          <div class="comment_block">
                           <div v-for="comment in getAllComments">
                                  <div style="margin-top: 15px">
                                   <img style="width: 35px; height: 35px; border-radius: 50%"
                                        src="https://i.pinimg.com/736x/4a/bc/c0/4abcc00427dbb86ee5da8270b52204f8.jpg"
                                        alt="">
                                    <span style="margin-left: 10px">Anna B.  |</span>
                                    <span class="inline-block">06.08.2020</span>
                              </div>
                              <div style="margin-top: 10px; border-bottom: 1px dotted rgb(212 212 212)">
                                  <p>{{ comment.text }}</p>
                              </div>
                           </div>
                             <div style="margin-top: 15px">
                                  <form role="form" @submit.prevent="addComment()">
                                       <img style="width: 30px; height: 30px; border-radius: 50%"
                                            src="https://i.pinimg.com/736x/4a/bc/c0/4abcc00427dbb86ee5da8270b52204f8.jpg"
                                            alt="">
                                     <input v-model="form.text" name="comment" type="text" placeholder="Add comment"
                                            style="margin-top:10px">
                                    <button type="submit" class="btn btn-primary" style="background: #cc83b2;">
                                        <i class="icon-envelope"></i>
                                    </button>
                                  </form>
                             </div>
                      </div>
                      </div>
                </div>
              </div>
            </article>

            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-video">
                    <div class="post-heading">
                      <h3><a href="#">Amazing video of creating our cakes</a></h3>
                    </div>
                    <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/1q3lIaxaqmg" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                    </div>
                  </div>
                  <p>
                    Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                    ea. Usu ea justo malis, pri quando everti electram ei.
                  </p>
                </div>
              </div>
            </article>
            <div id="pagination">
            </div>
          </div>
          <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li><i class="icon-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Online business</a><span> (11)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Marketing strategy</a><span> (9)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">Technology</a><span> (12)</span></li>
                  <li><i class="icon-angle-right"></i><a href="#">About finance</a><span> (18)</span></li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li>
                    <img src="" class="pull-left" alt=""/>
                    <h6><a href="#">Lorem ipsum dolor sit</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src="" class="pull-left" alt=""/></a>
                    <h6><a href="#">Maiorum ponderum eum</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                  <li>
                    <a href="#"><img src="" class="pull-left" alt=""/></a>
                    <h6><a href="#">Et mei iusto dolorum</a></h6>
                    <p>
                      Mazim alienum appellantur eu cu ullum officiis pro pri
                    </p>
                  </li>
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
</span>
</template>

<script>
    export default {
        name: "Products",

        data() {
            return {
                showComment: false,
                comments: [
                    'This is amazing cake!!!!!!',
                ],
                newComment: '',
                form: new Form({
                    text: '',
                })
            }
        },

        mounted() {
            this.$store.dispatch('allProducts')
            this.$store.dispatch('allComments')
        },

        computed: {
            getAllProducts() {
                return this.$store.getters.getProduct
            },

            getAllComments() {
                return this.$store.getters.getComment
            }
        },

        methods: {
            getHumanDate: function (date) {
                return moment(date, 'YYYY-MM-DD').format('DD/MM/YYYY');
            },
            addComment() {
                this.form.post('/comment/create')
                    .then((response) => {
                        this.newComment = ''
                        this.$router.push('/all-products')

                        toast.fire({
                            icon: 'success',
                            title: 'Created in successfully'
                        })
                    })
                    .catch(() => {

                    })
            },

            // addComment: function () {
            //     if (this.newComment != '') {
            //         this.comments.push(this.newComment);
            //         this.newComment = '';
            //     }
            // }
        }
    }
</script>

<style scoped>
    .product-comment:hover {
        color: #cc83b2;
        text-decoration: underline;
        cursor: pointer;
    }

    .comment_block {
        margin-top: 70px;
        margin-left: 29px;
    }
</style>
