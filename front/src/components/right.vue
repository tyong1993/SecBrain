<template>
    <!-- 右侧 -->
        <el-col :span="8">
            <el-row>
                <el-col :span="23" :push="1">
                    <div class="m-main-right">
                      <!-- 公告 -->
                      <!-- <el-row>
                          <el-col :span="24">
                              <div class="m-right-block">
                                <h3 class="m-right-block-title">公告</h3>
                                  <div id="announcement" class="m-right-block-content">
                                      昵称：
                                      <a href="https://home.cnblogs.com/u/tyong/">
                                          tyong
                                      </a>
                                      <br>
                                      园龄：
                                      <a href="https://home.cnblogs.com/u/tyong/" title="入园时间：2018-11-10">
                                          11个月
                                      </a>
                                      <br>
                                      粉丝：
                                      <a href="https://home.cnblogs.com/u/tyong/followers/">
                                          0
                                      </a>
                                      <br>
                                      关注：
                                      <a href="https://home.cnblogs.com/u/tyong/followees/">
                                          0
                                      </a>
                                  </div>
                              </div>
                          </el-col>
                      </el-row> -->
                      <!-- 搜索 -->
                      <!-- <el-row>
                          <el-col :span="24">
                              <div class="m-right-block">
                                <h3 class="m-right-block-title">搜索</h3>
                                <div class="m-right-block-content">
                                    <input type="text" id="m-right-block-search-input">
                                    <input type="button" value="搜索" id="m-right-block-search-button">
                                </div>
                              </div>
                          </el-col>
                      </el-row> -->
                      <!-- 标签 -->
                      <el-row>
                          <el-col :span="24">
                              <div class="m-right-block">
                                <h3 class="m-right-block-title">我的标签</h3>
                                <div class="m-right-block-content m-right-block-content-type">
                                    <ul v-for="(tag,index) in tags"  :key="index">
                                        <li>
                                            <a href="javescript:void(0)">{{tag}}</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                              </div>
                          </el-col>
                      </el-row>
                    </div>
                </el-col>
            </el-row>
        </el-col>
</template>
<script>
    export default {
        props: ['tags'],
    }
</script>
<style>
    /* 主体右侧 */
    /* .m-main-right{
        
    } */
    
    .m-right-block{
      background-color: #fff;
    }
    .m-right-block-content{
      padding: 0px 0px 20px 20px;
    }
    .m-right-block-title{
        font-size: 18px;
        padding: 10px 20px;
        background-color: #169fe6;
        color: #fff;
        font-weight: normal;
        border: 1px solid #169fe6;
    }
    
    .m-right-block-content-type ul li{
      line-height: 2;
      border-bottom: 1px solid #e9e9e9;
      padding: 15px 10px 15px 0px;
      font-size: 14px;
      color: #777;
    }
    .m-right-block-content-type ul li a{
      color: #777;
      text-decoration: none;
    }
    #m-right-block-search-input{
        width: 160px;
        height: 35px;
        border: 1px solid #ddd;
        outline: none;
        line-height: 35px;
        font-size: 13px;
        padding: 0 12px;
    }
    #m-right-block-search-button{
        font-size: 14px;
        height: 37px;
        width: 70px;
        background: #ff5e52;
        text-align: center;
        line-height: 37px;
        border: none;
        color: #fff;
        font-family: "Microsoft Yahei","Simsun",Arial;
    }
    #announcement{
        background: #fff;
        color: #7e8c8d;
        font-size: 13px;
        line-height: 1.8;
        margin-top: 0 !important;
    }
</style>