<?php

function display_home_trace()
{
    ?>
    <li class="hoverable"><a href="home.php">首页</a></li>
    <?php
}

function display_show_trace()
{
    ?>
    <li class="hoverable"><a href="show.php?artworkID=<?php  echo $_SESSION['show'] ?>">详情</a></li>
    <?php
}

function display_search_trace()
{
    ?>
    <li class="hoverable"><a href="search.php?search_info=<?php echo $_SESSION['search']; ?>">搜索</a></li>
    <?php
}

function do_login_html(){
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link href="style.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
</head>
<body class="login">
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
            <li class="hoverable"><a href="home.php" class="homelink">首页</a></li>
            <li class="hoverable" ><a href="register_form.php" class="creatlink">注册</a></li>
            <li class="hoverable" ><a href="login.php" class="loginlink">登录</a></li>
            <li class="hoverable"><a href="search.php" class="searchlnk">搜索</a></li>
            <li class="hoverable"><a href="cart.php" class="cartlink">收藏</a></li>
            
        </ul>
     
    </div>
    <main>
        <form method="post" action="home.php">
        <div class="loginseg">
            <div class="alogo"></div>
            <div class="form-item">
                <input class="loginusername" type="text" name="username" placeholder="用户名" autofocus required>
                
            </div>
            <div class="form-item">
                <input class="loginpassword" name ="password" type="password"  placeholder="登录密码" required>
                
            </div>
            <div class="form-item"><button id="submit">登 录</button></div>
            <div class="reg-bar">
                <a class="reg" href="register_form.php" >立即注册</a>
                <a class="forget" href="forget_form.php" >忘记密码</a>
            </div>
        </div>
        </form>
    </main>
   
    

</body>
</html>
<?php
}

function display_footer()
{
    ?>
    <footer id="footer">
        <div class="copyright">
        @ArtStore.Produced and maintained by Achillessanger at 2018.4.1.All Rights Reserved.
        </div>
    </footer>

<?php
}

function display_user_nav($username)
{
    ?>

            <li class="hoverable"><a href="home.php" class="homelink">首页</a></li>
            <li class="hoverable" ><a href="register_form.php" class="creatlink">注册</a></li>
            <li class="hoverable" ><a href="login.php" class="loginlink">登录</a></li>
            <li class="hoverable"><a href="search.php" class="searchlnk">搜索</a></li>
            <li class="hoverable"><a href="cart.php" class="cartlink">收藏</a></li>
            <li class="hoverable"><a href="logout.php">登出</a></li>
            <li class="hoverable"><a>
                <?php
                    if(check_valid_user())
                    {
                        echo $username;
                    }
                    else{
                        echo '未登录';
                    }
                ?>
            </a></li>
    <?php
}

function display_admin_nav($username)
{
    ?>
    <li class="hoverable"><a href="home.php" class="homelink">首页</a></li>
    <li class="hoverable" ><a href="login.php" class="loginlink">登录</a></li>
    <li class="hoverable"><a href="search.php" class="searchlnk">搜索</a></li>
    <li class="hoverable"><a href="add_art_form.php" class="addlink">增加</a></li>
    <li class="hoverable"><a href="logout.php">登出</a></li>
    <li class="hoverable"><a>
        <?php
            echo $username;
        ?>
    </a></li>
    <?php
}



