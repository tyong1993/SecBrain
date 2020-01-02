<template>
    <div>
        <!-- 头部 -->
        <el-row>
            <el-col :span="24"><div class="m-header"></div></el-col>
        </el-row>
        <!-- 导航栏 -->
        <el-row>
            <el-col :span="24">
                <div class="m-navigation">
                    <el-menu  mode="horizontal" text-color="#fff" style="background-color:transparent;
                    text-shadow: 3px 3px 3px #000;margin-left: 10%;">
                        <el-menu-item><router-link to="/">首页</router-link></el-menu-item>
                        <!-- <el-menu-item><router-link to="/detail">随笔</router-link></el-menu-item> -->
                        <!-- <el-menu-item><router-link to="/detail">闪存</router-link></el-menu-item>
                        <el-menu-item><router-link to="/detail">联系</router-link></el-menu-item> -->
                        <!-- <el-menu-item><router-link to="/detail">管理</router-link></el-menu-item> -->
                    </el-menu>
                </div>
            </el-col>
        </el-row>
    </div>
</template>
<style>
    body{
        background: url(../assets/body_bg.png) repeat-x scroll 0 0 #f0eef5;
        /* background: repeat-x scroll 0 0 #f0eef5; */
        margin:0px;
    }
    li{
      list-style-type:none;
    }
    a{
      text-decoration:none
    }
    /* 行 */
    .el-row {
      margin-bottom: 20px;
    }
    /* 头部 */
    .m-header{
        height: 295px;
    }
    /* 导航 */
    .m-navigation{
        height: 60px;
        background-color: #169fe6;
        /* border: 1px solid #138cca; */
    }
</style>