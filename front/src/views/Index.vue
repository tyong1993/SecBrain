<template>
  <div>
    <Header></Header>
    <!-- 主体 -->
    <el-row style="padding-left: 10%;padding-right: 10%;">
        <!-- 左侧 -->
        <el-col :span="16">
            <el-row>
                <el-col :span="24">
                    <div class="m-main-left">
                        <div class="m-main-left-block">
                            <div class="m-main-left-block-date">
                                <a style="color: #fff;" href="javescript:void(0)">2019年3月13日</a>
                            </div>
                            <div class="m-main-left-block-title">
                                <a style="color: #555;" @click="goToDetail" href="javescript:void(0)">
                                    php几个支持回调函数处理数组的函数(array_filter/array_map/array_walk/array_walk_recursive)
                                </a>
                            </div>
                            <div class="m-main-left-block-des">
                                摘要：1 array_filter&nbsp;(array,callback) 依次将&nbsp;array&nbsp;数组中的每个值传递到&nbsp;callback&nbsp;函数。如果&nbsp;callback&nbsp;函数返回 true，则&nbsp;array&nbsp;数组的当前值会被包含在返回的结果数组中。数组的键名保留不变。 2 array_map(callback,arr            
                                <a style="color: #9ab26b;" @click="goToDetail" href="javescript:void(0)">阅读全文</a>
                            </div>
                            <div class="m-main-left-block-fdes">
                                posted @ 2019-03-13 13:19 tyong 阅读 (14) 评论 (0)
                                <a style="color: #999;" href="javescript:void(0)" rel="nofollow">
                                编辑
                                </a>
                            </div>
                        </div>
                        <div class="m-main-left-block">
                            <div class="m-main-left-block-date">
                                <a style="color: #fff;" href="javescript:void(0)">2019年3月13日</a>
                            </div>
                            <div class="m-main-left-block-title">
                                <a style="color: #555;" @click="goToDetail" href="javescript:void(0)">
                                    php几个支持回调函数处理数组的函数(array_filter/array_map/array_walk/array_walk_recursive)
                                </a>
                            </div>
                            <div class="m-main-left-block-des">
                                摘要：1 array_filter&nbsp;(array,callback) 依次将&nbsp;array&nbsp;数组中的每个值传递到&nbsp;callback&nbsp;函数。如果&nbsp;callback&nbsp;函数返回 true，则&nbsp;array&nbsp;数组的当前值会被包含在返回的结果数组中。数组的键名保留不变。 2 array_map(callback,arr            
                                <a style="color: #9ab26b;" @click="goToDetail" href="javescript:void(0)">阅读全文</a>
                            </div>
                            <div class="m-main-left-block-fdes">
                                posted @ 2019-03-13 13:19 tyong 阅读 (14) 评论 (0)
                                <a style="color: #999;" href="javescript:void(0)" rel="nofollow">
                                编辑
                                </a>
                            </div>
                        </div>
                    </div>
                </el-col>
            </el-row>
        </el-col>
        <Right :tags='tags'></Right>
    </el-row>
    <Footer></Footer>
  </div>
</template>
<script>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
import Right from '../components/right.vue'
import axios from 'axios'
export default {
       components:{
            Header,
            Footer,
            Right,
        },
        mounted() {
            this.init();
        },
        data() {
            return {
                tags:[],//我的标签
            }
        },
        methods:{
            // 初始化 接口调用
            init:function(){
                axios.get('/api/index/indexBlog').then((res)=>{
                    this.tags=res.data;
                }).catch((e)=>{
                    alert("好像出了点小问题");
                })
            },
            goToDetail:function(){
            this.$router.push({name:'detail',query: {id:'1'}})
            }
      }
}
</script>
<style>
    /* 主体左侧 */
    .m-main-left{
        background: #fff;
        /* border: 1px solid #dedede; */
        height: 1000px;
    }
    .m-main-left-block{
      background: #fff;
      padding: 20px;
      border: 1px solid #dedede;
      margin-bottom: -1px;
    }
    .m-main-left-block-date{
      color: #fff;
      background-color: #45bcf9;
      padding: 3px 6px;
      font-size: 12px;
      display: block;
      float: left;
      margin-right: 10px;
    }
    .m-main-left-block-title{
      font-size: 21px;
      line-height: 1.5em;
      float: left;
      clear: right;
    }
    .m-main-left-block-des{
      padding: 15px 0;
      clear: both;
      font-size: 14px;
      color: #333;
      line-height: 200%;
    }
    .m-main-left-block-fdes{
      clear: both;
      color: #bcbcbc;
      float: none;
      text-align: left;
      line-height: 200%;
      font-size: 12px;
    }
    
</style>