function do_home_html($username,$art_array_view,$art_array_time)
{   
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
    <title>Home Page</title>
</head>
<link rel="stylesheet" type="text/css" href="https://at.alicdn.com/t/font_1582902_u0zm91pv15i.css">
<body class="home">
    
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
            <?php
                if(check_admin_user())
                {
                    display_admin_nav($username);
                }else
                {
                    display_user_nav($username);

                }
            ?>
            
        </ul>
     
    </div>

    <div id="carousel">
        <ul> <!-- 图片容器 -->
            <li>
                <a href="show.php?artworkID=65"><img src="../resources/img/65.jpg" id="loopimg"></a>
                
            </li>
            <li>
                <a href="show.php?artworkID=48"><img src="../resources/img/48.jpg" class="loopimg"></a>
            </li>
            <li>
                <a href="show.php?artworkID=446"><img src="../resources/img/446.jpg" class="loopimg"></a>
            </li>
            <li>
                <a href="show.php?artworkID=386"><img src="../resources/img/386.jpg" class="loopimg"></a>
            </li>
        </ul>

        <div class="inner">
            <header>
                <p>Lorem ipsum dolor sit amet nullam feugiat</p>
                <h2>Miracle esthétique</h2>
            </header>
        </div>
        <!-- 按钮组 -->
        <div id="leftArrow" class="iconfont icon-arrow-lift arrow"></div> <!-- 左箭头切换按钮 -->        
        <div id="rightArrow" class="iconfont icon-arrow-right arrow"></div> <!-- 右箭头切换按钮 --> 
        <div id="sliderBtn"></div> <!-- 切换按钮组 -->
    </div>

    



    <section id="one" class="wrapper style2">
        <div class="inner">
            <div class="grid-style">

                <?php
                    foreach ($art_array_view as $row)
                    {
                        $url = "show.php?artworkID=".$row['artworkID'];
                        echo "<div><div class='box box1'><div class='image fit'>";
                        echo "<img src='../resources/img/".$row['artworkID'].".jpg'/></div>";
                        echo "<div class='content'>
                        <header class='align-center'>
                            <p>";
                        echo get_title($row['artworkID']);
                        echo "</p>
                        <h2>";
                        echo get_artist($row['artworkID']);
                        echo "</h2>
                        </header>
                        <p>";
                        echo get_description($row['artworkID']);
                        echo " </p>
                        <footer class='align-center'>";
                        echo "<a href='".$url."'class='button alt'>Learn More</a>
                        </footer>
                    </div>
                </div>
            </div>";
                    }

                ?>
                
                

                

            </div>
        </div>
    </section>


    <section   class="wrapper1 style2">
        <div class="inner">
            <div class="grid-style">

                <?php
                    foreach ($art_array_time as $row)
                    {
                        $url = "show.php?artworkID=".$row['artworkID'];
                        echo "<div><div class='box box1'><div class='image fit'>";
                        echo "<img src='../resources/img/".$row['artworkID'].".jpg'/></div>";
                        echo "<div class='content'>
                        <header class='align-center'>
                            <p>";
                        echo get_title($row['artworkID']);
                        echo "</p>
                        <h2>";
                        echo get_artist($row['artworkID']);
                        echo "</h2>
                        </header>
                        <p>";
                        echo get_description($row['artworkID']);
                        echo " </p>
                        <footer class='align-center'>";
                        echo "<a href='".$url."'class='button alt'>Learn More</a>
                        </footer>
                    </div>
                </div>
            </div>";
                    }

                ?>
                
                

                

            </div>
        </div>
    </section>

   <?php
        display_footer();
   ?>

    
    
</body>

    <script src="main.js"></script>
</html>
<?php
}




function do_register_html()
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registerPage</title>
    <link type="text/css" href="style.css" rel="stylesheet"> 
    
    <style type="text/css">
        .center2{
    position: absolute;
    width: 70%;
    height: 60%;
    margin-top: 15%;
    margin-left:15% ;
    box-sizing: border-box;
    text-align: center;
    border: 3px solid white; 
    border-radius: 20px;
    color: white;
}

* { 
        margin: 0; 
        padding: 0; 
}
body { 
      height: 100%; 
      background: #fff url(../resources/img/386.jpg) 50% 50% no-repeat; 
      background-size: cover;
    }
.center2 .form{
    font-size: 1.2em;
   
    font-family:  Tahoma, Geneva, Verdana, sans-serif;
   
    margin-top: 5%;
    margin-left: -10%;
}

.center2 .form .label{
    display: inline-block;
    width: 400px;
    vertical-align: top;
    text-align: right;
    margin: 10px;
    font-weight: bold;
    color: white;
}

.form input[type="text"], .form input[type="email"],.form input[type="password"]{
    width: 360px; 
    height: 30px; 
    padding-left: 70px; 
    border: 3px solid white; 
    border-radius: 25px; 
    font-size: 18px; 
    color: white; 
    background-color: transparent; 
    outline: none;
    margin: 10px;
}

