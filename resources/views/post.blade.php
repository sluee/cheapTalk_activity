<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CheapTalk App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles()
   </head>
   @livewireStyles
<body>
  <nav>
    <div class="menu">
      <div class="logo">
        <a href="#"> <span class="log">Cheap</span>Talk</a>
      </div>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/category">Category</a></li>
        <li><a href="/post">Post</a></li>
      </ul>
    </div>
  </nav>
  <div class="img"></div>
  <div class="center">
    <div class="container">
        <div class="row-sm-4">
            <livewire:post.create/>
        </div>
        <div class="row">
            @if(session ('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
             @endif
            <livewire:post.show/>
        </div>
    </div>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @livewireScripts()
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
  }
  ::selection{
    color: #000;
    background: #fff;
  }
  nav{
    position: fixed;
    /* background: #1b1b1b; */
    width: 100%;
    padding: 10px 0;
    z-index: 12;
  }
  nav .menu{
    max-width: 1250px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
  }
  .menu .logo a{
    text-decoration: none;
    color: #fff;
    font-size: 35px;
    font-weight: 600;
  }
  .menu .logo .log{
      color:cornflowerblue;
      font-size: 50px;
      font-weight: 600;
      text-decoration: none;
      /* font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; */
  }
  .menu ul{
    display: inline-flex;
  }
  .menu ul li{
    list-style: none;
    margin-left: 7px;
  }
  .menu ul li:first-child{
    margin-left: 0px;
  }
  .menu ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    padding: 8px 15px;
    border-radius: 5px;
    transition: all 0.3s ease;
  }
  .menu ul li a:hover{
    background: cornflowerblue;
    color: black;
  }
  /* .img{
    background: url('asset/bg.avif')no-repeat;
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;

  }
  .img::before{
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
  } */
  .center{
    position: fixed;
    top: 52%;
    left: 52%;
    transform: translate(-50%, -50%);
    width: 100%;
    padding: 0 20px;
    /* text-align: center; */
  }
  .center .title{
    color: #fff;
    font-size: 55px;
    font-weight: 600;
  }
  .center .sub_title{
    color: #fff;
    font-size: 52px;
    font-weight: 600;
  }
  .center .btns{
    margin-top: 20px;
  }
  .center .btns button{
    height: 55px;
    width: 170px;
    border-radius: 5px;
    border: none;
    margin: 0 10px;
    border: 2px solid white;
    font-size: 20px;
    font-weight: 500;
    padding: 0 10px;
    cursor: pointer;
    outline: none;
    transition: all 0.3s ease;
  }
  .center .btns button:first-child{
    color: white;
    background: none;
  }
  .btns button:first-child:hover{
    background: cornflowerblue;
    color: black;
  }
  body{
    background: url('asset/bg.avif')no-repeat;
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    position: relative;

  }
  body::before{
    content: '';
    position: absolute;
    height: 100%;
    width: 100%;
    background: rgba(0, 0, 0, 0.4);
  }

  </style>

