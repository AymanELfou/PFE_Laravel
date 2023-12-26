<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cool animation tricks |Praroz</title>

    <style>
        /* author: https://codepen.io/PraRoz/pen/OJzrmmm
Rozan Chitrakar
 */
 @import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');

body {
  background-color: #111111; 
  overflow: hidden;
}
div {
  margin-top: 90px;
  padding: 40px;
  font-size: 95px;
  font-family: 'Monoton', cursive;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
  color: red;
}
div p{
    margin:5px;
}
#error:hover {
    text-shadow: 0 0 200px #ffffff,0 0 80px #008000,0 0 6px #0000ff;
}
#code:hover {
    text-shadow: 0 0 100px red,0 0 40px FireBrick,0 0 8px DarkRed; 
}
#error {
  color: #fff;
  text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
}
#error span {
  animation: upper 6s linear infinite;
}
#code span:nth-of-type(2) {
  animation: lower 9s linear infinite;
}
#code span:nth-of-type(1) {
  text-shadow: none;
  opacity:.4;
}
@keyframes upper {
  0%,19.999%,22%,62.999%,64%, 64.999%,70%,100% {
    opacity:.99;
    text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
  }
  20%,21.999%,63%,63.999%,65%,69.999% {
    opacity:0.4;
    text-shadow: none; 
  }
}
@keyframes lower {
  0%,12%,18.999%,23%,31.999%,37%,44.999%,46%,49.999%,51%,58.999%,61%,68.999%,71%,85.999%,96%,100% {
    opacity:0.99;
    text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
  }
  19%,22.99%,32%,36.999%,45%,45.999%,50%,50.99%,59%,60.999%,69%,70.999%,86%,95.999% { 
    opacity:0.4; 
    text-shadow: none; 
  }
}

    </style>
</head>
<body>
    <div>
        <p id="error">E <span>r</span>ror</p>
        <p id="code">4<span>0</span><span>4</span></p>
    </div>

</body>
</html>