.center2 .form .button{
    width: 200px;
    margin-left: 15%;
}
    </style>
</head>
<body class="creat">
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
            <li class="hoverable"><a href="home.php" class="homelink">首页</a></li>
            <li class="hoverable" ><a href="creataccount.html" class="creatlink">注册</a></li>
            <li class="hoverable" ><a href="login.php" class="loginlink">登录</a></li>
            <li class="hoverable"><a href="search.php" class="searchlnk">搜索</a></li>
            <li class="hoverable"><a href="cart.html" class="cartlink">收藏</a></li>
            
        </ul>
     
    </div>
    <div class="center2">
    <form  id="registerform" method="POST" action="register_new.php" class="form">
        <p>
        <label for="username" class="label">USERNAME <em>*</em></label>
        <input type="text"  name="username" id="username" autofocus required>
        

    </p>
    <P> 
        <label for="password" class="label">PASSWORD <em>*</em></label>
        <input type="password" name="password" id="password" required><br>
        
    </P>
    <p>
        <label for="password" class="label">CONFIRM PASSWORD <em>*</em></label>
        <input type="password" name="password2" id="password2" required><br>
        
    </p>
    <p>
        <label for="email" class="label">EMAIL <em>*</em></label>
        <input type="email" name="email" id="email" required><br>
        
    </p>
    <p>
        <label for="telephone" class="label">TELEPHONE</label>
        <input type="text" name="telephone" id="telephone"><br>
        
    </p>  
    <P>
        <label for="address" class="label">ADDRESS</label>
        <input type="text" name="address" id="address"><br>
        
    </P> 

    <p>
        <input type="submit" class="button" value="REGISTER">
    </p>
    </form>
</div>
    

    
</body>


</html>
<?php
}

function do_title_artist($artworkID)
{
    ?>
    <h2><?php echo get_title($artworkID) ?></h2>
    <p>ARTIST:<?php echo get_artist($artworkID)?></p>
    <?php
}

function display_edit($artworkID)
{
    ?>
    <a href='edit_art_form.php?artworkID=<?php echo $artworkID;?>' class="button alt">EDIT THIS ART</a>
    <?php
}

function display_notin_cart($artworkID)
{
    ?>
    <a href='show.php?add_artworkID=<?php echo $artworkID;?>& artworkID=<?php echo $artworkID;?>' onclick="alerttips()" class='button alt'>ADD TO SHOPPING CART</a>
    <script>
        function alerttips()
        {
            alert("添加成功");
        }
    </script>
    
    <?php
}

function display_in_cart($artworkID)
{
    ?>
    <a class='button alt'>已收藏</a>
    <?php
}

function do_show_html($artworkID,$username)
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>showpage</title>
    <link href="style.css" rel="stylesheet">
    <link href="show.css" rel="stylesheet">
</head>
<body>
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
        <?php
               if(check_admin_user())
               {
                   display_admin_nav($username);
               }else
               {
                   display_user_nav($username);

               } 
                
            ?>
        </ul>
     
    </div>

    <div class="trace">
        <ul >
        <?php
            if(isset($_SESSION['trace']))
            {
                $trace = $_SESSION['trace'];
                foreach($trace as $tra)
                {
                    if($tra == "首页")
                    {
                        display_home_trace();
                    }
                    else if($tra == "详情")
                    {
                        display_show_trace();
                    }
                    else if($tra == "搜索")
                    {
                        display_search_trace();
                    }
                }
            }
            
        ?>
        </ul>
    </div>
        <div class="inner">
            <header>
                <?php do_title_artist($artworkID) ?>
            </header>
        
        </div>
    
    
