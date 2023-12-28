let mainImage = document.getElementById("mainIMG");
let smallImage = document.getElementsByClassName("small-img");

smallImage[0].onclick = () =>{
    mainImage.src = smallImage[0].src;
}
smallImage[1].onclick = () =>{
    mainImage.src = smallImage[1].src;
}
smallImage[2].onclick = () =>{
    mainImage.src = smallImage[2].src;
}
smallImage[3].onclick = () =>{
    mainImage.src = smallImage[3].src;
}

function cart(){
    var a,b,c,d;
    a = document.getElementById("first").value;
    b = a*344.99;
    document.getElementById("second").value=b;
    c = (b*5.7)/100;
    document.getElementById("third").value=c;
    d = b+c;
    document.getElementById("fourth").value=d;
}
let ans = document.getElementById("first");
ans.addEventListener('keyup',cart);