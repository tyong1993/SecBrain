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
                        <div id="cnblogs_post_body" class="blogpost-body ">
                            <p>两个例子:</p>
                        <p>在js中:0.1+0.2&nbsp; &nbsp;!=&nbsp; 0.3&nbsp; 而是 等于0.300000000004 //这跟js默认采用双精度存储小数有关系</p>
                        <p>在php中9.45*100%100&nbsp; &nbsp;!=&nbsp; 45而是等于44 //这跟php取余运算时是先取整再取余有关系</p>
                        <p>以上两种情况的根本原因应该是小数在计算机存储时精度丢失导致的.</p>
                        <p>因为有些小数在计算机使用二进制方式表示时无法准确的表示出来,类似于十进制中的1/3一样,无理数,无限循环.</p>
                        <p>可是计算机存储小数的类型不管是float还是double都是有位数限制的,所以他们存储的只是一个近似值,这就导致了精度丢失.</p>
                        <p>因为经度丢失了,所以有些时候运算结果就会跟我们预想的不太一样了.</p>
                        </div>
                    </div>
                </el-col>
            </el-row>
        </el-col>
        <Right></Right>
    </el-row>
    <Footer></Footer>
  </div>
</template>
<script>
import Header from '../components/header.vue'
import Footer from '../components/footer.vue'
import Right from '../components/right.vue'
export default {
  components:{
            Header,
            Footer,
            Right,
        },
}
</script>
<style>
    
    
</style>