<div class="outside">
    <div class="imgbox">
        <div class="innerbox">
        <img src="../resources/img/<?php echo $artworkID.".jpg"?>" alt="the showing picture">
    </div>
    </div>

    <div class="box" >
        <div class="content">
            <header class="align-center">
                <h2>THE INFORMATION</h2>
            </header>
            <p>
            painted circa <?php echo get_yearOfWork($artworkID); ?><br>
            
            Dimensions:<?php echo get_width($artworkID);?>  cm * <?php echo get_height($artworkID);?>cm<br>
            
            School:<?php echo get_genre($artworkID);?><br>
            
            price:<?php echo get_price($artworkID);?>元<br>

            heat:<?php echo get_view($artworkID); ?><br>

            details:<?php echo get_description($artworkID);?><br>
            
            </p>
            <footer class="align-center">
                <ul>
                    
                    <li>
                        <?php
                            if(check_admin_user())
                            {
                                display_edit($artworkID);
                            }
                            else{
                                if(!check_cart_art($artworkID,$username))
                             {
                                 display_notin_cart($artworkID);
                             }
                             else{
                                display_in_cart($artworkID);
                             }
                            }
                            
                            
                        ?>
                    </li>
                    <li>
                        <a href="search.php?search_info=<?php echo get_artist($artworkID) ?>" class="button alt">LOOKING FOR THE ARTIST'S MORE PAINTINGS</a>
                    </li>
                </ul>
                
                
                
            </footer>
            
        </div>
    </div>
</div>
    
<?php
        display_footer();
   ?>
    
</body>
</html>
<?php
}

function display_arts($art_array)
{
    if(!is_array($art_array))
    {
        echo "<P>no arts</P>";
    }
    else{
        foreach ($art_array as $row)
        {
            $url = "show.php?artworkID=".$row['artworkID'];
            echo "<div>";
            echo "<a href='".$url."'><img src='../resources/img/".$row['artworkID'].".jpg'></a>";
            
            echo "<p>";
            echo get_title($row['artworkID']);
            echo "<br>";
            echo get_artist($row['artworkID']);
            echo "</p></div>";
            
        }

    }
}

function do_search_html($art_array,$username)
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="show.css" rel="stylesheet">
</head>
<body class="search">
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
        <?php
                if(check_admin_user())
                {
                    display_admin_nav($username);
                }else
                {
                    display_user_nav($username);

                }
            ?>
        </ul>
     
    </div>

    <div class="trace">
        <ul >
        <?php
            if(isset($_SESSION['trace']))
            {
                $trace = $_SESSION['trace'];
                foreach($trace as $tra)
                {
                    if($tra == "首页")
                    {
                        display_home_trace();
                    }
                    else if($tra == "详情")
                    {
                        display_show_trace();
                    }
                    else if($tra == "搜索")
                    {
                        display_search_trace();
                    }
                }
            }
            
        ?>
        </ul>
    </div>
    <div class="user">
        <div class="wrapper1">
            <form action="search.php" method="get" class="searchform">
                <input type="search" name="search_info" placeholder="Search here" >
                <button type="submit" class="searchbutton button">
                   
                </button>
            </form>
            <a class="button" href="search.php?bytime=1">BY TIME</a>
        </div>

    </div>


    <div id="box">
        <dl>
            <dt>主题：</dt>
            <dd>全部</dd>
            <dd>人物</dd> 
            <dd>宗教</dd>
            <dd>风景</dd>
            <dd>抽象</dd>
            
        </dl>
        <dl>
            <dt>价格：</dt>
            <dd>全部</dd>
            
            <dd>4000-4999</dd>
            <dd>5000-5999</dd>
            <dd>6000-6999</dd>
            <dd>7000-7999</dd>
            <dd>8000-8999</dd>
            <dd>9000-9999</dd>
            <dd>10000以上</dd>
        </dl>
        <dl>
            <dt>风格：</dt>
            <dd>全部</dd>
            <dd>巴洛克</dd>
            <dd>现实主义</dd>
            <dd>洛克克</dd>
            <dd>浪漫主义</dd>
            <dd>写实主义</dd>
            <dd>印象主义</dd>
            <dd>现代</dd>
        </dl>
        <dl style="border: none">
            <dt>年代：</dt>
            <dd>全部</dd>
            <dd>1600~1700</dd>
            <dd>1700~1800</dd>
            <dd>1800~1900</dd>
            <dd>1900~2000</dd>
            <dd>2000~2100</dd>
        </dl>
        <dl class="select" style="border-bottom-width: 0px;">
            <dt>已选条件：</dt>
        </dl>
    </div>


    
    <div class="carts searchresults">
        
        
    <?php
        display_arts($art_array);
    ?>
        
    </div>
    <div class="center">
        <ul class="page">
            <li><a href="#">上一页</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">下一页</a></li>
        </ul>
    </div>


    <?php
        display_footer();
   ?>
    

    <script src="script.js"></script>
