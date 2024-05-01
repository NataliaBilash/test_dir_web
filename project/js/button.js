var count = 0;
document.getElementById("MyButton").onclick = function (){
    count++;
    if (count % 2 == 0) { //проверка на четность
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://p16-capcut-sign-va.ibyteimg.com/tos-maliva-v-be9c48-us/oYOlhADbIBCEAEmnfpDQQiAFyvNoT07iKJd1Je~tplv-nhvfeczskr-1:250:0.webp?lk3s=44acef4b&x-expires=1737306720&x-signature=qy5clxp3DoR3YMi4334Ab0VnWG0%3D";
        document.getElementById("demo").appendChild(img);
    }
}