</body>


</html>
<?php
}

function display_cart_arts($art_array)
{   
    if(!is_array($art_array))
    {
        echo "<P>no arts</P>";
    }
    else{
        foreach ($art_array as $row)
        {
            $url = "show.php?artworkID=".$row['artworkID'];
            echo "<div>";
            echo "<a href='".$url."'><img src='../resources/img/".$row['artworkID'].".jpg'></a>";
            
            echo "<p>";
            echo get_title($row['artworkID']);
            echo "<br>";
            echo get_artist($row['artworkID']);
            echo "<br>";
            echo get_timeuploaded($row['artworkID'],$_SESSION['valid_user']);
            echo "<br>";
            echo "<input type=\"checkbox\" name=\"del_me[]\"
            value=\"".$row['artworkID']."\"/>";
            echo "</p></div>";
            
            
        }

    }
}

function do_cart_html($art_array,$username)
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>个人收藏</title>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="show.css" rel="stylesheet">
</head>
<body class="cartpage">
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
        <?php
                if(check_admin_user())
                {
                    display_admin_nav($username);
                }else
                {
                    display_user_nav($username);

                }
            ?>
            
        </ul>
     
    </div>

    <div class="user">
        <div class="userinfo">
            <p> <?php echo $_SESSION['valid_user'];  ?><br>
            邮箱：<?php  echo get_email($_SESSION['valid_user']); ?><br>
            电话：<?php echo get_tel($_SESSION['valid_user']); ?>
                </p>
        </div>
        
        <div class="wrapper1">
            <form action="#" method="post" class="searchform">
                <input type="search" placeholder="Search here" >
                <button type="submit" class="searchbutton button">
                   
                </button>
            </form>
        </div>
    </div>

    <aside class="aside">
        <ul class="main-menu">
            <li ><a>我的收藏夹</a></li>
            <li ><a href="#" class="collect">默认收藏夹</a></li>
            <li ><a href="#" class="collect" onClick="cart_table.submit();">删除</a></li>
        </ul>
        
    </aside>

    <form name="cart_table" action="delete.php" method="post">
    
    
    
    <div class="carts">
        
        <div class="grid-style other">
            
            <?php display_cart_arts($art_array); ?>
            
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="button">推荐</div>
    <div class="recom" >
        <div class="carts searchresults">
            <?php
                if(check_valid_user())
                {
                    $arts = recommend_art($_SESSION['valid_user']);
                    display_arts($arts);
                }

            ?>
        </div>
    </div>
    </form>

    <?php
        display_footer();
   ?>
    
</body>
</html>
<?php
}

function display_art_form()
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="show.css" rel="stylesheet">
</head>
<body>
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
        <?php
                $username = $_SESSION['admin'];
                if(check_admin_user())
                {
                    display_admin_nav($username);
                }
            ?>
        </ul>
     
    </div>

    <form method="post" action="add_art.php" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000">
        <label for="userfile">Upload this file:</label>
        <input name="userfile" type="file" id="userfile">
        <p>
            <label for="title">TITLE <em>*</em></label>
            <input type="text" name="title" id="title" autofocus required><br>
        </p>
        <p>
            <label for="artist">ARTIST <em>*</em></label>
            <input type="text" name="artist" id="artist" required><br>
        </p>
        <p>
            <label for="description">DESCRIPTION <em>*</em></label>
            <textarea name="description" id="description" required></textarea>
        </p>
        <p>
            <label for="yearofwork">YEAROFWORK <em>*</em></label>
            <input type="number" name="yearofwork" id="yearofwork" required><br>
        </p>
        <p>
            <label for="genre">GENRE <em>*</em></label>
            <input type="text" name="genre" id="genre" required><br>
        </p>
        <p>
            <label for="width">WIDTH <em>*</em></label>
            <input type="number" name="width" id="width" required><br>
        </p>
        <p>
            <label for="height">HEIGHT <em>*</em></label>
            <input type="number" name="height" id="height" required><br>
        </p>
        <p>
            <label for="price">PRICE <em>*</em></label>
            <input type="number" name="price" id="price" required><br>
        </p>
        <P>
            <input type="submit" class="button" value="ADD THE ART">
        </P>
    </form>

    <footer id="footer">
        <div class="copyright">
        @ArtStore.Produced and maintained by Achillessanger at 2018.4.1.All Rights Reserved.
        </div>
    </footer>

</body>
</html>


<?php
}


function display_edit_form($title,$artist,$description,$yearofwork,$genre,$width,$height,$price,$artworkID)
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link href="show.css" rel="stylesheet">
</head>
<body>
    <div id="navbar">
        <div class="logo">
            <img src="../resources/logo.png" class="logopic">
        </div>

        <ul class="nav">
        <?php
                $username = $_SESSION['admin'];
                if(check_admin_user())
                {
                    display_admin_nav($username);
                }
            ?>
        </ul>
     
    </div>

    <form method="post" action="edit_art.php?artworkID=<?php echo $artworkID; ?>" enctype="multipart/form-data">
        
        <p>
            <label for="title">TITLE <em>*</em></label>
            <input type="text" name="title" id="title" value="<?php echo $title;?>" required><br>
        </p>
        <p>
            <label for="artist">ARTIST <em>*</em></label>
            <input type="text" name="artist" id="artist" value="<?php echo $artist;?>" required><br>
        </p>
        <p>
            <label for="description">DESCRIPTION <em>*</em></label>
            <textarea name="description" id="description" required><?php echo $description;  ?></textarea>
        </p>
        <p>
            <label for="yearofwork">YEAROFWORK <em>*</em></label>
            <input type="number" name="yearofwork" id="yearofwork"  required value="<?php echo $yearofwork;?>"><br>
        </p>
        <p>
            <label for="genre">GENRE <em>*</em></label>
            <input type="text" name="genre" id="genre" value="<?php echo $genre;?>" required><br>
        </p>
        <p>
            <label for="width">WIDTH <em>*</em></label>
            <input type="number" name="width" id="width" value="<?php echo $width;?>" required><br>
        </p>
        <p>
            <label for="height">HEIGHT <em>*</em></label>
            <input type="number" name="height" id="height" value="<?php echo $height;?>" required><br>
        </p>
        <p>
            <label for="price">PRICE <em>*</em></label>
            <input type="number" name="price" id="price" value="<?php echo $price;?>" required><br>
        </p>
        <P>
            <input type="submit" class="button" value="UPDATE">
        </P>
    </form>

    <form method="post" action="delete_art.php">
        <input type="hidden" name="artworkID" value="<?php echo $artworkID;  ?>">
        <input type="submit" value="DELETE" class="button">
    </form>

    <footer id="footer">
        <div class="copyright">
        @ArtStore.Produced and maintained by Achillessanger at 2018.4.1.All Rights Reserved.
        </div>
    </footer>

</body>
</html>


<?php
}

function display_alert_login_success()
{
    ?>
    <script>
        alert("用户登录成功");
    </script>
    <?php
}

function display_alert_admin_success()
{
    ?>
    <script>
        alert("管理员登录成功");
    </script>
    <?php
}

function display_alert_login_fail()
{
    ?>
    <script>
        alert("用户名或密码错误");
    </script>
    <?php
}

function display_reg_id1()
{
    ?>
    <script>
        alert("The passwords you entered do not match - please go back and try again.");
    </script>
    <?php
}

function display_reg_id2()
{
    ?>
    <script>
        alert("Your password must be between 6 and 16 characters Please go back and try again.");
    </script>
    <?php
}

function display_reg_id3()
{
    ?>
    <script>
        alert("密码必须由字母和数字组成");
    </script>
    <?php
}

?>